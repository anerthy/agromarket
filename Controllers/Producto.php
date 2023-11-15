<?php

class Producto extends Controllers
{
    public function __construct()
    {
        sessionStart();
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
    }

    public function Producto()
    {
        if (!in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
            header("Location:" . base_url() . '/access_denied');
            // 	header("Location:" . base_url() . '/dashboard');
        }
        $data['page_id'] = 6;
        $data['page_tag'] = "Productos";
        $data['page_name'] = "producto";
        $data['page_title'] = "Producto";
        $data['page_functions_js'] = "functions_producto.js";
        $this->views->getView($this, "producto", $data);
    }

    public function getProductos()
    {
        if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
            $arrData = $this->model->getAll();

            for ($i = 0; $i < count($arrData); $i++) {
                $btnView = '';
                $btnEdit = '';
                $btnDisable = '';

                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['pro_id'] . ')" title="Ver Producto"><i class="far fa-eye"></i></button>';
                $btnDisable = '<button class="btn btn-danger btn-sm fntDisProducto" onClick="fntDisProducto(' . $arrData[$i]['pro_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditProducto" onClick="fntEditProducto(' . $arrData[$i]['pro_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';

                $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDisable . '</div>';

                switch ($arrData[$i]['pro_estado']) {
                    case 'Activo':
                        $arrData[$i]['pro_estado'] = '<span class="badge badge-info">Activo</span>';
                        break;
                    case 'Inactivo':
                        $arrData[$i]['pro_estado'] = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case 'Eliminado':
                        $arrData[$i]['pro_estado'] = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        // do something else
                }
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getProducto(int $pro_id)
    {
        if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
            $intIdProducto = intval(strClean($pro_id));
            if ($intIdProducto > 0) {
                $arrData = $this->model->getById($intIdProducto);
                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                } else {
                    $arrData['url_imagen'] = media() . '/images/uploads/productos/' . $arrData['pro_imagen'];
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function setProducto()
    {
        if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
            $intIdProducto  = intval($_POST['pro_id']);
            $strNombre      = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $strCategoria   = strClean($_POST['txtCategoria']);
            $intPrecio      = intval($_POST['txtPrecio']);
            $strEstado      = strClean($_POST['listEstado']);

            $foto       = $_FILES['foto'];
            $nombre_foto     = $foto['name'];
            $type              = $foto['type'];
            $url_temp        = $foto['tmp_name'];
            $imgImagen     = 'imageUnavailable.png';
            $request_producto = "";

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
                    $strEstado
                );
                $option = 1;
            } else {
                //Actualizar
                if ($nombre_foto == '') {
                    if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
                        $imgImagen = $_POST['foto_actual'];
                    }
                }
                $request_producto = $this->model->updateProducto(
                    $intIdProducto,
                    $strNombre,
                    $strDescripcion,
                    $strCategoria,
                    $intPrecio,
                    $imgImagen,
                    $strEstado
                );
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
        }
        die();
    }

    public function disProducto()
    {
        if ($_POST) {
            if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
                $intIdProducto = intval($_POST['pro_id']);
                $requestDelete = $this->model->disableProducto($intIdProducto);
                if ($requestDelete) {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al el producto.');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function delProducto()
    {
        if ($_POST) {
            if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) {
                $intIdProducto = intval($_POST['pro_id']);
                $requestDelete = $this->model->deleteProducto($intIdProducto);
                if ($requestDelete) {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto-');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}
