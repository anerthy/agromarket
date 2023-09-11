<?php 

	class VoluntariadoModel extends Mysql
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

		public function insertVoluntario(string $nombre, 
										string $apellido1, 
										string $apellido2,
										string $cedula, 
										string $correo,
										string $telefono, 
										string $fecha_nacimiento,
										string $genero,
										string $lugar_residencia){

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
			
			$sql = "SELECT vol_id FROM voluntarios WHERE vol_cedula = '{$this->strCedula}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO voluntarios (vol_nombre, 
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
	}
 ?>
 