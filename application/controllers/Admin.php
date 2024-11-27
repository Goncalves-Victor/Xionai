<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index()
	{
		$data['useradmin']=1;

		$this->load->model('Model_usuarios');
		$data['reserva'] = $this->Model_usuarios->reservas_for_admin();

		$this->load->view('view_topo');
		$this->load->view('view_admin',$data);
		$this->load->view('view_rodape');
	}

	public function editar_registro($idReserva)
	{
		$this->load->model('Model_usuarios');
		$data['reservaSelecionada'] = $this->Model_usuarios->getReserva($idReserva);
		$data['userAdmin'] = 1;

		$this->load->view('view_topo');
		$this->load->view('view_admin_editar',$data);
		$this->load->view('view_rodape');
	}

	public function atualizar_registro($idReserva)
	{
		$this->load->model('Model_usuarios');
		$this->Model_usuarios->atualizar_registro($idReserva,$_POST);

		$url = base_url('index.php/admin');
		header("Location: ".$url);
	}
}

?>