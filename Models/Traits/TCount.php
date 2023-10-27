<?php
require_once("Libraries/Core/Mysql.php");
trait TCount
{
    public $con;

    public function countRegistrosT()
    {
        $this->con = new Mysql();
        $sql = "SELECT  'Usuario' AS 'Modulo', 
                        COUNT(id_usuario) AS 'Registros',
                        0 AS 'Pendientes'
                FROM usuario
                UNION
                SELECT  'Rol', 
                        COUNT(id_rol), 
                        0 
                FROM rol
                UNION
                SELECT  'Grupo', 
                        COUNT(gpo_id), 
                        0 
                FROM grupos_organizados 
                WHERE gpo_estado = 2
                UNION
                SELECT  'Comunidad', 
                        COUNT(com_id), 
                        0 
                FROM comunidades
                UNION
                SELECT  'Alimentacion', 
                        COUNT(alim_id),
                        (SELECT COUNT(alim_id) FROM alimentaciones WHERE alim_estado = 1)
                FROM alimentaciones 
                WHERE alim_estado = 2
                UNION
                SELECT  'Hospedaje', 
                        COUNT(hosp_id),
                        (SELECT COUNT(hosp_id) FROM hospedajes WHERE hosp_estado = 1)
                FROM hospedajes 
                WHERE hosp_estado = 2
                UNION
                SELECT  'Transporte', 
                        COUNT(trans_id),
                        (SELECT COUNT(trans_id) FROM transportes WHERE trans_estado = 1)
                FROM transportes 
                WHERE trans_estado = 2
                UNION
                SELECT  'Tour', 
                        COUNT(tour_id),
                        (SELECT COUNT(tour_id) FROM tours WHERE tour_estado = 1) 
                FROM tours 
                WHERE tour_estado = 2
                UNION
                SELECT  'Voluntario', 
                        COUNT(vol_id), 
                        (SELECT COUNT(vol_id) FROM voluntarios WHERE vol_estado = 1)
                FROM voluntarios 
                WHERE vol_estado = 2
                UNION
                SELECT  'Contenido', 
                        COUNT(cont_id),
                        0 
                FROM contenidos_paginas
                UNION
                SELECT  'Galeria',  
                        COUNT(gal_id), 
                        0 
                FROM galeria
                UNION
                SELECT  'Especies', 
                        COUNT(esp_id), 
                        0 
                FROM especies
                WHERE esp_estado = 2";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
