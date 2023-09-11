<?php

class Especie extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(13);
	}

	public function Especie()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 13;
		$data['page_tag'] = "Especies";
		$data['page_name'] = "Especies";
		$data['page_title'] = "Especies";
		$data['page_functions_js'] = "functions_especie.js";
		$this->views->getView($this, "especie", $data);
	}

	public function getEspecies()
	{
		$arrData = $this->model->selectEspecies();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['esp_id'] . ')" title="Ver Especie"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditEspecie" onClick="fntEditEspecie(' . $arrData[$i]['esp_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelEspecie" onClick="fntDelEspecie(' . $arrData[$i]['esp_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			// Estilo de los estados
			switch ($arrData[$i]['esp_estado']) {
                case 1:
                    $arrData[$i]['esp_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['esp_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['esp_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['esp_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getEspecie(int $esp_id)
	{
		$intIdEspecie = intval(strClean($esp_id));
		if ($intIdEspecie > 0) {
			$arrData = $this->model->selectEspecie($intIdEspecie);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/especies/' . $arrData['esp_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setEspecie()
	{

		$intIdEspecie = intval($_POST['esp_id']);
		$strNombreCientifico =  strClean($_POST['txtNombreCientifico']);
		$strNombreComun =  strClean($_POST['txtNombreComun']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$intEstado = intval($_POST['listEstado']);

		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 	= 'imageUnavailable.png';
		$request_especie = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdEspecie == 0) {

			//Crear
			$request_especie = $this->model->insertEspecie(
				$strNombreCientifico,
				$strNombreComun,
				$strDescripcion,
				$intEstado,
				$imgImagen
			);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_especie = $this->model->updateEspecie($intIdEspecie,$strNombreCientifico,$strNombreComun,$strDescripcion,$intEstado,$imgImagen);
			$option = 2;
		}

		if ($request_especie > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('especies', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('especies', $foto, $imgImagen);
				}


				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('especies', $_POST['foto_actual']);
				}
			}
		} else if ($request_especie == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! La especie ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delEspecie()
	{
		if ($_POST) {
			$intIdEspecie = intval($_POST['esp_id']);
			$requestDelete = $this->model->deleteEspecie($intIdEspecie);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la especie');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar a el registro.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}
}
