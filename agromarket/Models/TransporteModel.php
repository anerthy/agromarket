<?php 

	class TransporteModel extends Mysql
	{
		public $intIdTransporte;
		public $strNombre;
		public $strDescripcion;
		public $strClase;
		public $strTipo;
		public $strDisponibilidad;
        public $strTelefono;
        public $intEstado;
		public $strImagen;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTransportes()
		{
			$isAdmin = " AND trans_estado IN (2,3) 
			AND bit_usuario = {$_SESSION['idUser']}";
			
			$roles = array(2,3,4);// Administrador Desarrollador y Supervisor
			if (in_array($_SESSION['userData']['id_rol'], $roles)) {
				$isAdmin = " AND trans_estado IN (1,2,3)";
			}
	
			if($_SESSION['userData']['id_rol'] == 1){
				$isAdmin = " ";
			}

			$sql = "SELECT 	trans_id, 
							trans_nombre, 
							trans_descripcion, 
							trans_clase, 
							trans_tipo, 
							trans_disponibilidad,
							trans_telefono, 
							trans_imagen, 
							trans_estado 
					FROM transportes
					INNER JOIN bitacoras 
					ON trans_id = bit_registro
					WHERE bit_modulo = 9 " 
					. $isAdmin;
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTransporte(int $trans_id)
		{
			$this->intIdTransporte = $trans_id;
			$sql = "SELECT 	trans_id, 
							trans_nombre, 
							trans_descripcion, 
							trans_clase, 
							trans_tipo, 
							trans_disponibilidad,
							trans_telefono, 
							trans_imagen, 
							trans_estado 
					FROM transportes 
					WHERE trans_id = $this->intIdTransporte";
			$request = $this->select($sql);
			return $request;
		}

		public function insertTransporte(string $nombre, string $descripcion,string $clase, string $tipo, string $disponibilidad, string $telefono, string $imagen){

			$return = "";
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strClase = $clase;
			$this->strTipo = $tipo;
			$this->strDisponibilidad = $disponibilidad;
            $this->strTelefono = $telefono;
			$this->strImagen = $imagen;
			
			$sql = "SELECT 	trans_id, 
							trans_nombre
					FROM transportes WHERE trans_nombre = '{$this->strNombre}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO transportes (trans_nombre, 
															trans_descripcion, 
															trans_clase, 
															trans_tipo, 
															trans_disponibilidad,
															trans_telefono, 
															trans_imagen) 
								VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre, 
								$this->strDescripcion, 
								$this->strClase, 
								$this->strTipo, 
								$this->strDisponibilidad, 
								$this->strTelefono, 
								$this->strImagen);
	        	$request_insert = $this->insert($query_insert,$arrData);

				if ($request_insert != 0) {
					$query = "INSERT INTO bitacoras (bit_modulo, 
													bit_registro, 
													bit_usuario, 
													bit_rol) 
							VALUES(?,?,?,?)";
					$data = array(9, 
								$request_insert,
								$_SESSION['userData']['id_usuario'], 
								$_SESSION['userData']['id_rol']);
					$this->insert($query, $data);
				}

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateTransporte(int $trans_id, string $nombre, string $descripcion, string $clase, string $tipo, string $disponibilidad, string $telefono, string $imagen, int $estado){
			$this->intIdTransporte= $trans_id;
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strClase = $clase;
			$this->strTipo = $tipo;
			$this->strDisponibilidad = $disponibilidad;
            $this->strTelefono = $telefono;
			$this->strImagen = $imagen;
			$this->intEstado = $estado;

			$sql = "SELECT 	trans_id, 
							trans_nombre
					FROM transportes WHERE trans_nombre = '$this->strNombre' AND trans_id != $this->intIdTransporte";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE transportes
						SET trans_nombre = ?, 
							trans_descripcion = ?, 
							trans_clase = ?, 
							trans_tipo = ?, 
							trans_disponibilidad = ?, 
							trans_telefono = ?, 
							trans_imagen = ?, 
							trans_estado = ? 
						WHERE trans_id = $this->intIdTransporte ";

				$arrData = array($this->strNombre, 
								$this->strDescripcion, 
								$this->strClase,
								$this->strTipo, 
								$this->strDisponibilidad, 
								$this->strTelefono,
								$this->strImagen,
								$this->intEstado);
				$request = $this->update($sql,$arrData);

				if ($request != 0) {
					$query = "UPDATE bitacoras
							SET bit_fecha_modificacion = NOW() 
							WHERE bit_modulo = 9 
							AND bit_registro = $this->intIdTransporte";
					$this->update($query);
				}
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function disableTransporte(int $trans_id)
		{
			$this->intIdTransporte = $trans_id;
			$sql = "UPDATE transportes 
					SET trans_estado = 4 
					WHERE trans_id = $this->intIdTransporte";
			$request = $this->update($sql);
	
			if ($request != 0) {
				$query ="UPDATE bitacoras
						SET bit_fecha_eliminacion = NOW() 
						WHERE bit_modulo = 9 
						AND bit_registro = $this->intIdTransporte";
				$this->update($query);
			}
			return $request;
		}

		public function deleteTransporte(int $trans_id)
		{
			$this->intIdTransporte = $trans_id;
			$sql = "DELETE FROM transportes
			 		WHERE trans_id = $this->intIdTransporte ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
}
 ?>