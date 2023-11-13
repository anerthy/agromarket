<?php
require_once("Models/Traits/TProducto.php");
require_once("Models/Traits/TAnuncio.php");
require_once("Models/Traits/TActividad.php");

require_once("Models/DonacionModel.php");
require_once("Models/ProductorModel.php");
require_once("Models/ProductoModel.php");
class Home extends Controllers
{
	use TProducto, TAnuncio, TActividad;
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
		$modelo = new DonacionModel();
		$data['arrData'] = $modelo->getAll();
		$this->views->getView($this, "about-us", $data);
	}

	public function Productos()
	{
		$data['listado_productos'] = $this->listadoProductos();
		$this->views->getView($this, "Producto/productos", $data);
	}

	public function Productor()
	{
		$modeloproductor = new ProductorModel();
		$data['arrData'] = $modeloproductor->selectProductores();
		$this->views->getView($this, "Productor/productor_info", $data);
	}

	public function PerfilInInfo()
	{

		$modelproductor = new ProductorModel();
		$id = $_GET['usr_id'];
		$data['arrData'] = $modelproductor->getProductorInfo($id);
		$data['arrDatapro'] = $modelproductor->getProductoInfo($id);
		$this->views->getView($this, "Productor/perfil_info", $data);
	}

	public function Actividad()
	{
		$data['listado_actividades'] = $this->listadoActividades();
		$this->views->getView($this, "Actividad/actividad_info", $data);
	}

	public function DetallesProducto(int $id)
	{
		$data['producto'] = $this->getProductById($id);
		$data['anuncio_principal'] = $this->anuncio_principal();
		$this->views->getView($this, "Producto/detallesproducto", $data);
	}

	public function contacto()
	{
		$this->views->getView($this, "contacto");
	}
}
