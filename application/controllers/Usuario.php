<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	public function index()
	{
		$this->load->view('view_topo');
		$this->load->view('view_login');
		$this->load->view('view_rodape');
	}
	public function inicio()
	{
		$data['useradmin'] =1;
		$this->load->view('view_topo');
		$this->load->view('view_admin',$data);
		$this->load->view('view_rodape');
	}
	public function verifica_usuario()
	{
		if ($_POST['username']=='admin' && $_POST['senha']=='admin123') {
			$data['useradmin']=1;

			$this->load->model('Model_usuarios');
			$data['reserva'] = $this->Model_usuarios->reservas_for_admin();

			$this->load->view('view_topo');
			$this->load->view('view_admin',$data);
			$this->load->view('view_rodape');

		} else {
			$username = $_POST['username'];

			$this->load->model('Model_usuarios');
			$data['usuarioConhecido'] = $this->Model_usuarios->getUser($_POST);

			if($data['usuarioConhecido'] == 1){

				$this->load->model('Model_usuarios');
				$data['laboratorios'] = $this->Model_usuarios->buscarLab();

				/* pega o usuário que está logado */
				$data['usuarioLogado'] = $this->Model_usuarios->getUserLogado($username);
				$_SESSION['idUsuarioLogado'] = $data['usuarioLogado'];

				$this->load->view('view_topo');
				$this->load->view('view_buscarlab',$data);
				$this->load->view('view_rodape');

			} else {
				$data['userDesconhecido'] = true;

				$this->load->view('view_topo');
				$this->load->view('view_login', $data);
				$this->load->view('view_rodape');
			}
		}
	}

	public function sairDoSistema()
	{
		session_destroy();
		$url = base_url('index.php/usuario');
		header("Location: ".$url);
	}
	public function cadastarUser()
	{
		$this->load->view('view_topo');
		$this->load->view('view_cadastrarUser');
		$this->load->view('view_rodape');
	}
	public function insereUser()
	{
		$this->load->model('Model_usuarios');
		$this->Model_usuarios->insertUser($_POST);
		$data['userCadastrado'] = true;

		$this->load->view('view_topo');
		$this->load->view('view_cadastrarUser',$data);
		$this->load->view('view_rodape');
	}

	public function cadastarLab()
	{
		$this->load->view('view_topo');
		$this->load->view('view_cadastrarLab');
		$this->load->view('view_rodape');
	}
	public function insereLab()
	{
		$this->load->model('Model_usuarios');
		$this->Model_usuarios->insertLab($_POST);
		$data['labCadastrado'] = true;

		$this->load->view('view_topo');
		$this->load->view('view_cadastrarLab',$data);
		$this->load->view('view_rodape');
	}

	public function buscarLab()
	{
		$this->load->model('Model_usuarios');
		$data['laboratorios'] = $this->Model_usuarios->buscarLab();

		$data['usuarioConhecido'] = 1;

		$this->load->view('view_topo');
		$this->load->view('view_buscarlab',$data);
		$this->load->view('view_rodape');
	}

	public function reserva($id)
	{
		$_SESSION['idlaboratorio'] = $id;
		$data['idlab']=$id;
		$this->load->view('view_topo');
		$this->load->view('view_reservar',$data);
		$this->load->view('view_rodape');
	}

	public function reservar()
	{
		$this->load->model('Model_usuarios');
		$reservado = $this->Model_usuarios->reservarLab($_POST);
		$data['id'] = $_POST['fk_usuario'];
		$data['fk_lab'] = $_POST['fk_laboratorios'];

		if($reservado == true){
			$data['labReservado'] = true;

			$data['usuarioConhecido'] = 1;
			$this->load->model('Model_usuarios');
			$data['laboratorios'] = $this->Model_usuarios->buscarLab();

			$this->load->view('view_topo');
			$this->load->view('view_buscarlab',$data);
			$this->load->view('view_rodape');
		} else {
			$data['labReservado'] = false;

			$this->load->view('view_topo');
			$this->load->view('view_reservar',$data);
			$this->load->view('view_rodape');
		}
	}

	public function selectAllUsers()
	{
		$this->load->model('Model_usuarios');
		$data['usuarios'] = $this->Model_usuarios->select_all_users();

		echo json_encode($data['usuarios']);
	}
}

?>