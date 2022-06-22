<?php
class Libros_mdl extends CI_Model
{
    private $tablaLibros = "libros";

    function __construct()
    {
        parent::__construct();
    }

    public function obtenerLibros()
    {
        $this->db->select("*");
        $this->db->from("libros");
        $this->db->order_by("id_libro", "ASC");

        $libros = $this->db->get()->result_array();

        return $libros;
    }

    public function guardarLibro($datos){
        if ($this->db->insert($this->tablaLibros, $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarLibro($datos)
    {
        $this->db->where("id_libro", $datos['id_libro']);
        if ($this->db->delete("libros")) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarLibro($datos)
    {
        $key = array('id_libro' => $datos["id_libro"]);
        unset($datos['id_libro']);
        if ($this->db->update($this->tablaLibros, $datos, $key)) {
            return true;
        } else {
            return false;
        }
    }
}