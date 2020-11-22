<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cproducto extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mproducto');
        $this->load->model('mtienda');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data["productos"] = $this->mproducto->consultarProducto();
        $data["tiendas"] = $this->mtienda->consultarTienda();

        $this->load->view('admin/productos', $data);
    }

    public function crearProducto()
    {
        $config['upload_path']          = 'uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 2048;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pimagen')) {
            $error = array('error' => $this->upload->display_errors());

            var_dump($error);
        } else {
            $nombre  = $this->input->post('pname');
            $pdescripcion = $this->input->post('pdescripcion');
            $pvalor = $this->input->post('pvalor');
            $ptienda = $this->input->post('ptienda');
            $imagen =  $_FILES['pimagen']['name'];
            $sku = $this->input->post('sku');

            if ($sku == "") {
                $res = $this->mproducto->crearProducto($nombre, $pdescripcion, $pvalor, $ptienda, $imagen);
            } else {
                $res = $this->mproducto->actualizarProducto($sku, $nombre, $pdescripcion, $pvalor, $ptienda, $imagen);
            }

            if ($res) {
                $data["productos"] = $this->mproducto->consultarProducto();
                $data["tiendas"] = $this->mtienda->consultarTienda();

                $this->load->view('admin/productos', $data);
            } else {
                echo json_encode(array(
                    "status" => 404
                ));
            }
        }
    }


    public function actualizarProductos()
    {
        $sku  = $this->input->post('sku');
        $nombre  = $this->input->post('nombre');
        $pdescripcion = $this->textarea->post('pdescripcion');
        $pvalor = $this->input->post('pvalor');
        $ptienda = $this->input->post('ptienda');
        $imagen = $this->input->post('imagen');

        $res = $this->mproducto->actualizarProducto($sku, $nombre, $pdescripcion, $pvalor, $ptienda, $imagen);
        if ($res) {
            $productos = $this->mproducto->consultarProducto();
            echo json_encode(
                array(
                    "status" => 200,
                    "msj" => "Actualizado correctamente",
                    "data" => $productos
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
    }

    public function eliminarProducto()
    {
        $sku = $this->input->post('sku');
        $res = $this->mproducto->eliminarProducto($sku);
        if ($res) {
            $productos = $this->mproducto->consultarProducto();
            echo json_encode(
                array(
                    "status" => 200,
                    "msj" => "Eliminada correctamente",
                    "data" => $productos
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
    }
}
