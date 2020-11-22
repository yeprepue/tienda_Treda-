<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproducto extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model('mproducto');
         $this->load->model('mtienda');
    }
	
	public function index()
	{
        $data["productos"] = $this->mproducto->consultarProducto();
        $data["tiendas"] = $this->mtienda->consultarTienda();
        
		$this->load->view('admin/productos', $data);
	}

	public function crearProducto()
    {
        
        $nombre  = $this->input->post('nombre');
        $pdescripcion = $this->textarea->post('pdescripcion');
        $pvalor = $this->input->post('pvalor');
        $ptienda = $this->input->post('ptienda');
        $imagen = $this->input->post('imagen');
        
		
		$res = $this->mproducto->crearProducto( $nombre,$pdescripcion,$pvalor,$ptienda, $imagen);
        if ($res) {
			$productos = $this->mproducto->consultarProducto();
            echo json_encode(
                array(
                    "status" => 200,
					"msj" => "Registrado correctamente",
					"data" => $productos
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
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

        $res = $this->mproducto->actualizarProducto($sku, $nombre, $pdescripcion, $pvalor,$ptienda,$imagen);
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
        $res = $this->mtienda->eliminarTienda($sku);
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