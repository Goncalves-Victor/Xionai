<?php
class Model_usuarios extends CI_Model {

	public function getUser($data)
	{
		$this->db->where('username',$_POST['username']);
		$this->db->where('senha',$_POST['senha']);
		$query = $this->db->get('usuarios');

		if(empty($query->result())){
			return 0;
		} else {
			return 1;
		}
	}

	public function insertUser($data)
	{
		$this->db->insert('usuarios',$data);
	}

	public function insertLab($data)
	{
		$this->db->insert('laboratorios',$data);
	}

	public function buscarLab()
	{
		$query = $this->db->get('laboratorios');
		return $query->result();
	}
	public function reservarLab($data)
	{
		$this->db->where('fk_laboratorios', $data['fk_laboratorios']);
		$this->db->where('dia_reserva', $data['dia_reserva']);
		$this->db->where('mes_reserva', $data['mes_reserva']);
		$this->db->where('ano_reserva', $data['ano_reserva']);
		$this->db->where('turno', $data['turno']);
		$this->db->where('turno', $data['turno']);

		for ($i = 1; $i < 6; $i++) { 
			if(isset($data['h'.$i])){
				if($data['h'.$i] == 1){
					$this->db->where('h'.$i, $data['h'.$i]);
				}
			}
		}

		$query = $this->db->get('reservas');

		if(empty($query->result())){
			$this->db->insert('reservas',$data);
			return true;
		} else {
			return false;
		}
	}

	public function getUserLogado($data)
	{
		$this->db->where('username',$data);
		$query = $this->db->get('usuarios');
		return $query->result()[0]->idusuarios;
	}

	public function getAllRegistros()
	{
		date_default_timezone_set('America/Sao_Paulo');
		$mes_atual = (int) date("m");

		$this->db->select('*');
		$this->db->from('reservas');
		$this->db->where('mes_reserva',$mes_atual);
		$this->db->join('laboratorios', 'laboratorios.idlaboratorios = reservas.fk_laboratorios');
		$this->db->join('usuarios', 'usuarios.idusuarios = reservas.fk_usuario');

		$query = $this->db->get();
		return $query->result();
	}
	public function selecionaHorarios($idReservas)
	{
		for ($i = 1; $i < 6; $i++) { 
			$this->db->select('h'.$i);
		}

		$this->db->where('idreservas', $idReservas);

		$query = $this->db->get('reservas');
		return $query->result();
	}

	public function reservas_for_admin()
	{
		date_default_timezone_set('America/Sao_Paulo');
		$mes_atual = date("m");
		$this->db->select('*');
		$this->db->from('reservas');
		$this->db->where('mes_reserva',$mes_atual);
		$this->db->join('laboratorios', 'laboratorios.idlaboratorios = reservas.fk_laboratorios');
		$this->db->join('usuarios', 'usuarios.idusuarios = reservas.fk_usuario');

		$query = $this->db->get();
		return $query->result();	
	}

	public function exclui_registro($idReserva)
	{
		$this->db->where('idreservas',$idReserva);
		$this->db->delete('reservas');

		$url = base_url('index.php/admin');
		header("Location: ".$url);
	}

	public function exclui_multiplo_registro($idReserva)
	{
		$this->db->where('idreservas',$idReserva);
		$this->db->delete('reservas');
	}

	public function getReserva($idReserva)
	{
		$this->db->where('idreservas',$idReserva);
		$query = $this->db->get('reservas');

		return $query->result()[0];
	}
	public function atualizar_registro($idReserva,$data)
	{
		$this->db->where('idreservas', $idReserva);
		$this->db->update('reservas', $data);
	}

	public function select_filtro($data)
	{
		$this->db->select('*');
		$this->db->from('reservas');
		$this->db->where('mes_reserva', $data['mes_reserva']);
		$this->db->where('ano_reserva', $data['ano_reserva']);

		$this->db->join('laboratorios', 'laboratorios.idlaboratorios = reservas.fk_laboratorios');
		$this->db->join('usuarios', 'usuarios.idusuarios = reservas.fk_usuario');

		$query = $this->db->get();
		return $query->result();
	}

	public function select_all_users()
	{
		$this->db->select('nomeUser, idusuarios');
		$this->db->from('usuarios');

		$query = $this->db->get();

		return $query->result();
	}
}
?>