<?php

class Mtienda extends CI_Model
{
    function   __construct()
    {
        parent::__construct();
    }

    public function consultarTienda()
    {
        $this->db->select('*');
        $this->db->from('tienda');

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $result = $res->result_array();
            return $result;
        } else {
            return false;
        }
    }


}


?>