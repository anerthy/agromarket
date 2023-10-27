<?php
class Servicios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function alimentacion()
    {
        $data['page_title'] = "Servicios de Alimentación";
        $this->views->getView($this, "alimentaciones", $data);
    }

    public function hospedaje()
    {
        $data['page_tag'] = "Hospedaje";
        $data['page_title'] = "Servicios de Hospedaje";
        $data['page_name'] = "viewhospedajes";
        $this->views->getView($this, "hospedajes", $data);
    }


    public function transporte()
    {
        $data['page_tag'] = "transporte";
        $data['page_title'] = "Servicios de transporte";
        $data['page_name'] = "viewtransporte";
        $this->views->getView($this, "transportes", $data);
    }

    public function tours()
    {
        $data['page_tag'] = "tours";
        $data['page_title'] = "Tours";
        $data['page_name'] = "tours";
        $this->views->getView($this, "tours", $data);
    }

    public function getAlimentationes(int $pagina)
    {
        $arrData = $this->model->getAlimentaciones($pagina);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getHospedajes(int $pagina)
    {
        $arrData = $this->model->getHospedajes($pagina);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getTransportes(int $pagina)
    {
        $arrData = $this->model->getTransportes($pagina);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getTours(int $pagina)
    {
        $arrData = $this->model->getTours($pagina);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}
