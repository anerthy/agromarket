<?php

class Actividad extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Actividad()
    {
        $data['page_tag'] = "Actividades";
        $data['page_name'] = "actividad";
        $data['page_title'] = "Actividad";
        $data['page_functions_js'] = "functions_actividad.js";
        $this->views->getView($this, "actividad", $data);
    }
    public function ActividadInfo()
    {
        $data['page_tag'] = "Actividades Info";
        $data['page_name'] = "actividad_info";
        $data['page_title'] = "Actividad Info";
        $this->views->getView($this, "actividad_info", $data);
    }


    public function getActividades()
    {
        $arrData = $this->model->selectActividades();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDisable = '';
            $btnCheck = '';

            // Botón de ver
            $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['act_id'] . ')" title="Ver actividad"><i class="far fa-eye"></i></button>';

            // Botón de actualizar
            $btnEdit = '<button class="btn btn-primary btn-sm fntEditActividad" onClick="fntEditActividad(' . $arrData[$i]['act_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';

            // Botón de eliminar
            $btnDisable = '<button class="btn btn-danger btn-sm fntDisableActividad" onClick="fntDisableActividad(' . $arrData[$i]['act_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';

            // Botón de revisar
            $btnCheck = '<button class="btn btn-warning btn-sm fntCheckActividad" onClick="fntCheckActividad(' . $arrData[$i]['act_id'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>'; 
            
            if ($arrData[$i]['act_estado'] == 1) {
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

            if ($arrData[$i]['act_estado'] == 4) {
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }

            // Formatear estado
            switch ($arrData[$i]['act_estado']) {
                case 1:
                    $arrData[$i]['act_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                    break;
                case 2:
                    $arrData[$i]['act_estado'] = '<span class="badge badge-info">Activo</span>';
                    break;
                case 3:
                    $arrData[$i]['act_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                    break;
                case 4:
                    $arrData[$i]['act_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                    break;
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getActividad(int $act_id)
    {
        $intIdActividad = intval(strClean($act_id));
        if ($intIdActividad > 0) {
            $arrData = $this->model->selectActividad($intIdActividad);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrData['url_imagen'] = media() . '/images/uploads/actividades/' . $arrData['act_imagen'];
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setActividad()
    {



        $intIdActividad = intval($_POST['act_id']);
        $strNombre = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strFecha = strClean($_POST['txtFecha']);
        $strLugar = strClean($_POST['txtLugar']);
        $strCategoria = strClean($_POST['txtCategoria']);
        $strEstado = strClean($_POST['listEstado']);

       

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_Actividad = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdActividad == 0) {
            // Crear
            $request_Actividad = $this->model->insertActividad($strNombre,
                                                              $strDescripcion,
                                                              $strFecha,
                                                              $strLugar, 
                                                              $strCategoria, 
                                                              $imgImagen);
            $option = 1;
        } else {

            // Actualizar
             if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $request_Actividad = $this->model->updateActividad($intIdActividad, $strNombre, $strDescripcion,$strFecha, $strLugar, $strCategoria, $imgImagen, $strEstado);
            $option = 2;
        }

        if ($request_Actividad > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('actividades', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('actividades', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('actividades', $_POST['foto_actual']);
                }
            }
        } else if ($request_Actividad == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disableActividad()
    {
        if ($_POST) {
            $intIdActividad = intval($_POST['act_id']);
            $requestDelete = $this->model->disableActividad($intIdActividad);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la actividad');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la actividad.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function deleteActividad()
    {
        if ($_POST) {
            $intIdActividad = intval($_POST['act_id']);
            $requestDelete = $this->model->deleteActividad($intIdActividad);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la actividad');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la actividad.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
