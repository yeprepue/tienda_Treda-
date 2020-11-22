<?php

class Mproducto extends CI_Model
{
    function   __construct()
    {
        parent::__construct();
    }

    public function consultarProducto()
    {
        $this->db->select('p.sku, p.nombre, p.description, p.valor, t.nombre');
        $this->db->from('producto p');
        $this->db->join('tienda t ');
        $this->db->join('t.sku=p.idtienda');
        
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $result = $res->result_array();
            return $result;
        } else {
            return false;
        }
    }

    public function crearProducto($pname, $description, $valor, $tienda, $imagen)
    {
        //Creamos un arreglo [campo de la base de datos y su respectivo valor]
        $datos = array(

            'nombre' => $pname,
            'description' => $description,
            'valor' => $valor,
            'tienda' => $tienda,
            'imagen' => $imagen

        );
        $this->db->insert('producto', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }

    public function actualizarProducto($sku, $pname, $description, $valor, $tienda, $imagen)
    {
        $datos = array(
            'sku' => $sku,
            'nombre' => $pname,
            'description' => $description,
            'valor' => $valor,
            'tienda' => $tienda,
            'imagen' => $imagen




        );
        $this->db->select('nombre');
        $this->db->from('producto');
        $this->db->where('sku', $sku);
        $this->db->where('nombre', $pname);
        $this->db->where('description', $description);
        $this->db->where('valor', $valor);
        $this->db->where('tienda', $tienda);
        $this->db->where('imagen', $imagen);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            return true;
        }
        $this->db->where('sku', $sku);
        $this->db->update('producto', $datos);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarproducto($sku)
    {
        $this->db->where('sku', $sku);
        $this->db->delete('producto');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
