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

    public function insertAfiliado(
        int  $productor,
        int  $usuario,

        string  $fechaAfiliacion,
        string  $fechaVencimiento,
        string  $estado
    ) {
        $return = "";
        $this->intIdProductor   = $productor;
        $this->intIdUsuario   = $usuario;
        $this->strFechaAfiliacion  = $fechaAfiliacion;
        $this->strFechaVencimiento   = $fechaVencimiento;
        $this->strEstado        = $estado;

        $sql = "SELECT ptd_id  
                FROM afiliados 
                WHERE ptd_id = '{$this->strIdProductor}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO afiliados(
                                pdt_id,
                                usr_id,
                                afl_fec_afiliacion, 
                                afl_fec_vencimiento, 
                                afl_estado
                            
                            ) 
                            VALUES(?,?,?,?,?)";

            $arrData = array(
                $this->intIdProductor,
                $this->intIdUsuario,
                $this->strFechaAfiliacion,
                $this->strFechaVencimiento,
                $this->strEstado,
                1
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }