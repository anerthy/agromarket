<?php

class Voluntario extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(10);
	}

	public function Voluntario()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 10;
		$data['page_tag'] = "Voluntarios";
		$data['page_name'] = "voluntario";
		$data['page_title'] = "Voluntarios";
		$data['page_functions_js'] = "functions_voluntario.js";
		$this->views->getView($this, "voluntario", $data);
	}

	public function getVoluntarios()
	{
		$arrData = $this->model->selectVoluntarios();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDisable = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['vol_id'] . ')" title="Ver voluntario"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditVoluntario" onClick="fntEditVoluntario(' . $arrData[$i]['vol_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDisable = '<button class="btn btn-danger btn-sm btnDisVoluntario" onClick="fntDisVoluntario(' . $arrData[$i]['vol_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			//boton de revisar
			if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']) {
				$btnCheck = '<button class="btn btn-warning btn-sm fntCheckVoluntario" onClick="fntCheckVoluntario(' . $arrData[$i]['vol_id'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

			if ($arrData[$i]['vol_estado'] == 1) {
				$arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';
			}

			if ($arrData[$i]['vol_estado'] == 4) {
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';
			}

			// Estilo de los estados
			switch ($arrData[$i]['vol_estado']) {
				case 1:
					$arrData[$i]['vol_estado'] = '<span class="badge badge-warning">Pendiente</span>';
					break;
				case 2:
					$arrData[$i]['vol_estado'] = '<span class="badge badge-info">Activo</span>';
					break;
				case 3:
					$arrData[$i]['vol_estado'] = '<span class="badge badge-danger">Inactivo</span>';
					break;
				case 4:
					$arrData[$i]['vol_estado'] = '<span class="badge badge-dark">Eliminado</span>';
					break;
				default:
					// do something else
			}
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getVoluntario(int $vol_id)
	{
		$intIdVoluntario = intval($vol_id);
		if ($intIdVoluntario > 0) {
			$arrData = $this->model->selectVoluntario($intIdVoluntario);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {

				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setVoluntario()
	{
		$intIdVoluntario = intval($_POST['vol_id']);
		$strNombre = strClean($_POST['txtNombre']);
		$strPrimerApellido = strClean($_POST['txtPrimerApellido']);
		$strSegundoApellido = strClean($_POST['txtSegundoApellido']);
		$strCedula = strClean($_POST['txtCedula']);
		$strCorreo = strClean($_POST['txtCorreo']);
		$strTelefono = strClean($_POST['txtTelefono']);
		$strFechaNacimiento =  strClean($_POST['txtFechaNacimiento']);
		$strGenero = strClean($_POST['txtGenero']);
		$strLugarResidencia = strClean($_POST['txtLugarResidencia']);
		$intEstado = intval($_POST['listEstado']);

		if ($intIdVoluntario == 0) {
			//Crear
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
			$option = 1;
		} else {
			//Actualizar
			$request_voluntario = $this->model->updateVoluntario(
				$intIdVoluntario,
				$strNombre,
				$strPrimerApellido,
				$strSegundoApellido,
				$strCedula,
				$strCorreo,
				$strTelefono,
				$strFechaNacimiento,
				$strGenero,
				$strLugarResidencia,
				$intEstado
			);
			$option = 2;
		}

		if ($request_voluntario > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
			}
		} else if ($request_voluntario == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Voluntario ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function acceptVoluntario()
	{
		if ($_POST) {
			$intIdVoluntario = intval($_POST['vol_id']);
			$requestAccept = $this->model->acceptVoluntario($intIdVoluntario);
			if ($requestAccept) {

				$info = $this->model->getInfoVoluntario($intIdVoluntario);

				$dataEmail = array(
					'nombre' => $info['vol_nombre'],
					'email' => $info['vol_correo'],
					'asunto' => 'Bienvenida al programa de voluntariado - ' . NOMBRE_REMITENTE
				);
				sendEmail($dataEmail, 'notificationWelcomeVoluntario');

				$arrResponse = array('status' => true, 'msg' => 'Se ha aceptado a el voluntario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al aceptar el voluntario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function disVoluntario()
	{
		if ($_POST) {
			$intIdVoluntario = intval($_POST['vol_id']);
			$requestDisable = $this->model->disableVoluntario($intIdVoluntario);
			if ($requestDisable) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el voluntario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el voluntario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delVoluntario()
	{
		if ($_POST) {
			$intIdVoluntario = intval($_POST['vol_id']);

			$info = $this->model->getInfoVoluntario($intIdVoluntario);
			$dataEmail = array(
				'nombre' => $info['vol_nombre'],
				'email' => $info['vol_correo'],
				'asunto' => 'Solicitud rechazada - ' . NOMBRE_REMITENTE
			);

			$requestDelete = $this->model->deleteVoluntario($intIdVoluntario);

			if ($requestDelete) {
				sendEmail($dataEmail, 'notificationRejectedVoluntario');
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el voluntario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el voluntario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
