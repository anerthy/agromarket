<?php

class Donacion extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new DonacionModel();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
    }

    public function Donacion()
    {
        if (!in_array($_SESSION['userData']['rol_id'], [1, 2])) {
            header("Location:" . base_url() . '/access_denied');
        }

        $data['page_tag'] = "Donaciones";
        $data['page_name'] = "donaciones";
        $data['page_title'] = "Donaciones";
        $data['arrData'] = $this->model->getAll();
        $this->views->getView($this, "donacion", $data);
    }

    public function DonacionAdmin()
    {
        $data['page_tag'] = "Donaciones Admin";
        $data['page_name'] = "donacion_admin";
        $data['page_title'] = "Donacion";
        $data['arrData'] = $this->model->getAll();
        $this->views->getView($this, "donacion_admin", $data);
    }

    public function getDonaciones()
    {
        $arrData = $this->model->getAll();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}
