<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Mexico_City");
        $this->load->model('libros_mdl', 'libros');
    }



	public function consultarLibros()
	{
        $result = $this->libros->obtenerLibros();
        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
	}

    public function guardarLibro()
    {
        $datos = $this->input->post();
        $result = $this->libros->guardarLibro($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }

    public function eliminarLibro()
    {
        $datos = $this->input->post();
        $result = $this->libros->eliminarLibro($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }

    public function actualizarLibro()
    {
        $datos = $this->input->post();
        $result = $this->libros->actualizarLibro($datos);

        if($result){
            echo json_encode($result);
        }else{
            echo "Ocurrio un error al consultar los libros";
        }
    }
}
