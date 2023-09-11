
<?php

class Transporte extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
	
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(9);
	}

	public function Transporte()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id']			=	9;
		$data['page_tag']			=	"Servicios de Transporte";
		$data['page_name']			=	"transporte";
		$data['page_title']			=	"Transporte";
		$data['page_functions_js']	=	"functions_transporte.js";
		$this->views->getView($this, "transporte", $data);
	}

	public function getTransportes()
	{
		$arrData = $this->model->selectTransportes();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDisable = '';
			$btnCheck = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['trans_id'] . ')" title="Ver transporte">
								<i class="far fa-eye"></i>
							</button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditTransporte" onClick="fntEditTransporte(' . $arrData[$i]['trans_id'] . ')" title="Editar">
								<i class="fas fa-pencil-alt"></i>
							</button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDisable = '<button class="btn btn-danger btn-sm btnDisTransporte" onClick="fntDisTransporte(' . $arrData[$i]['trans_id'] . ')" title="Eliminar">
									<i class="far fa-trash-alt"></i>
								</button>';
			}

			//boton de revisar
            if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']){
                $btnCheck = '<button class="btn btn-warning btn-sm fntCheckTransporte" onClick="fntCheckTransporte(' . $arrData[$i]['trans_id'] . ')" title="Revisar">
									<i class="fas fa-exclamation"></i>
								</button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>'; 
            
            if($arrData[$i]['trans_estado'] == 1){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';  
            }

			if($arrData[$i]['trans_estado'] == 4){
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';  
            }
        
            switch ($arrData[$i]['trans_estado']) {
                case 1:
                    $arrData[$i]['trans_estado'] = '<span class="badge badge-warning">Pendiente</span>';
                  break;
                case 2:
                    $arrData[$i]['trans_estado'] = '<span class="badge badge-info">Activo</span>';
                  break;
                case 3:
                    $arrData[$i]['trans_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                  break;
                case 4:
                    $arrData[$i]['trans_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                  // do something else
              }
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getTransporte(int $trans_id)
	{
		$intIdTransporte = intval(strClean($trans_id));
		if ($intIdTransporte > 0) {
			$arrData = $this->model->selectTransporte($intIdTransporte);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/transportes/' . $arrData['trans_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setTransporte()
	{
		$intIdTransporte 	= 	intval($_POST['trans_id']);
		$strNombre 			=	strClean($_POST['txtNombre']);
		$strDescripcion 	=	strClean($_POST['txtDescripcion']);
		$strClase 			=	strClean($_POST['txtClase']);
		$strTipo 			=	strClean($_POST['txtTipo']);
		$strDisponibilidad 	=	strClean($_POST['txtDisponibilidad']);
		$strTelefono 		=	strClean($_POST['txtTelefono']);
		$intEstado 			=	intval($_POST['listEstado']);

		$foto   		= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 		= 'imageUnavailable.png';
		$request_transporte = "";

		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdTransporte == 0) {
			//Crear
			$request_transporte = $this->model->insertTransporte($strNombre,
																$strDescripcion,
																$strClase,
																$strTipo,
																$strDisponibilidad,
																$strTelefono,
																$imgImagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_transporte = $this->model->updateTransporte($intIdTransporte, 
																$strNombre, 
																$strDescripcion, 
																$strClase, 
																$strTipo, 
																$strDisponibilidad,
																$strTelefono, 
																$imgImagen, 
																$intEstado);
			$option = 2;
		}

		if ($request_transporte > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('transportes', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('transportes', $foto, $imgImagen);
				}


				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('transportes', $_POST['foto_actual']);
				}
			}
		} else if ($request_transporte == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El transporte ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

    public function disTransporte()
    {
        if ($_POST) {
            $intIdTransporte = intval($_POST['trans_id']);
            $requestDisable = $this->model->disableTransporte($intIdTransporte);
            if ($requestDisable) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el registro');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el registro.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

	public function delTransporte()
	{
		if ($_POST) {
			$intIdTransporte = intval($_POST['trans_id']);
			$requestDelete = $this->model->deleteTransporte($intIdTransporte);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el registro');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el registro.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}