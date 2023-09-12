<?php

class ServiciosModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAlimentaciones(int $pagina)
    {
        $registros = 6;

        $inicial = ($pagina - 1) * $registros;
        $sql = "SELECT  alim_id,
                        alim_nombre,
                        alim_descripcion,
                        alim_direccion,
                        CONCAT(DATE_FORMAT(alim_hora_apertura, '%h:%i %p'),' - ',DATE_FORMAT(alim_hora_cierre, '%h:%i %p')) AS alim_horario, 
                        alim_telefono,
                        alim_imagen
                FROM alimentaciones
                WHERE alim_estado = 2
                LIMIT $inicial,$registros";
        $request = $this->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['alim_imagen'] = BASE_URL . '/Assets/images/uploads/alimentaciones/' . $request[$i]['alim_imagen'];
            }
        }
        return $request;
    }

    public function getHospedajes(int $pagina)
    {
        $registros = 6;

        $inicial = ($pagina - 1) * $registros;
        $sql = "SELECT  hosp_id,
                        hosp_nombre,
                        hosp_descripcion,
                        hosp_tipo,
                        hosp_direccion,
                        hosp_telefono,
                        hosp_precio,
                        hosp_imagen 
                FROM hospedajes 
                WHERE hosp_estado = 2
                LIMIT $inicial, $registros";
        $request = $this->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['hosp_imagen'] = BASE_URL . '/Assets/images/uploads/hospedajes/' . $request[$i]['hosp_imagen'];
            }
        }
        return $request;
    }

    public function getTransportes(int $pagina)
    {
        $registros = 6;

        $inicial = ($pagina - 1) * $registros;
        $sql = "SELECT  trans_id,
                        trans_nombre,
                        trans_descripcion,
                        trans_clase,
                        trans_tipo,
                        trans_disponibilidad,
                        trans_telefono,
                        trans_imagen 
                FROM transportes 
                WHERE trans_estado = 2
                LIMIT $inicial, $registros";
        $request = $this->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['trans_imagen'] = BASE_URL . '/Assets/images/uploads/transportes/' . $request[$i]['trans_imagen'];
            }
        }
        return $request;
    }

    public function getTours(int $pagina)
    {
        $registros = 6;

        $inicial = ($pagina - 1) * $registros;
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
                        tour_imagen
                FROM tours
                WHERE tour_estado = 2 
                LIMIT $inicial, $registros";
        $request = $this->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['tour_imagen'] = BASE_URL . '/Assets/images/uploads/tours/' . $request[$i]['tour_imagen'];
            }
        }
        return $request;
    }
}
