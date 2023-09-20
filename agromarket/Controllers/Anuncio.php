<?php

class Anuncio extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Anuncio()
    {
        $data['page_id'] = 6;
        $data['page_tag'] = "Servicios de Anuncios";
        $data['page_name'] = "anuncio";
        $data['page_title'] = "Anuncio";
        $data['page_functions_js'] = "functions_anuncio.js";
        $this->views->getView($this, "anuncio", $data);
    }

    public function getAnuncios()
    {
        $arrData = $this->model->selectAnuncios();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDisable = '';
            $btnCheck = '';

            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['anu_id'] . ')" title="Ver anuncio"><i class="far fa-eye"></i></button>';
            }

            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditAnuncio" onClick="fntEditAnuncio(' . $arrData[$i]['anu_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }

            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDisable = '<button class="btn btn-danger btn-sm fntDisAnuncio" onClick="fntDisAnuncio(' . $arrData[$i]['anu_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            }

            if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']){
                $btnCheck = '<button class="btn btn-warning btn-sm fntCheckAnuncio" onClick="fntCheckAnuncio(' . $arrData[$i]['anu_id'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>'; 
            
            if($arrData[$i]['anu_estado'] == 1){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

            if($arrData[$i]['anu_estado'] == 4){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }
        
            switch ($arrData[$i]['anu_estado']) {
                case 1:
                    $arrData[$i]['anu_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['anu_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['anu_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['anu_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }

        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getAnuncio(int $anu_id)
    {
        $intIdAnuncio = intval(strClean($anu_id));
        if ($intIdAnuncio > 0) {
            $arrData = $this->model->selectAnuncio($intIdAnuncio);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setAnuncio()
    {
        $intIdAnuncio = intval($_POST['anu_id']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strTipo = strClean($_POST['txtTipo']);
        $strFechaVigencia = strClean($_POST['txtFechaVigencia']);
        $strEstado = strClean($_POST['listEstado']);

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_anuncio = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdAnuncio == 0) {
            //Crear
            $request_anuncio = $this->model->insertAnuncio($strDescripcion,
                                                                    $strTipo,
                                                                    $strImagen,
                                                                    $strFechaVigencia,
                                                                    $strEstado,
                                                                   
                                                                    );
            $option = 1;
        } else {
            //Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $request_anuncio = $this->model->updateAnuncio($intIdAnuncio, $strDescripcion, $strTipo, $strImagen, $strFechaVigencia, $strEstado);
            $option = 2;
        }

        if ($request_anuncio > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('anuncio', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('anuncio', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('anuncio', $_POST['foto_actual']);
                }
            }
        } else if ($request_anuncio == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El anuncio ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disAnuncio()
    {
        if ($_POST) {
            $intIdAnuncio = intval($_POST['anu_id']);
            $requestDelete = $this->model->disableAnuncio($intIdAnuncio);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el anuncio');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el anuncio.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delAnuncio()
    {
        if ($_POST) {
            $intIdAnuncio = intval($_POST['anu_id']);
            $requestDelete = $this->model->deleteAnuncio($intIdAnuncio);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el anuncio');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el anuncio.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
