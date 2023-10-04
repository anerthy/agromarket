<?php
require_once("Models/Traits/TExistAfiliado.php");
class Afiliado extends Controllers
{
    use TExistAfiliado;
    public function __construct()
    {
        sessionStart();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
    }

    public function Afiliado()
    {
        $data['page_id'] = 6;
        $data['page_tag'] = "Afiliados";
        $data['page_name'] = "afiliado";
        $data['page_title'] = "afiliado";
        $data['page_functions_js'] = "functions_afiliado.js";
        $data['val_afiliado']    =    $this->existeAfiliado();
        $this->views->getView($this, "afiliado", $data);
    }

    public function Afiliarse()
    {
        if ($_POST) {
            $intIdActividad = intval($_POST['alf_id']);
            $request_afiliado = $this->model->CrearAfiliado(
                $_SESSION['userData']['usr_id']
            );
            if ($request_afiliado) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha afiliado');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al afiliarse');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
