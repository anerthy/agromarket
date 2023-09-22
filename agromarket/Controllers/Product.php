<?php
require_once("Models/ProductoModel.php");
class Servicios extends Controllers
{
    public $oproducto = new ProductoModel();

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $arrData = $this->oproducto->selectAlimentaciones();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getByid( int $id)
    {
        $arrData = $this->oproducto->getByid($id);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

}
