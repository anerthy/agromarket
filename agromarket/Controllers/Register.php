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
		// $data['page_functions_js'] 	=	"functions_login.js";
		$this->views->getView($this, "register", $data);
	}

	public function registerPersonUser()
	{
		$strCedula = strClean($_POST['txtNombre']);
		$strNombre = strClean($_POST['txtNombre']);
		$strApellido1 = strClean($_POST['txtNombre']);
		$strApellido2 = strClean($_POST['txtNombre']);
		$strDireccion = strClean($_POST['txtNombre']);
		$strTelefono = strClean($_POST['txtNombre']);
		$strEmail = strClean($_POST['txtNombre']);
		$strUsuario = strClean($_POST['txtNombre']);
		$strContrasena = strClean($_POST['txtNombre']);


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
			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
