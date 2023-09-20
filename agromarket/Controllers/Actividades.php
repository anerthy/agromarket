<?php

class Actividades extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Actividad()
    {
        $data['page_id'] = 6;
        $data['page_tag'] = "Actividades";
        $data['page_name'] = "actividad";
        $data['page_title'] = "Actividades";
        $data['page_functions_js'] = "functions_actividad.js";
        $this->views->getView($this, "actividad", $data);
    }

    public function getActividades()
    {
        $arrData = $this->model->selectAlimentaciones();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDisable = '';
            $btnCheck = '';

            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['COD_ACTIVIDAD'] . ')" title="Ver actividad"><i class="far fa-eye"></i></button>';
            }

            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditActividad" onClick="fntEditActividad(' . $arrData[$i]['COD_ACTIVIDAD'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }

            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDisable = '<button class="btn btn-danger btn-sm fntDisActividad" onClick="fntDisActividad(' . $arrData[$i]['COD_ACTIVIDAD'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            }

            if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']) {
                $btnCheck = '<button class="btn btn-warning btn-sm fntCheckActividad" onClick="fntCheckActividad(' . $arrData[$i]['COD_ACTIVIDAD'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

            if ($arrData[$i]['IND_ESTADO'] == 1) {
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';
            }

            switch ($arrData[$i]['IND_ESTADO']) {
                case 1:
                    $arrData[$i]['IND_ESTADO'] = '<span class="badge badge-warning">Pendiente</span>';
                    break;
                case 2:
                    $arrData[$i]['IND_ESTADO'] = '<span class="badge badge-info">Activo</span>';
                    break;
                case 3:
                    $arrData[$i]['IND_ESTADO'] = '<span class="badge badge-danger">Inactivo</span>';
                    break;
                case 4:
                    $arrData[$i]['IND_ESTADO'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                    // do something else
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getActividad(int $COD_ACTIVIDAD)
    {
        $intIdActividad = intval(strClean($COD_ACTIVIDAD));
        if ($intIdActividad > 0) {
            $arrData = $this->model->selectActividad($intIdActividad);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                // Puedes generar la URL de la imagen aquí si es necesario
                $arrData['url_imagen'] =  media() . '/images/uploads/Actividades/' . $arrData['IMG_ACTIVIDAD']; // Reemplaza 'URL_DE_LA_IMAGEN' con la lógica adecuada
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setActividad()
    {
        $intIdActividad = intval($_POST['COD_ACTIVIDAD']);
        $strNombre = strClean($_POST['NOM_ACTIVIDAD']);
        $strDescripcion = strClean($_POST['DES_ACTIVIDAD']);
        $strFecActividad = strClean($_POST['FEC_ACTIVIDAD']);
        $strActLugar = strClean($_POST['ACT_LUGAR']);
        $strActCategoria = strClean($_POST['ACT_CATEGORIA']);
        $strImgActividad = strClean($_POST['IMG_ACTIVIDAD']);
        $intIndEstado = intval($_POST['IND_ESTADO']);
        $strFecCreacion = strClean($_POST['FEC_CREACION']);

        // Lógica para procesar la imagen, si es necesario

        $requestActividad = "";

        if ($intIdActividad == 0) {
            // Crear
            $requestActividad = $this->model->insertActividad($strNombre, $strDescripcion, $strFecActividad, $strActLugar, $strActCategoria, $strImgActividad, $intIndEstado, $strFecCreacion);
            $option = 1;
        } else {
            // Actualizar
            $requestActividad = $this->model->updateActividad($intIdActividad, $strNombre, $strDescripcion, $strFecActividad, $strActLugar, $strActCategoria, $strImgActividad, $intIndEstado, $strFecCreacion);
            $option = 2;
        }

        if ($requestActividad > 0) {
            $arrResponse = array('status' => true, 'msg' => ($option === 1) ? 'Datos guardados correctamente.' : 'Datos actualizados correctamente.');

            // Lógica para procesar la imagen, si es necesario

        } else if ($requestActividad == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disActividad()
    {
        if ($_POST) {
            $intIdActividad = intval($_POST['COD_ACTIVIDAD']);
            $requestDelete = $this->model->disableActividad($intIdActividad);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la actividad.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la actividad.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delActividad()
    {
        if ($_POST) {
            $intIdActividad = intval($_POST['COD_ACTIVIDAD']);
            $requestDelete = $this->model->deleteActividad($intIdActividad);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la actividad.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la actividad.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
