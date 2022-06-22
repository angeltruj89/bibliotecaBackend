<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Mexico_City");
        $this->load->model('categorias_mdl', 'categorias');
    }



	public function consultarCategorias()
	{
        $result = $this->categorias->obtenerCategorias();
        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar las categorias";
        }
	}

    public function guardarCategoria()
    {
        $datos = $this->input->post();
        $result = $this->categorias->guardarCategoria($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }

    public function eliminarCategoria()
    {
        $datos = $this->input->post();
        $result = $this->categorias->eliminarCategoria($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }

    public function actualizarCategoria()
    {
        $datos = $this->input->post();
        $result = $this->categorias->actualizarLibro($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }
}
