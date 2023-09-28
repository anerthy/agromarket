<?php

class DonacionModel extends Mysql
{
    public $intDonacion;
    public $strDescipciodn;
    public $strMedio;
    public $strInformacion;
    public $strEstado;

    public function __construct()
	{
		parent::__construct();
	}

    public function getAll()
    {
        $sql = "SELECT  don_id, don_descripcion, don_medio, don_informacion, don_estado
        FROM donaciones  ";
        $request = $this->select_all($sql);
		return $request;

    }
}
