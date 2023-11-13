<?php

class Persona extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
	}

	public function Persona()
	{
		if (!in_array($_SESSION['userData']['rol_id'], [1, 2])) {
			header("Location:" . base_url() . '/access_denied');
			// 	header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] 			= "Personas";
		$data['page_title']	 		= "Persona";
		$data['page_name'] 			= "Personas";
		$data['page_functions_js'] 	= "functions_persona.js";
		$this->views->getView($this, "persona", $data);
	}

	public function getAll()
	{
		if (in_array($_SESSION['userData']['rol_id'], [1, 2])) {
			$arrData = $this->model->getAll();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['per_estado'] == 'Activo') {
					$arrData[$i]['per_estado'] = '<span class="badge badge-info">Activo</span>';
				} else {
					$arrData[$i]['per_estado'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center"> sin acciones... </div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getByCedula($cedula)
	{
		if (in_array($_SESSION['userData']['rol_id'], [1, 2])) {
			$cedula = intval($cedula);
			if ($cedula > 0) {
				$arrData = $this->model->getByCedula($cedula);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
