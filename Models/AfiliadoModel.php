<?php

class AfiliadoModel extends Mysql
{
    public $intIdAfiliado;
    public $intIdProductor;
    public $intIdUsuario;
    public $strFechaAfiliacion;
    public $strFechaVencimiento;
    public $strEstado;


    public function __construct()
    {
        parent::__construct();
    }

    public function CrearAfiliado(int $usuario)
    {
        $return = "";
        $this->intIdUsuario   = $usuario;

        $sql = "SELECT *  
                FROM afiliados 
                WHERE usr_id = '{$this->intIdUsuario}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "CALL CrearAfiliado('{$this->intIdUsuario}')";
            $request_insert = $this->procedure($query_insert);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }
}
