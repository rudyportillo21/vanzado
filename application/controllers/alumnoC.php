<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumnoC extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('alumnoM');
	}

	
	public function index()
	{
		$data = array('title'=>'Colegio || Alumno');
		$this->load->view('template/header',$data);
		$this->load->view('alumnoV');
		$this->load->view('template/footer');
	}

	public function get_alumno(){
		$respuesta = $this->alumnoM->get_alumno();
		echo json_encode($respuesta);
	}
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->alumnoM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_sexo(){
		$respuesta = $this->alumnoM->get_sexo();
		echo json_encode($respuesta);
	}

	public function get_seccion(){
		$respuesta = $this->alumnoM->get_seccion();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre'] = $this->input->post('nombre');
		$datos['apellido'] = $this->input->post('apellido');
		$datos['id_sexo'] = $this->input->post('sexo');
		$datos['id_seccion'] = $this->input->post('seccion');
		$datos['anio'] = $this->input->post('anio');
		$respuesta = $this->alumnoM->ingresar($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->alumnoM->get_datos($id);
		echo json_encode($respuesta);
	}


	public function actualizar(){
		$datos['id_alumno'] = $this->input->post('id_alumno');
		$datos['nombre'] = $this->input->post('nombre');
		$datos['apellido'] = $this->input->post('apellido');
		$datos['id_sexo'] = $this->input->post('sexo');
		$datos['id_seccion'] = $this->input->post('seccion');
		$datos['anio'] = $this->input->post('anio');
		$respuesta = $this->alumnoM->actualizar($datos);
		echo json_encode($respuesta);
	}
}
