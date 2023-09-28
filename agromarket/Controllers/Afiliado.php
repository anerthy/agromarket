<?php

class Afiliado extends Controllers
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

    public function Afiliado()
    {
        // if (empty($_SESSION['permisosMod']['ver'])) {
        //     header("Location:" . base_url() . '/access_denied');
        // }
        $data['page_id'] = 6;
        $data['page_tag'] = "Afiliados";
        $data['page_name'] = "afiliado";
        $data['page_title'] = "afiliado";
        $data['page_functions_js'] = "functions_afiliado.js";
        $this->views->getView($this, "afiliado", $data);
    }

    public function setAfiliado()
    {
        $intIdAfiliado = intval($_POST['afl_id']);
        $strFechaAfiliacion     = strClean($_POST['txtfechaAfiliacion']);
        $strFechaVencimiento = strClean($_POST['txtfechaVencimiento']);
        // $intIdProductor = intval($_POST['ptd_id']);
        // $intIdProductor = 1; //! PENDIENTE DE OBTENER EL PRODUCTOR DE ESE USUARIO
        $strEstado      = strClean($_POST['listEstado']);

        // Crear
        $request_afiliado = $this->model->insertafiliado(
            $intIdProductor,
            $intIdUsuario,
            $strFechaAfiliacion,
            $strFechaVencimiento,
            $strEstado
        );
        $option = 1;

        if ($request_afiliado > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else if ($request_afiliado == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El afiliado ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
