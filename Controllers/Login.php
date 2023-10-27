<?php

class Login extends Controllers
{
	public function __construct()
	{
		session_start();
		if (isset($_SESSION['login'])) {
			header('Location: ' . base_url() . '/dashboard');
		}
		parent::__construct();
	}

	public function login()
	{
		$data['page_tag']			=	"Login";
		$data['page_title'] 		=	"AgroMarket";
		$data['page_name']			=	"login";
		$data['page_functions_js'] 	=	"functions_login.js";
		$this->views->getView($this, "login", $data);
	}

	public function loginUser()
	{
		if ($_POST) {
			if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			} else {
				$strUsuario  =  strtolower(strClean($_POST['txtEmail']));
				$strPassword = hash("SHA256", $_POST['txtPassword']);
				$requestUser = $this->model->loginUser($strUsuario, $strPassword);
				if (empty($requestUser)) {
					$arrResponse = array('status' => false, 'msg' => 'El correo o la contraseña son incorrectos.');
				} else {
					$arrData = $requestUser;
					if ($arrData['usr_estado'] == 'Activo') {
						$_SESSION['usr_id']		=	$arrData['usr_id'];
						$_SESSION['login']		=	true;
						$_SESSION['timeout']	=	true;
						$_SESSION['inicio']		=	time();

						$arrData = $this->model->sessionLogin($_SESSION['usr_id']);
						sessionUser($_SESSION['usr_id']);
						$arrResponse = array('status' => true, 'msg' => 'ok');
					} else {
						$arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function resetPass()
	{
		if ($_POST) {
			error_reporting(0);

			if (empty($_POST['txtEmailReset'])) {
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			} else {
				$token = token();
				$strEmail  =  strtolower(strClean($_POST['txtEmailReset']));
				$arrData = $this->model->getUserEmail($strEmail);

				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Usuario no existente.');
				} else {
					$id_usuario = $arrData['usr_id'];
					$nombreUsuario = $arrData['usr_nombre'];

					$url_recovery = base_url() . '/login/confirmUser/' . $strEmail . '/' . $token;
					$requestUpdate = $this->model->setTokenUser($id_usuario, $token);

					$dataEmail = array(
						'nombre' => $nombreUsuario,
						'email' => $strEmail,
						'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
						'url_recovery' => $url_recovery
					);
					if ($requestUpdate) {
						$sendEmail = sendEmail($dataEmail, 'email_cambioPassword');
						if ($sendEmail) {
							$arrResponse = array(
								'status' => true,
								'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.'
							);
						} else {
							$arrResponse = array(
								'status' => false,
								'msg' => 'No es posible realizar el proceso, intenta más tarde.'
							);
						}
					} else {
						$arrResponse = array(
							'status' => false,
							'msg' => 'No es posible realizar el proceso, intenta más tarde.'
						);
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function confirmUser(string $params)
	{

		if (empty($params)) {
			header('Location: ' . base_url());
		} else {
			$arrParams = explode(',', $params);
			$strEmail = strClean($arrParams[0]);
			$strToken = strClean($arrParams[1]);
			$arrResponse = $this->model->getUsuario($strEmail, $strToken);
			if (empty($arrResponse)) {
				header("Location: " . base_url());
			} else {
				$data['page_tag'] = "Cambiar contraseña";
				$data['page_name'] = "cambiar_contrasenia";
				$data['page_title'] = "Cambiar Contraseña";
				$data['usr_correo'] = $strEmail;
				$data['usr_token'] = $strToken;
				$data['usr_id'] = $arrResponse['usr_id'];
				$data['page_functions_js'] = "functions_login.js";
				$this->views->getView($this, "cambiar_password", $data);
			}
		}
		die();
	}

	public function setPassword()
	{

		if (
			empty($_POST['usr_id']) ||
			empty($_POST['txtEmail']) ||
			empty($_POST['txtToken']) ||
			empty($_POST['txtPassword']) ||
			empty($_POST['txtPasswordConfirm'])
		) {

			$arrResponse = array(
				'status' => false,
				'msg' => 'Error de datos'
			);
		} else {
			$intIdusuario = intval($_POST['usr_id']);
			$strPassword = $_POST['txtPassword'];
			$strPasswordConfirm = $_POST['txtPasswordConfirm'];
			$strEmail = strClean($_POST['txtEmail']);
			$strToken = strClean($_POST['txtToken']);

			if ($strPassword != $strPasswordConfirm) {
				$arrResponse = array(
					'status' => false,
					'msg' => 'Las contraseñas no son iguales.'
				);
			} else {
				$arrResponseUser = $this->model->getUsuario($strEmail, $strToken);
				if (empty($arrResponseUser)) {
					$arrResponse = array(
						'status' => false,
						'msg' => 'Error de datos.'
					);
				} else {
					$strPassword = hash("SHA256", $strPassword);
					$requestPass = $this->model->insertPassword($intIdusuario, $strPassword);

					if ($requestPass) {
						$arrResponse = array(
							'status' => true,
							'msg' => 'Contraseña actualizada con éxito.'
						);
					} else {
						$arrResponse = array(
							'status' => false,
							'msg' => 'No es posible realizar el proceso, intente más tarde.'
						);
					}
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
