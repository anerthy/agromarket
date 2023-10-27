<?php
require_once("Models/ProductoModel.php");
class Product extends Controllers
{
    public $oproducto;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->oproducto = new ProductoModel();
        $arrData = $this->oproducto->getAll();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getByid(int $id)
    {
        $this->oproducto = new ProductoModel();
        $arrData = $this->oproducto->getByid($id);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}
