<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_usuarios');
		$data['reservas'] = $this->Model_usuarios->getAllRegistros();
		$data['mesFiltro'] = date("m");
		$data['anoFiltro'] = date("Y");

		$this->load->view('view_topo');
		$this->load->view('view_lista_reservas', $data);
		$this->load->view('view_rodape');
	}

	public function selecionaHorarios($idReserva)
	{
		$this->load->model('Model_usuarios');
		$data['horarios'] = $this->Model_usuarios->selecionaHorarios($idReserva);

		echo json_encode($data['horarios']);
	}

	public function excluir_registro($idReserva)
	{
		$this->load->model('Model_usuarios');
		$this->Model_usuarios->exclui_registro($idReserva);
	}

	public function array_check_box()
	{
		$this->load->model('Model_usuarios');

		foreach ($_POST['reservas'] as $reserva) {
			$this->Model_usuarios->exclui_multiplo_registro($reserva);
		}

		$url = base_url('index.php/admin');
		header("Location: ".$url);
	}

	public function selectFiltro()
	{
		$this->load->model('Model_usuarios');
		$data['reservas'] = $this->Model_usuarios->select_filtro($_POST);
		$data['mesFiltro'] = $_POST['mes_reserva'];
		$data['anoFiltro'] = $_POST['ano_reserva'];

		$this->load->view('view_topo');
		$this->load->view('view_lista_reservas', $data);
		$this->load->view('view_rodape');
	}
}

?>