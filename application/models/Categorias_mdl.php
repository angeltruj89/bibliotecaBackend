<?php
class Categorias_mdl extends CI_Model
{
    private $tablaCategoria = "categorias";

    function __construct()
    {
        parent::__construct();
    }

    public function obtenerCategorias()
    {
        $this->db->select("*");
        $this->db->from("categorias");
        $this->db->order_by("id_libro", "ASC");

        $libros = $this->db->get()->result_array();

        return $libros;
    }

    public function guardarCategoria($datos){
        if ($this->db->insert($this->tablaCategoria, $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCategoria($datos)
    {
        $this->db->where("id_categoria", $datos['id_categoria']);
        if ($this->db->delete("categorias")) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarLibro($datos)
    {
        $key = array('id_categoria' => $datos["id_categoria"]);
        unset($datos['id_categoria']);
        if ($this->db->update($this->tablaCategoria, $datos, $key)) {
            return true;
        } else {
            return false;
        }
    }
}