<?php

class Tour extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(7);
	}

	public function Tour()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id']			=	7;
		$data['page_tag']			=	"Tours";
		$data['page_name']			=	"tour";
		$data['page_title']			=	"Tours";
		$data['page_functions_js']	= "functions_tour.js";
		$this->views->getView($this, "tour", $data);
	}

	public function getTours()
	{
		$arrData = $this->model->selectTours();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView	=	'';
			$btnEdit	=	'';
			$btnDisable	=	'';
			$btnCheck	=	'';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['tour_id'] . ')" title="Ver tour">
								<i class="far fa-eye"></i>
							</button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditTour" onClick="fntEditTour(' . $arrData[$i]['tour_id'] . ')" title="Editar">
								<i class="fas fa-pencil-alt"></i>
							</button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDisable = '<button class="btn btn-danger btn-sm btnDisTour" onClick="fntDisTour(' . $arrData[$i]['tour_id'] . ')" title="Eliminar">
									<i class="far fa-trash-alt"></i>
								</button>';
			}

			//boton de revisar
			if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']){
				$btnCheck = '<button class="btn btn-warning btn-sm fntCheckTour" onClick="fntCheckTour(' . $arrData[$i]['tour_id'] . ')" title="Revisar">
								<i class="fas fa-exclamation">
							</i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

			if($arrData[$i]['tour_estado'] == 1){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

            if($arrData[$i]['tour_estado'] == 4){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }
        
            switch ($arrData[$i]['tour_estado']) {
                case 1:
                    $arrData[$i]['tour_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['tour_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['tour_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['tour_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getTour(int $tour_id)
	{
		$intIdTour = intval($tour_id);
		if ($intIdTour > 0) {
			$arrData = $this->model->selectTour($intIdTour);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/tours/' . $arrData['tour_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setTour()
	{
		$intIdTour			=	intval($_POST['tour_id']);
		$strNombre			=	strClean($_POST['txtNombre']);
		$strDescripcion		=	strClean($_POST['txtDescripcion']);
		$strActividad		=	strClean($_POST['txtActividad']);
		$strAlimentacion	=	strClean($_POST['txtAlimentacion']);
		$strHospedaje		=	strClean($_POST['txtHospedaje']);
		$strTransporte		=	strClean($_POST['txtTransporte']);
		$strLugar			=	strClean($_POST['txtLugar']);
		$strDisponibilidad	=	strClean($_POST['txtDisponibilidad']);
		$strHoraInicio		=	strClean($_POST['txtHoraInicio']);
		$strDuracion		=	strClean($_POST['txtDuracion']);
		$strCupoMinimo		=	strClean($_POST['txtCupoMinimo']);
		$strTelefono		=	strClean($_POST['txtTelefono']);
		$intPrecio			=	intval($_POST['txtPrecio']);
		$intEstado			=	intval($_POST['listEstado']);

		$foto   		=	$_FILES['foto'];
		$nombre_foto 	=	$foto['name'];
		$type 		 	=	$foto['type'];
		$url_temp    	=	$foto['tmp_name'];
		$imgImagen 		=	'imageUnavailable.png';

		$request_tour	=	"";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdTour == 0) {
			//Crear
			$request_tour = $this->model->insertTour(	$strNombre,
														$strDescripcion,
														$strActividad,
														$strAlimentacion,
														$strHospedaje,
														$strTransporte,
														$strLugar,
														$strDisponibilidad,
														$strHoraInicio,
														$strDuracion,
														$strCupoMinimo,
														$strTelefono,
														$intPrecio,
														$imgImagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgPortada = $_POST['foto_actual'];
				}
			}
			$request_tour = $this->model->updateTour(	$intIdTour,
														$strNombre,
														$strDescripcion,
														$strActividad,
														$strAlimentacion,
														$strHospedaje,
														$strTransporte,
														$strLugar,
														$strDisponibilidad,
														$strHoraInicio,
														$strDuracion,
														$strCupoMinimo,
														$strTelefono,
														$intPrecio,
														$imgImagen,
														$intEstado);
			$option = 2;
		}

		if ($request_tour > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('tours', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('tours', $foto, $imgImagen);
				}


				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('tours', $_POST['foto_actual']);
				}
			}
		} else if ($request_tour == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Tour ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function disTour()
	{
		if ($_POST) {
			$intIdTour = intval($_POST['tour_id']);
			$requestDisable = $this->model->disableTour($intIdTour);
			if ($requestDisable) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tour');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el tour.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delTour()
	{
		if ($_POST) {
			$intIdTour = intval($_POST['tour_id']);
			$requestDelete = $this->model->deleteTour($intIdTour);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tour');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el tour.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
