<?php

class Galeria extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(12);
	}

	public function Galeria()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id']			=	12;
		$data['page_tag']			=	"Galería de imagenes";
		$data['page_name']			=	"galería";
		$data['page_title']			=	"Galería  de imagenes";
		$data['page_functions_js']	=	"functions_galeria.js";
		$this->views->getView($this, "galeria", $data);
	}

	public function getGalerias()
	{
		$arrData = $this->model->selectGalerias();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView	=	'';
			$btnEdit	=	'';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['gal_id'] . ')" title="Ver galeria">
								<i class="far fa-eye"></i>
							</button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditGaleria" onClick="fntEditGaleria(' . $arrData[$i]['gal_id'] . ')" title="Editar">
								<i class="fas fa-pencil-alt"></i>
							</button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getGaleria(int $gal_id)
	{
		$intGalIdGaleria = intval(strClean($gal_id));
		if ($intGalIdGaleria > 0) {
			$arrData = $this->model->selectGaleria($intGalIdGaleria);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/galeria/' . $arrData['gal_url'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setGaleria()
	{
		$intGalIdGaleria	=	intval($_POST['gal_id']);
		$strTitulo			=	strClean($_POST['txtTitulo']);
		$strDescripcion		=	strClean($_POST['txtDescripcion']);

		$foto   		=	$_FILES['foto'];
		$nombre_foto 	=	$foto['name'];
		$type 		 	=	$foto['type'];
		$url_temp    	=	$foto['tmp_name'];
		$imgImagen		=	'imageUnavailable.png';

		$request_galeria = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intGalIdGaleria == 0) {
			$request_galeria = $this->model->insertGaleria(
				$strTitulo,
				$strDescripcion,
				$imgImagen
			);
			$option = 1;
		} else {
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_galeria = $this->model->updateGaleria(
				$intGalIdGaleria,
				$strTitulo,
				$strDescripcion,
				$imgImagen
			);
			$option = 2;
		}

		if ($request_galeria > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('galeria', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('galeria', $foto, $imgImagen);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('galeria', $_POST['foto_actual']);
				}
			}
		} else if ($request_galeria == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! La Galeria ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}