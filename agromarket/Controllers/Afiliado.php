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

    public function CrearAfiliado()
    {
        $request_afiliado = $this->model->CrearAfiliado(
            $_SESSION['userData']['usr_id']
        );

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
