<nav class="navbar navbar-expand-md navbar-dark bg-danger">
	<a class="navbar-brand" href="#">
		Xionai
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto mr-2">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/usuario/buscarLab') ?>">Laboratórios</a>
			</li>
			<li class="nav-item active">
				<!-- <a class="nav-link" href="<?php echo base_url('index.php/reserva') ?>">Visualizar reservas</a> -->
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/reserva') ?>" class="nav-link active">Visualizar reservas realizadas</a>
					<button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="sr-only">Dropdown</span>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="javascript: abrir_modal_filtragem()">Filtrar<i class="fas fa-angle-right ml-5"></i></a>
						
					</div>
				</div>
			</li>
		</ul>
		<a href="<?php echo base_url('index.php/usuario/sairDoSistema') ?>"><button class="btn btn-outline-light">Sair do Sistema<i class="fas fa-sign-out-alt ml-2"></i></button></a>
	</div>
</nav>

<div class="container">
	
	<div class="row">
		
		<div class="col-md-12">
			
			<h2 class="display-4 text-center my-3">Listagem das Reservas</h2>
			<!-- style="border: 1px solid red" -->
			<table class="table table-hover text-center">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Data</th>
						<th scope="col">Turno</th>
						<th scope="col">N° de aulas reservadas</th>
						<th scope="col">Quem reservou</th>
						<th scope="col">Laboratório reservado</th>
						<th scope="col">Data da realização da reserva</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($reservas as $dado) { ?>
						<tr>
							<td><?php echo $dado->dia_reserva."/".$dado->mes_reserva."/".$dado->ano_reserva ?></td>
							<td><?php echo $dado->turno ?></td>
							<td><?php echo $dado->num_aulas ?> aulas - <a href="javascript: abrirModal(<?php echo $dado->idreservas ?>, '<?php echo $dado->nome ?>', '<?php echo $dado->turno ?>', '<?php echo $dado->dia_reserva."/".$dado->mes_reserva."/".$dado->ano_reserva ?>')">Visualizar horários</a></td>
							<td><?php echo $dado->nomeUser ?></td>
							<td><?php echo $dado->nome ?></td>
							<td><?php echo $dado->data_hora_reserva ?></td>
						</tr>
					<?php } ?>

				</tbody>
			</table>

		</div>

	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalHorarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Horários reservados(<i class="fas fa-check text-success"></i>)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table style="width: 100%; padding: 10px">
					<tbody id="corpoTabelaModal"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFiltragem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Escolha como deseja filtrar os resultados por mês e/ou ano:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form" action="<?php echo base_url('index.php/reserva/selectFiltro') ?>" method="post">
					<label>Mês</label>
					<select class="form-control" id="selectMeses" name="mes_reserva">
						<option value="1">Janeiro</option>
						<option value="2">Fevereiro</option>
						<option value="3">Março</option>
						<option value="4">Abril</option>
						<option value="5">Maio</option>
						<option value="6">Junho</option>
						<option value="7">Julho</option>
						<option value="8">Agosto</option>
						<option value="9">Setembro</option>	
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>

					<label>Ano</label>
					<select class="form-control" id="selectAno" name="ano_reserva">

						<?php 

						$ano = (int)date("Y") - 2;
						for ($i = 0; $i < 12; $i++) { ?>

							<option value="<?php echo $ano ?>"><?php echo $ano ?></option>

							<?php $ano++; } ?>

					</select>
					</div>
					<div class="modal-footer">
						<button type="button" onclick="enviaForm()" class="btn btn-success" data-dismiss="modal">Filtrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		function enviaForm() {
			document.getElementById('form').submit();
			window.location.herf = "<?php echo base_url('index.php/reserva/selectFiltro') ?>";
		}

		document.getElementById('selectMeses').value = <?php echo (int)$mesFiltro?>;

		document.getElementById('selectAno').value = <?php echo (int)$anoFiltro ?>;

		function abrir_modal_filtragem() {
			$('#modalFiltragem').modal('show');
		}

		function abrirModal(idReserva, nomeLab, turno, data) {
			$('#modalHorarios').modal('show');

			var tabela = document.getElementById('corpoTabelaModal');
			while (tabela.firstChild) {
				tabela.removeChild(tabela.firstChild);
			}

			$.post("<?php echo base_url('index.php/reserva/selecionaHorarios/') ?>" + idReserva, function(data){
				var horarios = JSON.parse(data);

				console.log(horarios[0]);
				var contador = 1;

				for(var x in horarios[0]){

					var row = document.createElement("tr");
					var celula1 = document.createElement("td");
					celula1.style.paddingLeft = "1.3em";

					var text1 = document.createTextNode(contador + "° Horário:");
					celula1.appendChild(text1);

					var celula2 = document.createElement("td");

					var simbolo = document.createElement("i");

					if(horarios[0][x] == 0){
						simbolo.className = "fas fa-times text-danger";
					} else if(horarios[0][x] == 1){
						simbolo.className = "fas fa-check text-success";
					}

					celula2.appendChild(simbolo);

					row.appendChild(celula1);
					row.appendChild(celula2);

					tabela.appendChild(row);
					contador++;
				}
			})
		}

	</script>