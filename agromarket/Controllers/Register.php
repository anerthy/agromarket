<?php

class Register extends Controllers
{
	public function __construct()
	{
		// session_start();
		// if (isset($_SESSION['login'])) {
		// 	header('Location: ' . base_url() . '/dashboard');
		// }
		parent::__construct();
	}

	public function register()
	{
		$data['page_tag']			=	"Register";
		$data['page_title'] 		=	"AgroMarket";
		$data['page_name']			=	"register";
		// $data['page_functions_js'] 	=	"functions_login.js";
		$this->views->getView($this, "register", $data);
	}
}
