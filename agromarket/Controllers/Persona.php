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
		//  getPermisos(3);
	}

	public function Persona()
	{
		// if (empty($_SESSION['permisosMod']['ver'])) {
		// 	header("Location:" . base_url() . '/dashboard');
		// }
		$data['page_tag'] 			= "Personas";
		$data['page_title']	 		= "Persona";
		$data['page_name'] 			= "Personas";
		$data['page_functions_js'] 	= "functions_persona.js";
		$this->views->getView($this, "persona", $data);
	}

	public function getAll()
	{
		//if ($_SESSION['permisosMod']['ver']) {
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

			// $btnView = '<button class="btn btn-info btn-sm btnViewPersona" onClick="fntViewPersona(' . $arrData[$i]['per_cedula'] . ')" title="Ver Persona"><i class="far fa-eye"></i></button>';
			// $btnEdit = '<button class="btn btn-primary  btn-sm btnEditPersona" onClick="fntEditPersona(this,' . $arrData[$i]['per_cedula'] . ')" title="Editar Persona"><i class="fas fa-pencil-alt"></i></button>';
			// $btnDelete = '<button class="btn btn-danger btn-sm btnDelPersona" onClick="fntDelPersona(' . $arrData[$i]['per_cedula'] . ')" title="Eliminar Persona"><i class="far fa-trash-alt"></i></button>';

			$arrData[$i]['options'] = '<div class="text-center"> sin acciones... </div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//}
		die();
	}

	public function getByCedula($cedula)
	{
		//if ($_SESSION['permisosMod']['ver']) {
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
		//}
		die();
	}
}
