<?php

class Mtienda extends CI_Model
{
    function   __construct()
    {
        parent::__construct();
    }

    public function consultarTienda($tienda)
    {
        $tienda = array(
            
            'nombre' => $tienda
            
        );

        $this->db->select('tienda', $tienda);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }


}


?>