<?php 

class Operadores extends CI_Controller {
	
	public function  __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	}
	
	public function registrar($categoria=null){
		
		$data['mensaje']=0;
		if($this->input->post('guardar')){
			if($this->guardar()){$data['mensaje']=1;}else{$data['mensaje']=2;}
		}
		$data['categoria'] = $categoria;
		$url_categoria = '';
		$url_action = '/insert_form';
		
		
			
			
				$data['categoria'] = $categoria;
				$url_categoria = 'main';
		
		
		$this->load->view('admin/header');
			$this->load->view('admin/operador/menu',$data);
			$this->load->view('admin/operador/header');
				$this->load->view('admin/operador/'.$url_categoria.$url_action,$data);
			$this->load->view('admin/operador/footer');
		$this->load->view('admin/footer');
	}
	
	public function consultar($categoria=null){
		
		
		$this->load->model('operador','operador_model');
		$data['categoria'] = $categoria;
		
		$data['mensaje'] = 0;
		if($this->input->post('guardar')){
			if($this->guardar()){$data['mensaje']=1;}else{$data['mensaje']=2;}
		}
		
		$url_categoria = '';
		$url_action = '/view';
		
		switch($categoria){
			case 'agricola':
				$url_categoria = 'agricola';
				$data['string_categoria']="Producción vegetal";
				break;
			case 'ganaderia':
				$url_categoria = 'main';
				$data['string_categoria']="Producción animal";
				break;
			case 'procesador':
				$url_categoria = 'main';
				$data['string_categoria']="Procesamiento";
				break;
			case 'comercializador':
				$url_categoria = 'main';
				$data['string_categoria']="Comercialización";
				break;
				
			case 'export':
				$url_categoria = 'main';
				$url_action = '/view_export';
			break;
			
			default:
				$url_categoria = 'main';
				$data['string_categoria']="Sin categoria";
				$url_action = '/view_all';
			break;
		}		
		
		
		if($this->input->post('eliminarOperador')){
			$data['operadores'] = $this->operador_model->eliminarOperador($this->input->post('idoperador'));
			$data['mensaje']=3;
			
		}
		
		if(($this->input->post('buscar') or $this->input->post('busqueda'))){
			$data['operadores'] = $this->operador_model->get_operador_busqueda($categoria,$this->input->post('buscar'),$this->input->post('limite'));
			$data['main_active'] = 2;
		}else{
			$data['main_active'] = 1;
			//$data['operadores'] = $this->operador_model->get_all($categoria);
		}
		
		
		
		
		$this->load->view('admin/header');
			$this->load->view('admin/operador/menu',$data);
			$this->load->view('admin/operador/header');
				$this->load->view('admin/operador/'.$url_categoria.$url_action,$data);
			$this->load->view('admin/operador/footer');
		$this->load->view('admin/footer');
	}
	
	
	
	public function detalle($categoria=null,$idoperador=null){
		$data['categoria'] = $categoria;
		$data['mensaje']=0;
		if($this->input->post('actualizar')){
			if($this->actualizar($idoperador)){$data['mensaje']=1;}else{$data['mensaje']=2;}
		}
		
		$this->load->model('operador','operador_model');
		$data['operador'] = $this->operador_model->get_operador($idoperador);
		
		$url_categoria = '';
		$url_action = '/update_form';
		switch($categoria){
			case 'agricola':
				$url_categoria = 'agricola';
				$data['string_categoria']="Producción vegetal";
				break;
			case 'ganaderia':
				$url_categoria = 'main';
				$data['string_categoria']="Producción animal";
				break;
			case 'procesador':
				$url_categoria = 'main';
				$data['string_categoria']="Procesamiento";
				break;
			case 'comercializador':
				$url_categoria = 'main';
				$data['string_categoria']="Comercialización";
				break;
			default:
				$data['categoria'] = NULL;
				$url_categoria = 'main';
				$data['string_categoria']="Consulta general";
			break;
		}		
		
		$this->load->view('admin/header');
			$this->load->view('admin/operador/menu',$data);
			$this->load->view('admin/operador/header');
				$this->load->view('admin/operador/'.$url_categoria.$url_action,$data);
			$this->load->view('admin/operador/footer');
		$this->load->view('admin/footer');
	}
	
	
	public function guardar(){
		$this->load->model('operador','operador_model');
		$datos= array(
			'categoria'=> $this->input->post('categoria'),
			'operador'=> $this->input->post('operador'),
			'representante_legal'=> $this->input->post('representante_legal'),
			'codigo_operador'=> $this->input->post('codigo_operador'),
			'tipo_persona'=> $this->input->post('tipo_persona'),
			'producto'=> $this->input->post('producto'),
			'rfc'=> $this->input->post('rfc'),
			'curp'=> $this->input->post('curp'),
			'calle'=> $this->input->post('calle'),
			'numero_exterior'=>  $this->input->post('numero_exterior'),
			'numero_interior'=> $this->input->post('numero_interior'),
			'colonia'=> $this->input->post('colonia'),
			'municipio'=> $this->input->post('municipio'),
			'localidad'=> $this->input->post('localidad'),
			'entidad_federativa'=> $this->input->post('entidad_federativa'),
			'pais'=> $this->input->post('pais'),
			'codigo_postal'=> $this->input->post('codigo_postal'),
			'web'=> $this->input->post('web'),
			'celular'=> $this->input->post('celular'),
			'telefono'=> $this->input->post('telefono'),
			'email'=> $this->input->post('email')
		);	
		return $this->operador_model->registrarOperador($datos);
	}
	
	public function actualizar($idoperador){
		$this->load->model('operador','operador_model');
		$datos= array(
			'categoria'=> $this->input->post('categoria'),
			'operador'=> $this->input->post('operador'),
			'representante_legal'=> $this->input->post('representante_legal'),
			'codigo_operador'=> $this->input->post('codigo_operador'),
			'tipo_persona'=> $this->input->post('tipo_persona'),
			'producto'=> $this->input->post('producto'),
			'rfc'=> $this->input->post('rfc'),
			'curp'=> $this->input->post('curp'),
			'calle'=> $this->input->post('calle'),
			'numero_exterior'=>  $this->input->post('numero_exterior'),
			'numero_interior'=> $this->input->post('numero_interior'),
			'colonia'=> $this->input->post('colonia'),
			'municipio'=> $this->input->post('municipio'),
			'localidad'=> $this->input->post('localidad'),
			'entidad_federativa'=> $this->input->post('entidad_federativa'),
			'pais'=> $this->input->post('pais'),
			'codigo_postal'=> $this->input->post('codigo_postal'),
			'web'=> $this->input->post('web'),
			'telefono'=> $this->input->post('telefono'),
			'celular'=> $this->input->post('celular'),
			'email'=> $this->input->post('email')
		);	
		return $this->operador_model->actualizarOperador($datos,$idoperador);
	}
	
	
	public function index($categoria=null,$action=null){
		$this->consultar();
		/*
		$url_categoria = '';
		$url_action = '';
		
		switch($categoria){
			case 'agricola':$url_categoria = 'agricola';break;
			case 'ganaderia':$url_categoria = 'ganaderia';break;
			case 'procesador':$url_categoria = 'procesador';break;
			case 'comercializador':$url_categoria = 'comercializador';break;
			
			default:
				$url_categoria = 'main';
			break;
		}
		
		if($categoria){
			switch($action){
				case 'registrar':
					$url_action = $url_action.'/insert_form';
				break;
				case 'consultar':
					$url_action = $url_action.'/view';
				break;
				default:
					$url_categoria = 'main';$url_action = $url_action.'/view';
				break;
			}
		}
		
		$this->load->view('admin/header');
			$this->load->view('admin/operador/menu');
			$this->load->view('admin/operador/header');
				$this->load->view('admin/operador/'.$url_categoria.$url_action);
			$this->load->view('admin/operador/footer');
		$this->load->view('admin/footer');*/
	}
	
	
}
