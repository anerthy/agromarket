<?php
require_once("Models/Traits/TProducto.php");
class Home extends Controllers
{
	use TProducto;
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
		$data['listado_productos'] = $this->listadoProductos();
		$data['productos_premium'] = $this->productosPremium();
		$this->views->getView($this, "home", $data);
	}

	public function about_us()
	{
		$this->views->getView($this, "about-us");
	}
}
