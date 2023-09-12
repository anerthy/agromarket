<?php

class Estado extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
	}

	public function getSelectEstados()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectEstados();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
					$htmlOptions .= '<option value="' . $arrData[$i]['edo_id'] . '">' . $arrData[$i]['edo_nombre'] . '</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
}
