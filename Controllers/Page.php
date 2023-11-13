<?php
require_once("Models/DonacionModel.php");
require_once("Views/about-us.php");

class Page extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function about_us()
    {
        $modelo = new DonacionModel();
        $data['arrData'] = $modelo->getAll();
        $this->views->getView($this, "about-us", $data);
    }

    // Metodo utilizado para la paginacion
    // public function getAlimentationes(int $pagina)
    // {
    //     $arrData = $this->model->getAlimentaciones($pagina);

    //     echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
}
