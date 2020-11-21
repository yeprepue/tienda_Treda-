<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctienda extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('mtienda');
    }
	
	public function index()
	{
		// var_dump($this->mtienda->consultarTienda());
		// exit;
		$data["tiendas"] = $this->mtienda->consultarTienda();
		$this->load->view('admin/dashboard', $data);
	}

	// public function consultarTienda()
    // {
    //     $res = $this->mtienda->consultarTienda();
    //     if ($res) {
    //         echo json_encode(array(
    //             "status" => 200,
    //             "data" => $res
    //         ));
    //     } else {
    //         echo json_encode(array(
    //             "status" => 404
    //         ));
    //     }
    // }
}