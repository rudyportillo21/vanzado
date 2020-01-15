<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumnoM extends CI_Model {
	public function get_alumno(){
		$pa_mostrarAlumno = "CALL pa_mostrarAlumno()";
		$query = $this->db->query($pa_mostrarAlumno);
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function eliminar($id){
		$pa_eliminarAlumno = "CALL pa_eliminarAlumno(?)";
		$arreglo = array('id_alumno'=>$id);
		$query = $this->db->query($pa_eliminarAlumno,$arreglo);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_sexo(){
		$exe = $this->db->get('sexo');
		return $exe->result();
	}
	public function get_seccion(){
		$exe = $this->db->get('seccion');
		return $exe->result();
	}


	public function ingresar($datos){
		$pa_insertarAlumno = "CALL pa_insertarAlumno(?,?,?,?,?)";
		$arreglo = array('nombre'=>$datos['nombre'],
			'apellido'=>$datos['apellido'],
			'id_sexo'=>$datos['id_sexo'],
			'id_seccion'=>$datos['id_seccion'],
			'anio'=>$datos['anio']);
		$query = $this->db->query($pa_insertarAlumno,$arreglo);
		if($query!==null){
			return "add";
		}else{
			return false;
		}
	}

	public function get_datos($id){
		$this->db->where('id_alumno',$id);
		$exe = $this->db->get('alumnos');
		return $exe->row();
	}

	public function actualizar($datos){
		$pa_editarAlumno = "CALL pa_editarAlumno(?,?,?,?,?,?)";
		$arreglo = array(
			'id_alumno'=>$datos['id_alumno'],
			'nombre'=>$datos['nombre'],
			'apellido'=>$datos['apellido'],
			'id_sexo'=>$datos['id_sexo'],
			'id_seccion'=>$datos['seccion'],
			'anio'=>$datos['anio']);
		$query = $this->db->query($pa_editarAlumno,$arreglo);
		if($query!==null){
			return "edi";
		}else{
			return false;
		}
	}

}
