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
		$this->views->getView($this, "register", $data);
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
