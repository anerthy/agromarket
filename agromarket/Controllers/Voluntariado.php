<?php
require_once("Models/Traits/TContenidos.php");
require_once("Models/Traits/TImagenes.php");
class Voluntariado extends Controllers
{
	use TContenidos, TImagenes;
	public function __construct()
	{
		parent::__construct();
	}

	public function voluntariado()
	{
		$data['page_id'] = 10;
		$data['page_tag'] = "Voluntariado";
		$data['page_title'] = "Voluntariado";
		$data['page_name'] = "Voluntariado";
		$data['page_functions_js'] = "functions_voluntariado.js";
		$data['page_content'] = $this->getTextsVoluntariado();
		$data['page_media'] = $this->getImagesVoluntariado();
		$this->views->getView($this, "voluntariado", $data);
	}

	public function addVoluntario()
	{
		$intId_voluntario = intval($_POST['vol_id']);
		$strNombre = strClean($_POST['txtNombre']);
		$strPrimerApellido = strClean($_POST['txtPrimerApellido']);
		$strSegundoApellido = strClean($_POST['txtSegundoApellido']);
		$strCedula = strClean($_POST['txtCedula']);
		$strCorreo = strClean($_POST['txtCorreo']);
		$strTelefono = strClean($_POST['txtTelefono']);
		$strFechaNacimiento =  strClean($_POST['txtFechaNacimiento']);
		$strGenero = strClean($_POST['txtGenero']);
		$strLugarResidencia = strClean($_POST['txtLugarResidencia']);

		$request_voluntario = $this->model->insertVoluntario(
			$strNombre,
			$strPrimerApellido,
			$strSegundoApellido,
			$strCedula,
			$strCorreo,
			$strTelefono,
			$strFechaNacimiento,
			$strGenero,
			$strLugarResidencia
		);

		if ($request_voluntario > 0) {
			$años = date("Y") - substr($strFechaNacimiento, 0, 4);
			$dataEmail = array(
				'email' => EMAIL_REMITENTE,
				'asunto' => 'Nueva solicitud de voluntariado - ' . NOMBRE_REMITENTE,

				'url_proccess' => base_url() . '/voluntario/',

				'vol_nombre' => $strNombre . ' ' . $strPrimerApellido . ' ' . $strSegundoApellido,
				'vol_cedula' => $strCedula,
				'vol_genero' => $strGenero,
				'vol_fecha_nacimiento' => $strFechaNacimiento,
				'vol_edad' => $años,
				'vol_correo' => $strCorreo,
				'vol_telefono' => $strTelefono,
				'vol_residencia' => $strLugarResidencia
			);

			sendEmail($dataEmail, 'notificationNewRequest');

			$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		} else if ($request_voluntario == 'exist') {
			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Voluntario ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
