<?php

class Alimentacion extends Controllers
{
    public function __construct()
    {
        // sessionStart();
        parent::__construct();
        
        // if (empty($_SESSION['login'])) {
        //     header('Location: ' . base_url() . '/login');
        // }
        // getPermisos(6);
    }

    public function Alimentacion()
    {
        // if (empty($_SESSION['permisosMod']['ver'])) {
        //     header("Location:" . base_url() . '/access_denied');
        // }
        $data['page_id'] = 6;
        $data['page_tag'] = "Servicios de Alimentación";
        $data['page_name'] = "alimentacion";
        $data['page_title'] = "Alimentación";
        $data['page_functions_js'] = "functions_alimentacion.js";
        $this->views->getView($this, "alimentacion", $data);
    }

    public function getAlimentaciones()
    {
        $arrData = $this->model->selectAlimentaciones();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDisable = '';
            $btnCheck = '';

            // boton de ver
            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['alim_id'] . ')" title="Ver alimentacion"><i class="far fa-eye"></i></button>';
            }

            // boton de actualizar
            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditAlimentacion" onClick="fntEditAlimentacion(' . $arrData[$i]['alim_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }

            // boton de eliminar
            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDisable = '<button class="btn btn-danger btn-sm fntDisAlimentacion" onClick="fntDisAlimentacion(' . $arrData[$i]['alim_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            }

            //boton de revisar
            if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']){
                $btnCheck = '<button class="btn btn-warning btn-sm fntCheckAlimentacion" onClick="fntCheckAlimentacion(' . $arrData[$i]['alim_id'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>'; 
            
            if($arrData[$i]['alim_estado'] == 1){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

            if($arrData[$i]['alim_estado'] == 4){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }
        
            switch ($arrData[$i]['alim_estado']) {
                case 1:
                    $arrData[$i]['alim_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['alim_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['alim_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['alim_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }

        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getAlimentacion(int $alim_id)
    {
        $intIdAlimentacion = intval(strClean($alim_id));
        if ($intIdAlimentacion > 0) {
            $arrData = $this->model->selectAlimentacion($intIdAlimentacion);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrData['url_imagen'] = media() . '/images/uploads/alimentaciones/' . $arrData['alim_imagen'];
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setAlimentacion()
    {
        $intIdAlimentacion = intval($_POST['alim_id']);
        $strNombre =  strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strDireccion = strClean($_POST['txtDireccion']);
        $strHoraApertura = strClean($_POST['txtHoraApertura']);
        $strHoraCierre = strClean($_POST['txtHoraCierre']);
        $strTelefono = strClean($_POST['txtTelefono']);
        $intEstado = intval($_POST['listEstado']);

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_alimentacion = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdAlimentacion == 0) {
            //Crear
            $request_alimentacion = $this->model->insertAlimentacion($strNombre,
                                                                    $strDescripcion,
                                                                    $strDireccion,
                                                                    $strHoraApertura,
                                                                    $strHoraCierre,
                                                                    $strTelefono,
                                                                    $imgImagen
                                                                    );
            $option = 1;
        } else {
            //Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $request_alimentacion = $this->model->updateAlimentacion($intIdAlimentacion, $strNombre, $strDescripcion, $strDireccion,  $strHoraApertura, $strHoraCierre, $strTelefono, $imgImagen,$intEstado);
            $option = 2;
        }

        if ($request_alimentacion > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('alimentaciones', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('alimentaciones', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('alimentaciones', $_POST['foto_actual']);
                }
            }
        } else if ($request_alimentacion == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El servicio de alimentación ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disAlimentacion()
    {
        if ($_POST) {
            $intIdAlimentacion = intval($_POST['alim_id']);
            $requestDelete = $this->model->disableAlimentacion($intIdAlimentacion);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la alimentación');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la alimentación.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delAlimentacion()
    {
        if ($_POST) {
            $intIdAlimentacion = intval($_POST['alim_id']);
            $requestDelete = $this->model->deleteAlimentacion($intIdAlimentacion);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la alimentación');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la alimentación.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
