<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproducto extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // $this->load->model('mproducto');
        $this->load->model('mtienda');
    }
	
	public function index()
	{
        $data["tiendas"] = $this->mtienda->consultarTienda();
        $data["productos"] = $this->mproducto->consultarProductos();
		$this->load->view('admin/productos', $data);
	}

	public function crearTienda()
    {
		$tienda = $this->input->post('tname');
		$fecha = $this->input->post('tfecha');
		
		$res = $this->mtienda->crearTienda($tienda, $fecha);
        if ($res) {
			$tiendas = $this->mtienda->consultarTienda();
            echo json_encode(
                array(
                    "status" => 200,
					"msj" => "Registrado correctamente",
					"data" => $tiendas
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
	}
	

	public function actualizarTienda()
    {
		$idtienda = $this->input->post('idtienda');
		$tname = $this->input->post('tname');
		$tfecha = $this->input->post('tfecha');
        $res = $this->mtienda->actualizarTienda($idtienda, $tname,$tfecha);
        if ($res) {
            $tiendas = $this->mtienda->consultarTienda();
            echo json_encode(
                array(
                    "status" => 200,
					"msj" => "Actualizado correctamente",
					"data" => $tiendas
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
	}
	
	public function eliminarTienda()
    {
		$idtienda = $this->input->post('idtienda');
        $res = $this->mtienda->eliminarTienda($idtienda);
        if ($res) {
            $tiendas = $this->mtienda->consultarTienda();
            echo json_encode(
                array(
                    "status" => 200,
					"msj" => "Eliminada correctamente",
					"data" => $tiendas
                )
            );
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
    }
}