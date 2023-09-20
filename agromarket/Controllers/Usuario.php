<?php

class Usuario extends Controllers
{
	public function __construct()
	{
		// sessionStart();
		parent::__construct();
		// if (empty($_SESSION['login'])) {
		// 	header('Location: ' . base_url() . '/login');
		// }
		// getPermisos(3);
	}

	public function Usuario()
	{
		// if (empty($_SESSION['permisosMod']['ver'])) {
		// 	header("Location:" . base_url() . '/dashboard');
		// }
		$data['page_tag'] 			= "Usuarios del sistema";
		$data['page_title']	 		= "Usuario";
		$data['page_name'] 			= "usuarios";
		$data['page_functions_js'] 	= "functions_usuario.js";
		$this->views->getView($this, "usuario", $data);
	}

	public function setUsuario()
	{
		if ($_POST) {
			//if (($_SESSION['permisosMod']['agregar']) || ($_SESSION['permisosMod']['actualizar'])) {

			if (
				empty($_POST['txtEmail'])
				|| empty($_POST['txtNombre'])
				|| empty($_POST['listRol'])
				|| empty($_POST['txtCedula'])
				|| empty($_POST['listEstado'])
			) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$intId 		= intval($_POST['usr_id']);
				$strEmail 	= strtolower(strClean($_POST['txtEmail']));
				$strNombre 	= ucwords(strClean($_POST['txtNombre']));
				$intRol 	= intval(strClean($_POST['listRol']));
				$strCedula 	= strClean($_POST['txtCedula']);
				$strEstado 	= strClean($_POST['listEstado']);

				if ($intId == 0) {
					$option = 1;
					$strContrasena =  empty($_POST['txtContrasena']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtContrasena']);
					$request_user = $this->model->insertUsuario(
						$strEmail,
						$strNombre,
						$strContrasena,
						$intRol,
						$strCedula,
						$strEstado
					);
				} else {
					$option = 2;
					$strContrasena =  empty($_POST['txtContrasena']) ? "" : hash("SHA256", $_POST['txtContrasena']);
					$request_user = $this->model->updateUsuario(
						$intId,
						$strEmail,
						$strNombre,
						$strContrasena,
						$intRol,
						$strCedula,
						$strEstado
					);
				}

				if ($request_user > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_user == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o el nombre de usuario ya existe, ingrese otro.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			//}
		}
		die();
	}

	public function getAll()
	{
		//if ($_SESSION['permisosMod']['ver']) {
		$arrData = $this->model->getAll();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			if ($arrData[$i]['usr_estado'] == 'Activo') {
				$arrData[$i]['usr_estado'] = '<span class="badge badge-info">Activo</span>';
			} else {
				$arrData[$i]['usr_estado'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['usr_id'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
			$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['usr_id'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
			$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['usr_id'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';

			// // boton de ver
			// if ($_SESSION['permisosMod']['ver']) {
			// 	$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
			// }
			// // boton de actualizar
			// if ($_SESSION['permisosMod']['actualizar']) {
			// 	if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['id_rol'] == 1) ||
			// 		($_SESSION['userData']['id_rol'] == 1 and $arrData[$i]['id_rol'] != 1)
			// 	) {
			// 		$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['id_usuario'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
			// 	} else {
			// 		$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
			// 	}
			// }
			// // boton de eliminar
			// if ($_SESSION['permisosMod']['eliminar']) {
			// 	if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['id_rol'] == 1) ||
			// 		($_SESSION['userData']['id_rol'] == 1 and $arrData[$i]['id_rol'] != 1) and
			// 		($_SESSION['userData']['id_usuario'] != $arrData[$i]['id_usuario'])
			// 	) {
			// 		$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
			// 	} else {
			// 		$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
			// 	}
			// }

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//}
		die();
	}

	public function getById($id)
	{
		//if ($_SESSION['permisosMod']['ver']) {
		$id = intval($id);
		if ($id > 0) {
			$arrData = $this->model->getById($id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		//}
		die();
	}
	public function disable()
	{
		if ($_POST) {
			//if ($_SESSION['permisosMod']['eliminar']) {
			$intId = intval($_POST['usr_id']);
			$requestDisable = $this->model->disable($intId);
			if ($requestDisable) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			//}
		}
		die();
	}

	public function delete()
	{
		if ($_POST) {
			//if ($_SESSION['permisosMod']['eliminar']) {
			$intId = intval($_POST['usr_id']);
			$requestDelete = $this->model->deleteUser($intId);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			//}
		}
		die();
	}

	public function perfil()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "perfil", $data);
	}
}
