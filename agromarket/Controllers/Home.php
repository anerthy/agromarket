<?php
require_once("Models/Traits/TProducto.php");
require_once("Models/Traits/TAnuncio.php");
class Home extends Controllers
{
	use TProducto, TAnuncio;
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
		$data['anuncio_principal'] = $this->anuncio_principal();
		$this->views->getView($this, "home", $data);
	}

	public function about_us()
	{
		$this->views->getView($this, "about-us");
	}
}
