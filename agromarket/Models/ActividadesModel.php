<?php

class AlimentacionModel extends Mysql
{
    public $COD_ACTIVIDAD;
    public $NOM_ACTIVIDAD;
    public $DES_ACTIVIDAD;
    public $FEC_ACTIVIDAD; // (DD/MM/YYYY HH:MM:SS)
    public $ACT_LUGAR;
    public $ACT_CATEGORIA;
    public $IMG_ACTIVIDAD;
    public $IND_ESTADO;
    public $FEC_CREACION;
    public $FEC_MODIFICACION;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectAlimentaciones()
    {
        $isAdmin = " AND IND_ESTADO IN (2,3) 
        AND bit_usuario = {$_SESSION['idUser']}";
        
        $roles = array(2,3,4); // Administrador Desarrollador y Supervisor
		if (in_array($_SESSION['userData']['id_rol'], $roles)) {
			$isAdmin = " AND IND_ESTADO IN (1,2,3)";
        }

        if ($_SESSION['userData']['id_rol'] == 1){
            $isAdmin = " ";
        }

        $sql = "SELECT  COD_ACTIVIDAD,
                        NOM_ACTIVIDAD,
                        DES_ACTIVIDAD,
                        FEC_ACTIVIDAD,
                        ACT_LUGAR,
                        ACT_CATEGORIA,
                        IMG_ACTIVIDAD,
                        IND_ESTADO,
                        FEC_CREACION,
                        FEC_MODIFICACION
                FROM ACTIVIDADES
                INNER JOIN bitacoras 
                ON COD_ACTIVIDAD = bit_registro
                WHERE bit_modulo = 6 " 
                . $isAdmin;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectAlimentacion(int $COD_ACTIVIDAD)
    {
        $this->COD_ACTIVIDAD = $COD_ACTIVIDAD;
        $sql = "SELECT COD_ACTIVIDAD, 
                NOM_ACTIVIDAD, 
                DES_ACTIVIDAD, 
                FEC_ACTIVIDAD, 
                ACT_LUGAR, 
                ACT_CATEGORIA, 
                IMG_ACTIVIDAD, 
                IND_ESTADO 
                FROM ACTIVIDADES 
                WHERE COD_ACTIVIDAD = $this->COD_ACTIVIDAD";
        $request = $this->select($sql);
        return $request;
    }

    public function insertAlimentacion(string $NOM_ACTIVIDAD, string $DES_ACTIVIDAD, string $FEC_ACTIVIDAD, string $ACT_LUGAR, string $ACT_CATEGORIA, string $IMG_ACTIVIDAD, int $IND_ESTADO, string $FEC_CREACION)
    {
        $return = "";
        $this->NOM_ACTIVIDAD = $NOM_ACTIVIDAD;
        $this->DES_ACTIVIDAD = $DES_ACTIVIDAD;
        $this->FEC_ACTIVIDAD = $FEC_ACTIVIDAD;
        $this->ACT_LUGAR = $ACT_LUGAR;
        $this->ACT_CATEGORIA = $ACT_CATEGORIA;
        $this->IMG_ACTIVIDAD = $IMG_ACTIVIDAD;
        $this->IND_ESTADO = $IND_ESTADO;
        $this->FEC_CREACION = $FEC_CREACION;
        
        $sql = "SELECT NOM_ACTIVIDAD 
                FROM ACTIVIDADES 
                WHERE NOM_ACTIVIDAD = '{$this->NOM_ACTIVIDAD}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO ACTIVIDADES
                            (NOM_ACTIVIDAD, 
                            DES_ACTIVIDAD, 
                            FEC_ACTIVIDAD, 
                            ACT_LUGAR, 
                            ACT_CATEGORIA, 
                            IMG_ACTIVIDAD, 
                            IND_ESTADO, 
                            FEC_CREACION) 
                            VALUES(?,?,?,?,?,?,?,?)";

            $arrData = array($this->NOM_ACTIVIDAD, 
                            $this->DES_ACTIVIDAD, 
                            $this->FEC_ACTIVIDAD, 
                            $this->ACT_LUGAR, 
                            $this->ACT_CATEGORIA, 
                            $this->IMG_ACTIVIDAD, 
                            $this->IND_ESTADO, 
                            $this->FEC_CREACION);
            $request_insert = $this->insert($query_insert, $arrData);

            if ($request_insert != 0) {
                $query = "INSERT INTO bitacoras (bit_modulo, 
                                                bit_registro, 
                                                bit_usuario, 
                                                bit_rol) 
                        VALUES(?,?,?,?)";
                $data = array(6, $request_insert,$_SESSION['userData']['id_usuario'], $_SESSION['userData']['id_rol']);
                $this->insert($query, $data);
            }

            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateAlimentacion(int $COD_ACTIVIDAD, string $NOM_ACTIVIDAD, string $DES_ACTIVIDAD, string $FEC_ACTIVIDAD, string $ACT_LUGAR, string $ACT_CATEGORIA, string $IMG_ACTIVIDAD, int $IND_ESTADO, string $FEC_MODIFICACION)
    {
        $this->COD_ACTIVIDAD = $COD_ACTIVIDAD;
        $this->NOM_ACTIVIDAD = $NOM_ACTIVIDAD;
        $this->DES_ACTIVIDAD = $DES_ACTIVIDAD;
        $this->FEC_ACTIVIDAD = $FEC_ACTIVIDAD;
        $this->ACT_LUGAR = $ACT_LUGAR;
        $this->ACT_CATEGORIA = $ACT_CATEGORIA;
        $this->IMG_ACTIVIDAD = $IMG_ACTIVIDAD;
        $this->IND_ESTADO = $IND_ESTADO;
        $this->FEC_MODIFICACION = $FEC_MODIFICACION;

        $sql = "SELECT COD_ACTIVIDAD 
                FROM ACTIVIDADES 
                WHERE NOM_ACTIVIDAD = '$this->NOM_ACTIVIDAD' 
                AND COD_ACTIVIDAD != $this->COD_ACTIVIDAD";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE ACTIVIDADES 
                    SET NOM_ACTIVIDAD = ?, 
                        DES_ACTIVIDAD = ?, 
                        FEC_ACTIVIDAD = ?, 
                        ACT_LUGAR = ?, 
                        ACT_CATEGORIA = ?, 
                        IMG_ACTIVIDAD = ?, 
                        IND_ESTADO = ?, 
                        FEC_MODIFICACION = ? 
                    WHERE COD_ACTIVIDAD = $this->COD_ACTIVIDAD ";
            $arrData = array($this->NOM_ACTIVIDAD, $this->DES_ACTIVIDAD, $this->FEC_ACTIVIDAD, $this->ACT_LUGAR, $this->ACT_CATEGORIA, $this->IMG_ACTIVIDAD, $this->IND_ESTADO, $this->FEC_MODIFICACION);
            $request = $this->update($sql, $arrData);

            if ($request != 0) {
                $query = "UPDATE bitacoras
                        SET bit_fecha_modificacion = NOW() 
                        WHERE bit_modulo = 6 
                        AND bit_registro = $this->COD_ACTIVIDAD";
                $this->update($query);
            }
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableAlimentacion(int $COD_ACTIVIDAD)
    {
        $this->COD_ACTIVIDAD = $COD_ACTIVIDAD;
        $sql = "UPDATE ACTIVIDADES 
                SET IND_ESTADO = 4 
                WHERE COD_ACTIVIDAD = $this->COD_ACTIVIDAD";
        $request = $this->update($sql);

        if ($request != 0) {
            $query ="UPDATE bitacoras
                    SET bit_fecha_eliminacion = NOW() 
                    WHERE bit_modulo = 6 
                    AND bit_registro = $this->COD_ACTIVIDAD";
            $this->update($query);
        }

        return $request;
    }

    public function deleteAlimentacion(int $COD_ACTIVIDAD)
    {
        $this->COD_ACTIVIDAD = $COD_ACTIVIDAD;
        $sql = "DELETE FROM ACTIVIDADES 
                WHERE COD_ACTIVIDAD = $this->COD_ACTIVIDAD";
        $request = $this->delete($sql);
        return $request;
    }
}
