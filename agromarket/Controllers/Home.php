<?php
require_once("Models/Traits/TContenidos.php");
require_once("Models/Traits/TImagenes.php");
class Home extends Controllers
{
	use TContenidos, TImagenes;
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Home";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = $this->getTextsInicio();
		$data['page_media'] = $this->getImagesInicio();
		$this->views->getView($this, "home", $data);
	}
}
