<?php
require_once("Models/Traits/TProductor.php");
class Dashboard extends Controllers
{
	use TProductor;
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(1);
	}

	public function dashboard()
	{
		if (!in_array($_SESSION['userData']['rol_id'], [1, 2,3,4])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id']	=	1;
		$data['page_tag']	=	"Panel de control";
		$data['page_title']	=	"Panel de control";
		$data['page_name']	=	"Panel de control";
		$data['existe_productor'] = $this->existeProductor();
		$this->views->getView($this, "dashboard", $data);
	}
}
