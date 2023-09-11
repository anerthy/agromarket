<?php

class Comunidad extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(5);
	}

	public function Comunidad()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 5;
		$data['page_tag'] = "Comunidades";
		$data['page_name'] = "comunidades";
		$data['page_title'] = "Comunidades";
		$data['page_functions_js'] = "functions_comunidad.js";
		$this->views->getView($this, "comunidad", $data);
	}

	public function getComunidades()
	{
		$arrData = $this->model->selectComunidades();
		for ($i = 0; $i < count($arrData); $i++) {

			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['com_id'] . ')" title="Ver comunidad"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditComunidad" onClick="fntEditComunidad(' . $arrData[$i]['com_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelComunidad" onClick="fntDelComunidad(' . $arrData[$i]['com_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectComunidades()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectComunidades();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				$htmlOptions .= '<option value="' . $arrData[$i]['com_id'] . '">' . $arrData[$i]['com_nombre'] . '</option>';
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getComunidad(int $com_id)
	{
		$intIdComunidad = intval(strClean($com_id));
		if ($intIdComunidad > 0) {
			$arrData = $this->model->selectComunidad($intIdComunidad);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/comunidades/' . $arrData['com_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setComunidad()
	{
		$intIdComunidad = intval($_POST['com_id']);
		$strComunidad =  strClean($_POST['txtNombre']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strProvincia = strClean($_POST['txtProvincia']);
		$strCanton = strClean($_POST['txtCanton']);
		$strDistrito = strClean($_POST['txtDistrito']);

		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen	= 'imageUnavailable.png';
		$request_comunidad = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdComunidad == 0) {
			//Crear
			$request_comunidad = $this->model->insertComunidad(	$strComunidad, 
																$strDescripcion, 
																$strProvincia, 
																$strCanton, 
																$strDistrito, 
																$imgImagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_comunidad = $this->model->updateComunidad(	$intIdComunidad, 
																$strComunidad, 
																$strDescripcion, 
																$strProvincia, 
																$strCanton, 
																$strDistrito, 
																$imgImagen);
			$option = 2;
		}

		if ($request_comunidad > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('comunidades', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('comunidades', $foto, $imgImagen);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('comunidades', $_POST['foto_actual']);
				}
			}
		} else if ($request_comunidad == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! La comunidad ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delComunidad()
	{
		if ($_POST) {
			$intIdComunidad = intval($_POST['com_id']);
			$requestDelete = $this->model->deleteComunidad($intIdComunidad);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la comunidad');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una comunidad asociada a un grupo.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la comunidad.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}