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
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function volverseProductor()
    {
        // la cedula y usuario se puede obtener del array SESSION
        // $strUsuario     = strClean($_POST['txtUsuario']);
        // $strCedula      = strClean($_POST['txtCedula']); 
        $strNombre      = strClean($_POST['txtNombre']);
        $strUbicacion   = strClean($_POST['txtUbicacion']);
        $strImagen      = strClean($_POST['txtImagen']); // REVISAR OTROS CRUDS PARA VER EL MANEJO DE IMAGENES, YO NO SE JEJE, GL!

        $request = $this->model->insertProductor(
            $_SESSION['userData']['usr_id'],
            $_SESSION['userData']['per_cedula'],
            $strNombre,
            $strUbicacion,
            $strImagen
        );

        //! REVISAR LOS MENSAJES DE $ARRRESPONSE
        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else if ($request == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! Información ya existente en el sistema');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    // ⚠ METODOS RESTANTES SIN REVISAR ⚠
    public function ProductorForm()
    {
        // Inicializa las variables para que estén definidas
        $nombre = "";
        $ubicacion = "";
        $imagen = "";

        // Verifica si el formulario se ha enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los valores de los campos del formulario
            $nombre = strClean($_POST['txtNombre']);
            $ubicacion = strClean($_POST['txtUbicacion']);
            $imagen = $_FILES['foto']['name']; // Asegúrate de manejar correctamente la imagen

            // Llama a la función insertProductor del modelo
            $result = $this->model->insertProductor($nombre, $ubicacion, $imagen);

            // Realiza cualquier otra lógica que necesites aquí, como manejar la respuesta de la inserción

            // Redirige al usuario después de procesar el formulario
            header('Location: productor.php');
            exit;
        }

        // Resto del código para cargar la vista del formulario aquí
        $data['page_tag'] = "Productor Form";
        $data['page_title'] = "Productor Form";
        $data['page_name'] = "productorform";
        $data['page_functions_js'] = "functions_productor.js";
        $this->views->getView($this, "productorform", $data);
    }

    public function setProductor()
    {
        $intIdProductor = intval($_POST['pdt_id']);
        $strNombre = strClean($_POST['txtNombre']);
        $strUbicacion = strClean($_POST['txtUbicacion']);



        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_Actividad = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdActividad == 0) {
            // Crear
            $request_Actividad = $this->model->insertActividad(
                $strNombre,
                $strUbicacion,
                $imgImagen
            );
            $option = 1;
        } else {

            // Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $option = 2;
        }

        if ($request_Actividad > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('productor', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('productor', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('productor', $_POST['foto_actual']);
                }
            }
        } else if ($request_Actividad == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
