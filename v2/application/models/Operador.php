<?php

class Operador extends CI_Model {
	
		
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all($categoria=null,$numberListItems=10){
		$this->load->database();
		$this->db->from('operador');
		if($categoria){
				$this->db->where('categoria', $categoria);
		}
		$this->db->order_by('categoria', 'ASC');
		$this->db->limit($numberListItems);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_operador_busqueda($categoria=null,$buscar){
		if($categoria=='main'){
			$query = $this->db->query("SELECT * from operador where operador like '%".$buscar."%' or representante_legal like '%".$buscar."%' or codigo_operador like '%".$buscar."%'  order by idoperador desc limit 20");
		}else{
			$query = $this->db->query("SELECT * from operador order by idoperador desc limit 20");
		}
		return $query->result();
	}
	
	
	public function eliminarOperador($idoperador){
		if($this->db->query("delete from operador where idoperador = '".$idoperador."' limit 1")){
			return true;
		}
	}
	
	
	
	public function get_operador($idoperador=null){
		$this->load->database();
		$this->db->from('operador');
		$this->db->where('idoperador', $idoperador);
		$query = $this->db->get();
		return $query->row();
	}
	
	
	public function get_operacion_by_idoperador($idoperador){
		$this->db->distinct('*');
		$this->db->from('operacion');
		$this->db->where('idoperador', $idoperador);
		$this->db->order_by('idoperacion', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_list_operacion_buscar($clave_operacion=NULL,$operador=NULL,$numberListItems=30){
		if(!$clave_operacion){
			if(!$operador){
				$where = false;
			}else{
				$where = "operador like '%$operador%'";
			}
		}else{
			if(!$operador){
				$where = "clave_operacion like '%$clave_operacion%'";
			}else{
				$where = "clave_operacion like '%$clave_operacion%' and operador like '%$operador%'";
			}
		}
		if(strlen($where)>0){$where = 'and '.$where;}
			$query = $this->db->query('SELECT 
			operacion.idoperacion, operacion.idoperador, organismo_certificacion, entidad_federativa, vigencia_inicio, vigencia_fin, clave_operacion, operador, operacion_producto from operacion, operacion_producto where operacion.idoperacion = operacion_producto.idoperacion '.$where.' group by idoperacion limit '.$numberListItems);				
			return $query->result();
		}
		
	public function get_total(){
		$query = $this->db->query('SELECT count(*) as total from operacion');				
		$result = $query->row();
		return $result->total;
	}
	
				
	public function eliminarOperacion($idoperacion){
		if($this->db->query("delete from operacion_producto where idoperacion = '".$idoperacion."'")){
			if($this->db->query("delete from operacion where idoperacion = '".$idoperacion."' limit 1")){
				return true;
			}
		}else{
			return false;
		}
	}
				
	public function insert_operacion(){
		$this->idoperacion = $this->input->post('idoperacion');
		$this->organismo_certificacion = $this->input->post('organismo_certificacion');
		$this->operador = $this->input->post('operador');
		$this->clave_tercero = $this->input->post('clave_tercero');
		$this->clave_oficial = $this->input->post('clave_oficial');
		$this->db->insert('operacion', $this);
	}

       
		
	public function registrarOperador($datos){
		$this->load->database();
		$this->db->insert("operador",$datos);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	

	public function actualizarOperador($datos,$idoperador){
		$this->db->where('idoperador', $idoperador);
		$this->db->update('operador',$datos);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}



}