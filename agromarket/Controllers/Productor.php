<?php 

	class Productor extends Controllers{
		public function __construct()
		{
			parent::__construct();
			//session_start();
			//if(empty($_SESSION['login']))
			//{
			//	header('Location: '.base_url().'/login');
				die();
			//}
			//getPermisos(MUSUARIOS);
		}

		public function Productor()
{
    /*
    if(empty($_SESSION['permisosMod']['r'])){
        header("Location:".base_url().'/dashboard');
    }
    */
    $data['page_tag'] = "Productor";
    $data['page_title'] = "Productor";
    $data['page_name'] = "productor";
    $data['page_functions_js'] = "functions_productor.js";
    $this->views->getView($this,"productor",$data);
}

		public function setProductor(){ //NOMBRE, UBICACION Y IMAGEN
			if($_POST){			
				if(empty($_POST['txtNombre']) || empty($_POST['txtUbicacion']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strUbicacion = ucwords(strClean($_POST['txtUbicacion']));
					
					
					$request_user = "";
					if($idUsuario == 0)
					{
						$option = 1;

						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertProductor($strNombre, 
																				$strUbicacion, 
																				 );
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateProductor($strCedula,
								                                         $strNombre,
							                                             $strUbicacion 
																			);
						}

					}

					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

         
		public function getProductor($idProductor){
			if($_SESSION['permisosMod']['r']){
				$pdt_id = intval($intIdProductor);
				if($intIdProductor > 0)
				{
					$arrData = $this->model->selectProductor($intIdProductor);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		


		public function putPerfil(){
			if($_POST){
				if(empty($_POST['txtCedula']) || empty($_POST['txtNombre']) || empty($_POST['txtUbicacion'])   )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					$idProductor = $_SESSION['idProductor'];
					$strCedula = strClean($_POST['txtCedula']);
					$strNombre = strClean($_POST['txtNombre']);
					$strUbicacion = strClean($_POST['txtUbicacion']);
					
					
					$request_user = $this->model->updatePerfil( $strCedula,
						                                        $strNombre,
																$strUbicacion, 
																
																);
					if($request_user)
					{
						sessionUser($_SESSION['idUser']);
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	}
 ?>