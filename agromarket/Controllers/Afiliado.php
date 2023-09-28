<?php

class Afiliado extends Controllers
{
    public function __construct()
    {
        // sessionStart();
        parent::__construct();

        // if (empty($_SESSION['login'])) {
        //     header('Location: ' . base_url() . '/login');
        // }
        // getPermisos(6);
    }

    public function Afiliado()
    {
        // if (empty($_SESSION['permisosMod']['ver'])) {
        //     header("Location:" . base_url() . '/access_denied');
        // }
        $data['page_id'] = 6;
        $data['page_tag'] = "Afiliados";
        $data['page_name'] = "afiliado";
        $data['page_title'] = "afiliado";
        $data['page_functions_js'] = "functions_afiliado.js";
        $this->views->getView($this, "afiliado", $data);
    }

    public function setAfiliado()
    {
        $intIdAfiliado = intval($_POST['afl_id']);
        $strFechaAfiliacion     = strClean($_POST['txtfechaAfiliacion']);
        $strFechaVencimiento = strClean($_POST['txtfechaVencimiento']);
    // $intIdProductor = intval($_POST['ptd_id']);
       // $intIdProductor = 1; //! PENDIENTE DE OBTENER EL PRODUCTOR DE ESE USUARIO
        $strEstado      = strClean($_POST['listEstado']);

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_afiliado = "";

        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdAfiliado == 0) {
            // Crear
            $request_afiliado = $this->model->insertafiliado(
                $intIdProductor,
                $intIdUsuario,
                $strFechaAfiliacion,
                $strFechaVencimiento,
                $strEstado
            );
            $option = 1;
        } else {
            // Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
        }
            $request_afiliado = $this->model->updateAfiliado(
                $intIdAfiliado,
                $intIdProductor,
                $intIdUsuario,
                $strFechaAfiliacion,
                $strFechaVencimiento,
                $strEstado
            );
            $option = 2;
        }
        
    
        if ($request_afiliado > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('afiliados', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('afiliados', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('afiliados', $_POST['foto_actual']);
                }
            }
        } else if ($request_afiliado == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El afiliado ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
