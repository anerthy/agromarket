<?php
class Register extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function register()
	{
		$data['page_tag']			=	"Register";
		$data['page_title'] 		=	"AgroMarket";
		$data['page_name']			=	"register";
		$data['page_functions_js'] 	=	"functions_register.js";
		$this->views->getView($this, "registro", $data);
	}

	public function registro()
	{
		$data['page_tag']			=	"Register";
		$data['page_title'] 		=	"AgroMarket";
		$data['page_name']			=	"register";
		$data['page_functions_js'] 	=	"functions_register.js";
		$this->views->getView($this, "register", $data);
	}

	public function agregarProductor()
	{
		// $intId_voluntario 		= intval($_POST['vol_id']);
		$strCedula 		= strClean($_POST['icedula']);
		$strNombre 		= strClean($_POST['inombre']);
		$strApellido1	= strClean($_POST['iapellido1']);
		$strApellido2 	= strClean($_POST['iapellido2']);
		$strDireccion 	= strClean($_POST['idireccion']);
		$strEmail 		= strClean($_POST['imail']);
		$strTelefono	= strClean($_POST['itelefono']);
		$strUsuario		= strClean($_POST['iusuario']);
		$strContrasena	= strClean($_POST['icontrasena']);

		$request_voluntario = $this->model->registerPersonUser(
			$strCedula,
			$strNombre,
			$strApellido1,
			$strApellido2,
			$strDireccion,
			$strTelefono,
			$strEmail,
			$strUsuario,
			$strContrasena
		);

		if ($request_voluntario > 0) {
			$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		} else if ($request_voluntario == 'exist') {
			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Voluntario ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function addPersonUser()
	{
		$strCedula 		= strClean($_POST['txtCedula']);
		$strNombre 		= strClean($_POST['txtNombre']);
		$strApellido1 	= strClean($_POST['txtApellido1']);
		$strApellido2 	= strClean($_POST['txtApellido2']);
		$strDireccion 	= strClean($_POST['txtDireccion']);
		$strTelefono	= strClean($_POST['txtTelefono']);
		$strEmail 		= strClean($_POST['txtEmail']);
		$strUsuario 	= strClean($_POST['txtUsuario']);
		$strContrasena 	= strClean($_POST['txtContrasena']);

		$request = $this->model->registerPersonUser(
			$strCedula,
			$strNombre,
			$strApellido1,
			$strApellido2,
			$strDireccion,
			$strTelefono,
			$strEmail,
			$strUsuario,
			$strContrasena
		);

		if ($request > 0) {
			$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		} else if ($request == 'exist') {
			$arrResponse = array('status' => false, 'msg' => '¡Atención! Información ya existente en el sistema');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
