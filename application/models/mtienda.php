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

    public function crearTienda($nombre, $fecha)
    {
        //Creamos un arreglo [campo de la base de datos y su respectivo valor]
        $datos = array(
            'nombre' => $nombre,
            'fecha_apertura' =>$fecha
        );
        $this->db->insert('tienda', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }

    public function actualizarTienda($idtienda, $tname, $tfecha)
    {
        $datos = array(
            'nombre' => $tname,
            'fecha_apertura' => $tfecha
        );
        $this->db->select('nombre');
        $this->db->from('tienda');
        $this->db->where('id', $idtienda);
        $this->db->where('nombre', $tname);
        $this->db->where('fecha_apertura', $tfecha);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            return true;
        }
        $this->db->where('id', $idtienda);
        $this->db->update('tienda', $datos);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarTienda($idtienda)
    {
        $this->db->where('id', $idtienda);
        $this->db->delete('tienda');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
