<?php

class Producto extends Controllers
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

    public function Producto()
    {
        // if (empty($_SESSION['permisosMod']['ver'])) {
        //     header("Location:" . base_url() . '/access_denied');
        // }
        $data['page_id'] = 6;
        $data['page_tag'] = "Productos";
        $data['page_name'] = "producto";
        $data['page_title'] = "Producto";
        $data['page_functions_js'] = "functions_producto.js";
        $this->views->getView($this, "producto", $data);
    }

    public function getProductos()
    {
        $arrData = $this->model->selectProductos();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDisable = '';
            $btnCheck = '';

            // boton de ver
            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['pro_id'] . ')" title="Ver Producto"><i class="far fa-eye"></i></button>';
            }

            // boton de actualizar
            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditProducto" onClick="fntEditProducto(' . $arrData[$i]['pro_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }

            // boton de eliminar
            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDisable = '<button class="btn btn-danger btn-sm fntDisProducto" onClick="fntDisProducto(' . $arrData[$i]['pro_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            }

            //boton de revisar
            if ($_SESSION['permisosMod']['actualizar'] && $_SESSION['permisosMod']['eliminar']) {
                $btnCheck = '<button class="btn btn-warning btn-sm fntCheckProducto" onClick="fntCheckProducto(' . $arrData[$i]['pro_id'] . ')" title="Revisar"><i class="fas fa-exclamation"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

            if ($arrData[$i]['pro_estado'] == 1) {
                $arrData[$i]['options'] = '<div class="text-center">' . $btnCheck . '</div>';
            }

            if ($arrData[$i]['pro_estado'] == 4) {
                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';
            }

            switch ($arrData[$i]['pro_estado']) {
                case 1:
                    $arrData[$i]['pro_estado'] = '<span class="badge badge-warning">' . $arrData[$i]['pro_estado'] . '</span>';
                    break;
                case 2:
                    $arrData[$i]['pro_estado'] = '<span class="badge badge-info">Activo</span>';
                    break;
                case 3:
                    $arrData[$i]['pro_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                    break;
                case 4:
                    $arrData[$i]['pro_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                    break;
                default:
                    // do something else
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getProducto(int $alim_id)
    {
        $intIdProducto = intval(strClean($alim_id));
        if ($intIdProducto > 0) {
            $arrData = $this->model->selectProducto($intIdProducto);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrData['url_imagen'] = media() . '/images/uploads/productos/' . $arrData['pro_imagen'];
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setProducto()
    {
        $intIdProducto = intval($_POST['pro_id']);
        $strNombre =  strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strCategoria = strClean($_POST['txtCategoria']);
        $intPrecio = intval($_POST['pro_id'])
        $strImagen = intval($_POST['pro_imagen'])
        $intIdProductor = intval($_POST['ptd_id']);
        $intEstado = intval($_POST['listEstado']);
        $intIdUsuario = intval($_POST['usr_id']);
     
    

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'imageUnavailable.png';
        $request_alimentacion = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intIdProducto == 0) {
            //Crear
            $request_producto = $this->model->insertProducto(
                $strNombre,
                $strDescripcion,
                $strCategoria,
                $intPrecio,
                $imgImagen,
                $intIdProductor,
                $strEstado,
                $intIdUsuario


            );
            $option = 1;
        } else {
            //Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $request_producto = $this->model->updateProducto($intIdProducto, $strNombre, $strDescripcion, $strCategoria,  $intPrecio, $imgImagen, $intIdProductor, $strEstado, $intIdUsuario);
            $option = 2;
        }

        if ($request_producto > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('productos', $foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage('productos', $foto, $imgImagen);
                }
                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
                ) {
                    deleteFile('productos', $_POST['foto_actual']);
                }
            }
        } else if ($request_producto == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El producto ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function disProducto()
    {
        if ($_POST) {
            $intIdProducto = intval($_POST['pro_id']);
            $requestDelete = $this->model->disableProducto($intIdProducto);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al el producto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delProducto()
    {
        if ($_POST) {
            $intIdProducto = intval($_POST['pro_id']);
            $requestDelete = $this->model->deleteProducto($intIdProducto);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto-');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
