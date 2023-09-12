<?php

class Hospedaje extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(8);
	}

	public function Hospedaje()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 8;
		$data['page_tag'] = "Servicios de Hospedaje";
		$data['page_name'] = "hospedaje";
		$data['page_title'] = "Hospedaje";
		$data['page_functions_js'] = "functions_hospedaje.js";
		$this->views->getView($this, "hospedaje", $data);
	}

	public function getHospedajes()
	{
		$arrData = $this->model->selectHospedajes();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView	=	'';
			$btnEdit	=	'';
			$btnDisable	=	'';
			$btnCheck	=	'';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['hosp_id'] . ')" title="Ver hospedaje">
								<i class="far fa-eye"></i>
							</button>';
			}
			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditHospedaje" onClick="fntEditHospedaje(' . $arrData[$i]['hosp_id'] . ')" title="Editar">
								<i class="fas fa-pencil-alt"></i>
							</button>';
			}
			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDisable = '<button class="btn btn-danger btn-sm btnDisHospedaje" onClick="fntDisHospedaje(' . $arrData[$i]['hosp_id'] . ')" title="Eliminar">
									<i class="far fa-trash-alt"></i>
								</button>';
			}
			
            //boton de revisar
			if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']) {				
				$btnCheck = '<button class="btn btn-warning btn-sm fntCheckHospedaje" onClick="fntCheckHospedaje(' . $arrData[$i]['hosp_id'] . ')" title="Revisar">
								<i class="fas fa-exclamation"></i>
							</button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

			if($arrData[$i]['hosp_estado'] == 1){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

			if($arrData[$i]['hosp_estado'] == 4){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }

			switch ($arrData[$i]['hosp_estado']) {
                case 1:
                    $arrData[$i]['hosp_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['hosp_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['hosp_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['hosp_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }

		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getHospedaje(int $hosp_id)
	{
		$intIdHospedaje = intval(strClean($hosp_id));
		if ($intIdHospedaje > 0) {
			$arrData = $this->model->selectHospedaje($intIdHospedaje);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/hospedajes/' . $arrData['hosp_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setHospedaje()
	{
		$intIdHospedaje	=	intval($_POST['hosp_id']);
		$strHospedaje	=	strClean($_POST['txtNombre']);
		$strDescripcion =	strClean($_POST['txtDescripcion']);
		$strTipo		=	strClean($_POST['txtTipo']);
		$strDireccion	=	strClean($_POST['txtDireccion']);
		$strTelefono	=	strClean($_POST['txtTelefono']);
		$intPrecio		=	intval($_POST['txtPrecio']);
		$intEstado		=	intval($_POST['listEstado']);
	
		$foto			= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 		= 'imageUnavailable.png';
		$request_hospedaje = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdHospedaje == 0) {
			//Crear
			$request_hospedaje = $this->model->insertHospedaje($strHospedaje,
																$strDescripcion,
																$strTipo,
																$strDireccion,
																$strTelefono,
																$intPrecio,
																$imgImagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_hospedaje = $this->model->updateHospedaje($intIdHospedaje, 
																$strHospedaje, 
																$strDescripcion, 
																$strTipo, 
																$strDireccion, 
																$strTelefono, 
																$intPrecio, 
																$imgImagen,
																$intEstado);
			$option = 2;
		}

		if ($request_hospedaje > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('hospedajes', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('hospedajes', $foto, $imgImagen);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('hospedajes', $_POST['foto_actual']);
				}
			}
		} else if ($request_hospedaje == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El hospedaje ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function disHospedaje()
	{
		if ($_POST) {
			$intIdHospedaje = intval($_POST['hosp_id']);
			$requestDisable = $this->model->disableHospedaje($intIdHospedaje);
			if ($requestDisable) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el hospedaje');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el hospedaje.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delHospedaje()
	{
		if ($_POST) {
			$intIdHospedaje = intval($_POST['hosp_id']);
			$requestDelete = $this->model->deleteHospedaje($intIdHospedaje);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el hospedaje');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el hospedaje.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
