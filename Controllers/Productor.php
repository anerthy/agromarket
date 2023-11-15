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

    public function listado()
    {
        if (!in_array($_SESSION['userData']['rol_id'], [1, 2])) {
            header("Location:" . base_url() . '/access_denied');
            // 	header("Location:" . base_url() . '/dashboard');
        }
        $data['page_tag'] = "Productores";
        $data['page_name'] = "Productores";
        $data['page_title'] = "Productores";
        $data['page_functions_js'] = "functions_productores.js";
        $this->views->getView($this, "productores", $data);
    }

    public function ProductorForm()
    {
        // Resto del código para cargar la vista del formulario aquí
        $data['page_tag'] = "Productor Form";
        $data['page_title'] = "Productor Form";
        $data['page_name'] = "productorform";
        $data['page_functions_js'] = "functions_productor.js";
        $this->views->getView($this, "productorform", $data);
    }

    public function getAll()
    {
        if (in_array($_SESSION['userData']['rol_id'], [1, 2])) {
            $arrData = $this->model->getAll();

            for ($i = 0; $i < count($arrData); $i++) {
                $btnView = '';
                $btnEdit = '';
                $btnDisable = '';

                $btnDisable = '<button class="btn btn-danger btn-sm fntDisProductor" onClick="fntDisProductor(' . $arrData[$i]['per_cedula'] . ')" title="Eliminar"><i class="fa fa-gear"></i></button>';

                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

                switch ($arrData[$i]['pdt_estado']) {
                    case 'Activo':
                        $arrData[$i]['pdt_estado'] = '<span class="badge badge-info">Activo</span>';
                        break;
                    case 'Inactivo':
                        $arrData[$i]['pdt_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case 'Bloqueado':
                        $arrData[$i]['pdt_estado'] = '<span class="badge badge-dark">Bloqueado</span>';
                        break;
                    default:
                        // do something else
                }
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    // sin params como se obtienen los datos de la SESSION
    public function getProductor()
    {
        $arrData = $this->model->getProductor(
            $_SESSION['userData']['usr_id'],
            $_SESSION['userData']['per_cedula']
        );
    
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
            //  $arrData['pdt_imagen'] = media() . '/images/uploads/productores/' . $arrData['pdt_imagen'];
            $arrResponse = array('status' => true, 'data' => $arrData);
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    

    public function volverseProductor()
    {
        $strNombre      = strClean($_POST['txtNombre']);
        $strUbicacion   = strClean($_POST['txtUbicacion']);

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImage     = 'imageUnavailable.png';
        $request = "";
        if ($nombre_foto != '') {
            $imgImage = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        $request = $this->model->insertProductor(
            $_SESSION['userData']['usr_id'],
            $_SESSION['userData']['per_cedula'],
            $strNombre,
            $strUbicacion,
            $imgImage
        );

        //! REVISAR LOS MENSAJES DE $ARRRESPONSE
        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            if ($nombre_foto != '') {
                uploadImage('productores', $foto, $imgImage);
            }
        } else if ($request == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! Información ya existente en el sistema');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    // ACTUAL PERFIL
    public function editarPerfil()
    {
        $strNombre      = strClean($_POST['txtNombre']);
        $strUbicacion   = strClean($_POST['txtUbicacion']);

        // $foto       = $_FILES['foto'];
        // $nombre_foto     = $foto['name'];
        // $type              = $foto['type'];
        // $url_temp        = $foto['tmp_name'];
        // $imgImage     = 'imageUnavailable.png';
        // $request = "";
        // if ($nombre_foto != '') {
        //     $imgImage = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        // }

        $request = $this->model->updateProductor(
            $_SESSION['userData']['usr_id'],
            $_SESSION['userData']['per_cedula'],
            $strNombre,
            $strUbicacion,
            // $imgImage
        );

        //! REVISAR LOS MENSAJES DE $ARRRESPONSE
        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            // if ($nombre_foto != '') {
            //     uploadImage('productores', $foto, $imgImage);
            // }
        } else if ($request == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! Información ya existente en el sistema');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disProductor()
    {
        if ($_POST) {
            if (in_array($_SESSION['userData']['rol_id'], [1, 2])) {
                $strCedula = intval($_POST['per_cedula']);
                $requestDelete = $this->model->disableProductor($strCedula);
                if ($requestDelete) {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha modificado al productor.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al modificar.');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}
