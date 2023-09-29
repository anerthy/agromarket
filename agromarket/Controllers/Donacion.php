<?php

class Donacion extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new DonacionModel();
    }

    
    public function Donacion()
    {
        $data['page_tag'] = "Donaciones";
        $data['page_name'] = "donacion";
        $data['page_title'] = "Donación";
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