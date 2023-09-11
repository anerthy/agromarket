<?php

class BitacoraModel extends Mysql
{
    public $intRegistro;
    public $intUsuario;
    public $intRol;

    public function __construct()
    {
        parent::__construct();
    }

    public function insertRegistro(int $registro, int $usuario, int $rol)
    {
        $return = "";
        $this->intRegistro = $registro;
        $this->intUsuario = $usuario;
        $this->intRol = $rol;

        $sql = "SELECT reg_alim_id FROM registro_alimentaciones WHERE reg_alim_id = '{$this->intRegistro}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO registro_alimentaciones (reg_alim_id, reg_alim_usuario_id, reg_alim_rol_id) VALUES(?,?,?)";
            $arrData = array($this->intRegistro, $this->intUsuario, $this->intRol);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }
}
