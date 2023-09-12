<?php

class TourModel extends Mysql
{
    public $intIdTour;
    public $strNombre;
    public $strDescripcion;
    public $strActividad;
    public $strAlimentacion;
    public $strHospedaje;
    public $strTransporte;
    public $strLugar;
    public $strDisponibilidad;
    public $strHoraInicio;
    public $strDuracion;
    public $strCupoMinimo;
    public $strTelefono;
    public $intPrecio;
    public $strImagen;
    public $intEstado;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function selectTours()
    {
        $isAdmin = " AND tour_estado IN (2,3) 
        AND bit_usuario = {$_SESSION['idUser']}";
        
        $roles = array(2,3,4);// Administrador Desarrollador y Supervisor
		if (in_array($_SESSION['userData']['id_rol'], $roles)) {
			$isAdmin = " AND tour_estado IN (1,2,3)";
        }

        if($_SESSION['userData']['id_rol'] == 1){
            $isAdmin = " ";
        }
        $sql = "SELECT  tour_id, 
                        tour_nombre, 
                        tour_descripcion, 
                        tour_actividad, 
                        tour_alimentacion, 
                        tour_hospedaje, 
                        tour_transporte, 
                        tour_lugar, 
                        tour_disponibilidad, 
                        tour_hora_inicio, 
                        tour_duracion, 
                        tour_cupo_minimo, 
                        tour_telefono, 
                        tour_precio, 
                        tour_imagen, 
                        tour_estado 
                FROM tours
                INNER JOIN bitacoras 
                ON tour_id = bit_registro
                WHERE bit_modulo = 7 " 
                . $isAdmin;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectTour(int $tour_id)
    {
        $this->intIdTour = $tour_id;
        $sql = "SELECT  tour_id, 
                        tour_nombre, 
                        tour_descripcion, 
                        tour_actividad, 
                        tour_alimentacion, 
                        tour_hospedaje, 
                        tour_transporte, 
                        tour_lugar, 
                        tour_disponibilidad, 
                        tour_hora_inicio, 
                        tour_duracion, 
                        tour_cupo_minimo, 
                        tour_telefono, 
                        tour_precio, 
                        tour_imagen, 
                        tour_estado 
                FROM tours 
                WHERE tour_id = $this->intIdTour";
        $request = $this->select($sql);
        return $request;
    }

    public function insertTour( string $nombre,
                                string $descripcion,
                                string $actividad,
                                string $alimentacion,
                                string $hospedaje,
                                string $transporte,
                                string $lugar,
                                string $disponibilidad,
                                string $hora_inicio,
                                string $duracion,
                                string $cupo_minimo,
                                string $telefono,
                                string $precio,
                                string $imagen) 
    {

        $return = "";
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strActividad =  $actividad;
        $this->strAlimentacion = $alimentacion;
        $this->strHospedaje = $hospedaje;
        $this->strTransporte = $transporte;
        $this->strLugar = $lugar;
        $this->strDisponibilidad = $disponibilidad;
        $this->strHoraInicio = $hora_inicio;
        $this->strDuracion = $duracion;
        $this->strCupoMinimo = $cupo_minimo;
        $this->strTelefono = $telefono;
        $this->intPrecio = $precio;
        $this->strImagen = $imagen;
        $return = 0;

        $sql = "SELECT tour_id,tour_nombre 
                FROM tours 
                WHERE tour_nombre = '{$this->strNombre}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO tours (tour_nombre, 
                                                tour_descripcion, 
                                                tour_actividad, 
                                                tour_alimentacion, 
                                                tour_hospedaje, 
                                                tour_transporte, 
                                                tour_lugar, 
                                                tour_disponibilidad, 
                                                tour_hora_inicio, 
                                                tour_duracion, 
                                                tour_cupo_minimo, 
                                                tour_telefono, 
                                                tour_precio, 
                                                tour_imagen) 
                                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $arrData = array($this->strNombre,
                            $this->strDescripcion,
                            $this->strActividad,
                            $this->strAlimentacion,
                            $this->strHospedaje,
                            $this->strTransporte,
                            $this->strLugar,
                            $this->strDisponibilidad,
                            $this->strHoraInicio,
                            $this->strDuracion,
                            $this->strCupoMinimo,
                            $this->strTelefono,
                            $this->intPrecio,
                            $this->strImagen);

            $request_insert = $this->insert($query_insert, $arrData);

            if ($request_insert != 0) {
                $query = "INSERT INTO bitacoras (bit_modulo, 
                                                bit_registro, 
                                                bit_usuario, 
                                                bit_rol) 
                          VALUES(?,?,?,?)";
                $data = array(7, 
                            $request_insert, 
                            $_SESSION['userData']['id_usuario'], 
                            $_SESSION['userData']['id_rol']);
                $this->insert($query, $data);
            }

            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateTour( int $tour_id,
                                string $nombre,
                                string $descripcion,
                                string $actividad,
                                string $alimentacion,
                                string $hospedaje,
                                string $transporte,
                                string $lugar,
                                string $disponibilidad,
                                string $hora_inicio,
                                string $duracion,
                                string $cupo_minimo,
                                string $telefono,
                                string $precio,
                                string $imagen,
                                int $estado) 
    {
        $this->intIdTour = $tour_id;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strActividad =  $actividad;
        $this->strAlimentacion = $alimentacion;
        $this->strHospedaje = $hospedaje;
        $this->strTransporte = $transporte;
        $this->strLugar = $lugar;
        $this->strDisponibilidad = $disponibilidad;
        $this->strHoraInicio = $hora_inicio;
        $this->strDuracion = $duracion;
        $this->strCupoMinimo = $cupo_minimo;
        $this->strTelefono = $telefono;
        $this->intPrecio = $precio;
        $this->intEstado = $estado;
        $this->strImagen = $imagen;

        $sql = "SELECT tour_id 
                FROM tours 
                WHERE tour_nombre =  '$this->strNombre' 
                AND tour_id != $this->intIdTour";
        
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE tours 
                    SET tour_nombre = ?,
                        tour_descripcion = ?,
                        tour_actividad = ?,
                        tour_alimentacion = ?,
                        tour_hospedaje = ?,
                        tour_transporte = ?,
                        tour_lugar = ?,
                        tour_disponibilidad = ?,
                        tour_hora_inicio = ?,
                        tour_duracion = ?,
                        tour_cupo_minimo = ?,
                        tour_telefono = ?,
                        tour_precio = ?,
                        tour_imagen = ?,
                        tour_estado = ? 
                    WHERE tour_id = $this->intIdTour";

            $arrData = array($this->strNombre,
                            $this->strDescripcion,
                            $this->strActividad,
                            $this->strAlimentacion,
                            $this->strHospedaje,
                            $this->strTransporte,
                            $this->strLugar,
                            $this->strDisponibilidad,
                            $this->strHoraInicio,
                            $this->strDuracion,
                            $this->strCupoMinimo,
                            $this->strTelefono,
                            $this->intPrecio,
                            $this->strImagen,
                            $this->intEstado);

            $request = $this->update($sql, $arrData);

            if ($request != 0) {
                $query = "UPDATE bitacoras
                            SET bit_fecha_modificacion = NOW() 
                            WHERE bit_modulo = 7 
                            AND bit_registro = $this->intIdTour";
                $this->update($query);
            }
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableTour(int $tour_id)
    {
        $this->intIdTour = $tour_id;
        $sql = "UPDATE tours 
                SET tour_estado = 4 
                WHERE tour_id = $this->intIdTour";
        $request = $this->update($sql);

        if ($request != 0) {
            $query ="UPDATE bitacoras
                    SET bit_fecha_eliminacion = NOW() 
                    WHERE bit_modulo = 7 
                    AND bit_registro = $this->intIdTour";
            $this->update($query);
        }
        return $request;
    }

    public function deleteTour(int $tour_id)
    {
        $this->intIdTour = $tour_id;
        $sql = "DELETE FROM tours 
                WHERE tour_id = $this->intIdTour";
        $request = $this->delete($sql);
        return $request;
    }
}
