<?php

class Contenido extends Controllers
{
    public function __construct()
    {
        sessionStart();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        getPermisos(11);
    }

    public function Contenido()
    {
        if (empty($_SESSION['permisosMod']['ver'])) {
            header("Location:" . base_url() . '/access_denied');
        }
        $data['page_id']            =   11;
        $data['page_tag']           =   "Contenidos de paginas";
        $data['page_name']          =   "contenidos de paginas";
        $data['page_title']         =   "Contenidos de paginas";
        $data['page_functions_js']  =   "functions_contenido.js";
        $this->views->getView($this, "contenido", $data);
    }

    public function getContenidos()
    {
        $arrData = $this->model->selectContenidos();

        for ($i = 0; $i < count($arrData); $i++) {

            $btnView = '';
            $btnEdit = '';

            // boton de ver
            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['cont_id'] . ')" title="Ver contenido">
                                <i class="far fa-eye"></i>
                            </button>';
            }

            // boton de actualizar
            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm btnEditContenido" onClick="fntEditContenido(' . $arrData[$i]['cont_id'] . ')" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . '</div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getContenido(int $cont_id)
    {
        $intIdContenido = intval(strClean($cont_id));
        if ($intIdContenido > 0) {
            $arrData = $this->model->selectContenido($intIdContenido);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setContenido()
    {

        $intIdContenido =   intval($_POST['cont_id']);
        $strTitulo      =    strClean($_POST['txtTitulo']);
        $strContenido   =   strClean($_POST['txtContenido']);

        if ($intIdContenido == 0) {
            $request_contenido = $this->model->insertContenido($strTitulo, $strContenido);
            $option = 1;
        } else {
            $request_contenido = $this->model->updateContenido($intIdContenido, $strTitulo, $strContenido);
            $option = 2;
        }

        if ($request_contenido > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }
        } else if ($request_contenido == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! Este contenido de pagina ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}