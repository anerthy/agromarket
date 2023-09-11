<?php 

	class GrupoModel extends Mysql
	{
		public $intIdGrupo;
		public $strNombre;
		public $strRepresentante;
		public $strDescripcion;
		public $strUbicacion;
		public $strCorreo;
		public $strTelefono;
		public $intNumeroIntegrantes;
		public $strLogo;
		public $intComunidad;
		public $intEstado;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function selectGrupos() {
			$sql = "SELECT	gpo_id,
							gpo_nombre,
							gpo_representante,
							gpo_descripcion,
							gpo_ubicacion,
							gpo_correo,
							gpo_telefono,
							gpo_numero_integrantes,
							gpo_logo,
							com_nombre,
							gpo_estado
					FROM grupos_organizados 
					INNER JOIN comunidades
					ON gpo_comunidad = com_id
					WHERE gpo_estado IN (2,3) ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectGrupo(int $gpo_id)
		{
			$this->intIdGrupo = $gpo_id;
			$sql = "SELECT	gpo_id,
							gpo_nombre,
							gpo_representante,
							gpo_descripcion,
							gpo_ubicacion,
							gpo_correo,
							gpo_telefono,
							gpo_numero_integrantes,
							gpo_logo,
							gpo_comunidad,
							com_nombre,
							gpo_estado
					FROM grupos_organizados 
					INNER JOIN comunidades
					ON gpo_comunidad = com_id
					WHERE gpo_id = $this->intIdGrupo";
					
			$request = $this->select($sql);
			return $request;
		}

		public function insertGrupo(string $nombre,
									string $representante,
									string $descripcion,
									string $ubicacion,
									string $correo,
									string $telefono,
		 							int $integrantes,
		 							string $logo,
		 							int $comunidad,
		 							int $estado)
		{
			$return = "";
			$this->strNombre = $nombre;
			$this->strRepresentante = $representante;
			$this->strDescripcion = $descripcion;		
			$this->strUbicacion = $ubicacion;
			$this->strCorreo = $correo;
			$this->strTelefono = $telefono;
			$this->intNumeroIntegrantes = $integrantes;
			$this->strLogo = $logo;
			$this->intEstado = $estado;
			$this->intComunidad = $comunidad;
			$return = 0;
			
			$sql = "SELECT gpo_id 
					FROM grupos_organizados 
					WHERE gpo_nombre = '{$this->strNombre}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO grupos_organizados (	gpo_nombre,
																	gpo_representante,
																	gpo_descripcion,
																	gpo_ubicacion,
																	gpo_correo,
																	gpo_telefono,
																	gpo_numero_integrantes,
																	gpo_logo,
																	gpo_comunidad,
																	gpo_estado) 
								VALUES(?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre,
								$this->strRepresentante,
								$this->strDescripcion,
								$this->strUbicacion,
								$this->strCorreo,
								$this->strTelefono,
								$this->intNumeroIntegrantes,
								$this->strLogo,
								$this->intComunidad,
								$this->intEstado);
	        
				$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateGrupo (int $gpo_id, 
									string $nombre,
									string $representante,
									string $descripcion,
									string $ubicacion,
									string $correo,
									string $telefono,
									int $integrantes,
									string $logo,
									int $comunidad,
									int $estado)
		{
			$this->intIdGrupo = $gpo_id;
			$this->strNombre = $nombre;	
			$this->strRepresentante = $representante;
			$this->strDescripcion = $descripcion;
			$this->strUbicacion = $ubicacion;
			$this->strCorreo = $correo;
			$this->strTelefono = $telefono;
			$this->intNumeroIntegrantes = $integrantes;
			$this->strLogo = $logo;
			$this->intComunidad = $comunidad;
			$this->intEstado = $estado;
	
			$sql = "SELECT gpo_id 
					FROM grupos_organizados 
					WHERE gpo_nombre =  '$this->strNombre' 
					AND gpo_id != $this->intIdGrupo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE grupos_organizados 
						SET gpo_nombre = ?,
							gpo_representante= ?,
							gpo_descripcion = ?,
							gpo_ubicacion= ?,
							gpo_correo = ?,
							gpo_telefono = ?,
							gpo_numero_integrantes = ?,
							gpo_logo = ?, 
							gpo_comunidad = ?,
							gpo_estado = ?
						WHERE gpo_id = $this->intIdGrupo ";

				$arrData = array($this->strNombre,
								$this->strRepresentante,
								$this->strDescripcion,
								$this->strUbicacion,
								$this->strCorreo,
								$this->strTelefono,
								$this->intNumeroIntegrantes,
								$this->strLogo,
								$this->intComunidad,
								$this->intEstado);

				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteGrupo(int $gpo_id)
		{					
			$this->intIdGrupo = $gpo_id;
			$sql = "DELETE FROM grupos_organizados
					WHERE gpo_id = $this->intIdGrupo";
			$request = $this->delete($sql);
			return $request;
			die();
		}
	}
 ?>