<?php

class Productor extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
	}

	public function Productor()
	{
		$data['page_tag'] = "Productor";
		$data['page_title'] = "Productor";
		$data['page_name'] = "productor";
		$data['page_functions_js'] = "functions_productor.js";
		$data['arrData'] = $this->model->getProductor(
			$_SESSION['userData']['usr_id'],
			$_SESSION['userData']['per_cedula']
		);
		$this->views->getView($this, "productor", $data);
	}



	public function getProductor(int $pdt_id)
	{
		$intIdProductor = intval(strClean($pdt_id));
		if ($intIdProductor > 0) {
			$arrData = $this->model->selectUsuario($intIdProductor);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}

		die();
	}
}
