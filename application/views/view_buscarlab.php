
<?php
session_start();

if(isset($usuarioConhecido)){

	if($usuarioConhecido == 0){
		$url = base_url('index.php/usuario');
		header("Location: ".$url);
	} else {
		if (isset($usuarioLogado)) {
			$_SESSION['idUsuarioLogado'] = $usuarioLogado;
		}
	}

} else {
	$url = base_url('index.php/usuario');
	header("Location: ".$url);
}
?>
<?php 

	if (isset($labReservado)) {

		if($labReservado == true){ ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<p>Laboratório reservado com sucesso!</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

<?php $labReservado = false; } } ?>

<nav class="navbar navbar-expand-md navbar-dark bg-danger">
	<a class="navbar-brand" href="#">
		Xionai
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('index.php/usuario/buscarLab') ?>">Laboratórios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/reserva') ?>">Visualizar reservas realizadas</a>
			</li>
		</ul>
		<a href="<?php echo base_url('index.php/usuario/sairDoSistema') ?>"><button class="btn btn-outline-light">Sair do Sistema<i class="fas fa-sign-out-alt ml-2"></i></button></a>
	</div>
</nav>
<div class="container">

	<h2 class="display-4 text-center my-3">Listagem de Laboratórios</h2>

	<div class="row">

		<?php foreach ($laboratorios as $data) { ?>
			<div class="col-md-4 mb-4">
				<div class="card">
					<img src="<?php echo base_url() ?>assets/img/<?php echo $data->img ?>" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?php echo $data->nome; ?></h5>
						<p class="card-text">
							Capacidade: <?php echo $data->capacidade?>
							<br>
							<?php if ($data->ar==1) { ?>
								Ar-condicionado: <i class="fas fa-check text-success"></i>
							<?php } else { ?>
								Ar-condicionado: <i class="fas fa-times text-danger"></i>
							<?php }	?>
							<br>
							<?php if ($data->caixa==1) { ?>
								Caixa de som: <i class="fas fa-check text-success"></i>
							<?php } else { ?>
								Caixa de som: <i class="fas fa-times text-danger"></i>
							<?php }	?> 
							<br>
							<?php if ($data->projetor==1) { ?>
								Projetor: <i class="fas fa-check text-success"></i>
							<?php } else { ?>
								Projetor: <i class="fas fa-times text-danger"></i>
							<?php }	?>
							<br>
						</p>
						<a href="<?php echo base_url('index.php/usuario/reserva/'.$data->idlaboratorios) ?>" class="btn btn-secondary ">Reservar</a>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>

</div>