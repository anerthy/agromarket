<?php 
	class VoluntarioModel extends Mysql
	{
        public   $intIdVoluntario;
        public   $strNombre;
        public   $strPrimerApellido;
        public   $strSegundoApellido; 
        public   $strCedula;
        public   $strCorreo; 
        public   $strTelefono; 
        public   $strFechaNacimiento;
        public   $strGenero;
        public   $strLugarResidencia;
        public   $intEstado;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function selectVoluntarios()
		{
			$isAdmin = " WHERE vol_estado IN (2,3)";
			
			$roles = array(2,3,4);// Administrador Desarrollador y Supervisor
			if (in_array($_SESSION['userData']['id_rol'], $roles)) {
				$isAdmin = " WHERE vol_estado IN (1,2,3)";
			}

        if($_SESSION['userData']['id_rol'] == 1){
            $isAdmin = " ";
        }
			$sql = "SELECT	vol_id, 
							vol_nombre, 
							CONCAT(vol_primer_apellido,' ',vol_segundo_apellido) as vol_apellidos, 
							vol_cedula, 
							vol_correo, 
							vol_telefono, 
							FLOOR(DATEDIFF(NOW(),vol_fecha_nacimiento) / 365.25) AS vol_edad, 
							vol_genero, 
							vol_lugar_residencia, 
							vol_estado 
					FROM voluntarios "
					. $isAdmin;
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectVoluntario(int $vol_id)
		{
			$this->intIdVoluntario = $vol_id;
			$sql = "SELECT	vol_id, 
							vol_nombre, 
							vol_primer_apellido, 
							vol_segundo_apellido, 
							vol_cedula, 
							vol_correo, 
							vol_telefono,
							vol_fecha_nacimiento, 
							vol_genero, 
							vol_lugar_residencia, 
							vol_estado 
					FROM voluntarios 
					WHERE vol_id = $this->intIdVoluntario";
			$request = $this->select($sql);
			return $request;
		}

		public function getInfoVoluntario(int $vol_id)
		{
			$this->intIdVoluntario = $vol_id;
			$sql = "SELECT	vol_id, 
							CONCAT(vol_nombre, ' ', vol_primer_apellido, ' ', vol_segundo_apellido) as vol_nombre,
							vol_correo
					FROM voluntarios 
					WHERE vol_id = $this->intIdVoluntario";
			$request = $this->select($sql);
			return $request;
		}

		public function insertVoluntario(	string $nombre, 
											string $apellido1, 
											string $apellido2,
											string $cedula, 
											string $correo,
											string $telefono, 
											string $fecha_nacimiento,
											string $genero,
											string $lugar_residencia)
		{
			$return = "";
			$this->strNombre = $nombre;
			$this->strPrimerApellido = $apellido1;		
			$this->strSegundoApellido = $apellido2;
			$this->strCedula = $cedula;
			$this->strCorreo = $correo;
			$this->strTelefono = $telefono;
			$this->strFechaNacimiento = $fecha_nacimiento;
			$this->strGenero = $genero;
			$this->strLugarResidencia = $lugar_residencia;
			$return = 0;

			$sql = "SELECT vol_id,vol_nombre 
					FROM voluntarios 
					WHERE vol_cedula = '{$this->strCedula}' 
					OR vol_correo = '{$this->strCorreo}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = 	"INSERT INTO voluntarios (vol_nombre, 
															vol_primer_apellido, 
															vol_segundo_apellido, 
															vol_cedula, 
															vol_correo, 
															vol_telefono, 
															vol_fecha_nacimiento, 
															vol_genero, 
															vol_lugar_residencia) 
									VALUES(?,?,?,?,?,?,?,?,?)";

	        	$arrData = array($this->strNombre,
								$this->strPrimerApellido,
								$this->strSegundoApellido,
								$this->strCedula,
								$this->strCorreo,
								$this->strTelefono,
								$this->strFechaNacimiento,
								$this->strGenero,
								$this->strLugarResidencia);
	        
					$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateVoluntario(int $vol_id,
										string $nombre,
										string $apellido1,
										string $apellido2,
		 								string $cedula,
										string $correo,
										string $telefono,
										string $fecha_nacimiento, 
										string $genero, 
										string $lugar_residencia, 
										int $estado)
		{
			$this->intIdVoluntario = $vol_id;
		    $this->strNombre = $nombre;
			$this->strPrimerApellido = $apellido1;
			$this->strSegundoApellido = $apellido2;
			$this->strCedula = $cedula;
			$this->strCorreo = $correo;
			$this->strTelefono = $telefono;
			$this->strFechaNacimiento = $fecha_nacimiento;
			$this->strGenero = $genero;
			$this->strLugarResidencia = $lugar_residencia;
			$this->intEstado = $estado;

			$sql = "SELECT vol_id 
					FROM voluntarios 
					WHERE vol_nombre =  '$this->strNombre' 
					AND vol_id != $this->intIdVoluntario";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE voluntarios 
						SET vol_nombre = ?,
							vol_primer_apellido = ?,
							vol_segundo_apellido = ?,
							vol_cedula = ?,
							vol_correo = ?,
							vol_telefono = ?,
							vol_fecha_nacimiento= ?, 
							vol_genero= ?, 
							vol_lugar_residencia = ?,
							vol_estado = ? 
						WHERE vol_id = $this->intIdVoluntario ";

				$arrData = array($this->strNombre,
								$this->strPrimerApellido,
								$this->strSegundoApellido,
								$this->strCedula,
								$this->strCorreo,
								$this->strTelefono,
								$this->strFechaNacimiento,
								$this->strGenero,
								$this->strLugarResidencia,
								$this->intEstado);

				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function acceptVoluntario(int $vol_id)
		{					
			$this->intIdVoluntario = $vol_id;
			$sql = "UPDATE voluntarios
					SET vol_estado = 2 
					WHERE vol_id = $this->intIdVoluntario";
			$request = $this->update($sql);
			return $request;
			die();
		}

		public function disableVoluntario(int $vol_id)
		{					
			$this->intIdVoluntario = $vol_id;
			$sql = "UPDATE voluntarios
					SET vol_estado = 4 
					WHERE vol_id = $this->intIdVoluntario";
			$request = $this->update($sql);
			return $request;
			die();
		}

		public function deleteVoluntario(int $vol_id)
		{					
			$this->intIdVoluntario = $vol_id;
			$sql = "DELETE FROM voluntarios 
					WHERE vol_id = $this->intIdVoluntario";
		
			$request = $this->delete($sql);
			return $request;
			die();
		}
	}
