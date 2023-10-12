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

    public function ProductorForm()
    {
        // Resto del código para cargar la vista del formulario aquí
        $data['page_tag'] = "Productor Form";
        $data['page_title'] = "Productor Form";
        $data['page_name'] = "productorform";
        $data['page_functions_js'] = "functions_productor.js";
        $this->views->getView($this, "productorform", $data);
    }

    public function ProductorInfo()
    {
        // Resto del código para cargar la vista del formulario aquí
        $data['page_tag'] = "Productor Info";
        $data['page_title'] = "Productor Info";
        $data['page_name'] = "productor_info";
        $data['arrData'] = $this->model->selectProductores();
        $this->views->getView($this, "productor_info", $data);
    }

    public function PerfilInInfo()
    {
        // Resto del código para cargar la vista del formulario aquí
        $data['page_tag'] = "Perfil Info";
        $data['page_title'] = "Perfil Info";
        $data['page_name'] = "perfil_info";
        $data['arrData'] = $this->model->selectProductores();
        $this->views->getView($this, "perfil_info", $data);
    }

    // sin params como se obtienen los datos de la SESSION
    public function getProductor(/*int $usuario, string $cedula*/)
    {
        $arrData = $this->model->getProductor(
            $_SESSION['userData']['usr_id'],
            $_SESSION['userData']['per_cedula']
        );
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
            $arrData['pdt_imagen'] = media() . '/images/uploads/productores/' . $arrData['pdt_imagen'];
          
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

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
}
