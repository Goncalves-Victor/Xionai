<?php 

if(isset($userAdmin)){
	if($userAdmin != 1){
		$url = base_url('index.php/usuario');
		header("Location: ".$url);
	}
} else {
	$url = base_url('index.php/usuario');
	header("Location: ".$url);
}

?>

<!-- Imagem e texto -->
<nav class="navbar navbar-expand-md navbar navbar-dark bg-danger">
	<a class="navbar-brand" href="#">
		Xionai
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/admin') ?>">Página inical</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/usuario/cadastarUser') ?>">Cadastar usuário</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/usuario/cadastarLab') ?>">Cadastar laboratório</a>
			</li>
		</ul>
		<a href="<?php echo base_url('index.php/usuario/sairDoSistema') ?>"><button class="btn btn-outline-light">Sair do Sistema<i class="fas fa-sign-out-alt ml-2"></i></button></a>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="display-5 text-center my-4">Editando Reserva	</h3>
			<form id="form" action="<?php echo base_url('index.php/Admin/atualizar_registro/'.$reservaSelecionada->idreservas)?>" method="post">

				<div class="form-row">
					<div class="col">
						<select name="turno" id="turno" class="form-control">
							<option>Manhã</option>
							<option>Tarde</option>
							<option>Noite</option>
						</select>
					</div>
					<div class="col">

						<?php 
						$diaReserva = '';
						if($reservaSelecionada->dia_reserva >= 1 && $reservaSelecionada->dia_reserva < 10){
							$diaReserva = '0'.$reservaSelecionada->dia_reserva;
						} else {
							$diaReserva = $reservaSelecionada->dia_reserva;
						} ?>

						<input type="date" class="form-control" id="data" onchange="verifica_dia_selecionado(this.value)" value="<?php echo $reservaSelecionada->ano_reserva.'-'.$reservaSelecionada->mes_reserva.'-'.$diaReserva ?>">
					</div>
				</div>

				<div class="form-group">	
					<input type="hidden" name="data_hora_reserva" value="<?php echo date("d/m/Y à\s\ H:i:s"); ?>">
				</div>
				
				<div class="d-flex justify-content-around my-3">
					<div class="form-check form-check-inline mt-3">
						<input class="form-check-input" type="checkbox" value="1" id="h1" name="h1">
						<label class="form-check-label" for="h1">1º Horario</label>
					</div>

					<div class="form-check form-check-inline mt-3">
						<input class="form-check-input" type="checkbox" value="1" id="h2" name="h2">
						<label class="form-check-label" for="h2">2º Horario</label>
					</div>

					<div class="form-check form-check-inline mt-3">
						<input class="form-check-input" type="checkbox" value="1" id="h3" name="h3">
						<label class="form-check-label" for="h3">3º Horario</label>
					</div>

					<div class="form-check form-check-inline mt-3">
						<input class="form-check-input" type="checkbox" value="1" id="h4" name="h4">
						<label class="form-check-label" for="h4">4º Horario</label>
					</div>

					<div class="form-check form-check-inline mt-3">
						<input class="form-check-input" type="checkbox" value="1" id="h5" name="h5">
						<label class="form-check-label" for="h5">5º Horario</label>
					</div>

					<input type="hidden" name="num_aulas" id="num_aulas">
				</div>

				<!-- INPUTS DIA, MES, ANO -->
				<input type="hidden" name="dia_reserva" id="dia_reserva">
				<input type="hidden" name="mes_reserva" id="mes_reserva">
				<input type="hidden" name="ano_reserva" id="ano_reserva">

				<div class="col-md-8 mx-auto mt-3">
					<button type="button" class="btn btn-secondary btn-block" onclick="enviar_form()">Atualizar</button>
				</div>

				<input type="hidden" name="fk_laboratorios" value="<?php echo $reservaSelecionada->fk_laboratorios ?>">

			</form>

		</div>

	</div>

</div>

<script type="text/javascript">
	preenchendo_campos();

	/* preenchendo os campos com os dados usando javascript */
	function preenchendo_campos() {
		
		var turno = '<?php echo $reservaSelecionada->turno ?>';
		document.getElementById('turno').value = turno;

		<?php for($i = 1; $i < 6; $i++){

			$concatenando = 'h'.$i;

			if($reservaSelecionada->$concatenando == 1){ ?>

				document.getElementById('<?php echo $concatenando ?>').checked = true;

			<?php } else { ?>

				document.getElementById('<?php echo $concatenando ?>').checked = false;

			<?php } } ?>

			/* parei aqui */
	}

	var diaDaSemanaSelecionado = '';

	function verifica_dia_selecionado(data) {
		var dataSplited = data.split('-').reverse();

		// SEGUNDO PARâMETRO SENDO PASSADO DECREMENTADO EM UM PARA REGULARIZAR
		var objData = new Date(parseInt(dataSplited[2]), parseInt(dataSplited[1]) - 1, parseInt(dataSplited[0]));


		objData = objData.toString();
		// console.log(objData);
		objData = objData.split(' ');

		diaDaSemanaSelecionado = objData[0];

	}
	
	function enviar_form() {

		if(diaDaSemanaSelecionado.toLowerCase() != "sun"){

			var algumCampoMarcado = verifica_checks();

			if(algumCampoMarcado == false){
				alert("Escolha pelo menos um horário para continuar!");
			} else {
				var qtde = calcula_num_aulas();
				document.getElementById('num_aulas').value = qtde;

				var data = document.getElementById('data').value;
				data = data.split('-').reverse();
				// data = data[0] + '/' + data[1] + '/' + data[2];

				/* dia, mes e ano separados */
				var data_reserva_separados = Array("dia_", "mes_", "ano_");

				for(var x in data_reserva_separados){
					document.getElementById(data_reserva_separados[x] + "reserva").value = data[x];
				}

				// console.log(document.getElementById('ano_reserva').value);

				document.getElementById('form').submit();
			}

		} else {
			alert("Selecionar Domingo não é permitido");
		}
	}

	function calcula_num_aulas() {
		var qtde = 0;

		// CALCULA O NÚMERO DE AULAS
		for(var i = 1; i < 6; i++){
			if(document.getElementById('h' + i).checked == true){
				qtde++;
			}
		}

		return qtde;
	}

	function verifica_checks() {
		var contador = 0;

		for(var i = 1; i < 6; i++){
			if(document.getElementById('h' + i).checked == false){
				contador++;
			}
		}

		if(contador >= 5){
			return false
		} else {
			return true
		}
	}

	

</script>
