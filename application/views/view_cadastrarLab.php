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
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('index.php/usuario/cadastarLab') ?>">Cadastar laboratório</a>
			</li>
		</ul>
		<a href="<?php echo base_url('index.php/usuario/sairDoSistema') ?>"><button class="btn btn-outline-light">Sair do Sistema<i class="fas fa-sign-out-alt ml-2"></i></button></a>
	</div>
</nav>
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-8 mx-auto">
			<?php 

			if (isset($labCadastrado)) {

				if($labCadastrado == true){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<p>Laboratório cadastrado com sucesso!</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<?php $labCadastrado = false; } } ?>

					<h3 class="display-5 text-center my-4">Cadastar Laboratório</h3>
					<form action="http://localhost/xionai/index.php/Usuario/insereLab" method="post">
						
						<div class="form-group">
							<label for="nome">Nome da sala:</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
						</div>

						
						<div class="form-group">
							<label for="img">Imagem: </label><br>
							<input type="file" name="img" id="img" required>
						</div>

						
						<div class="form-group">
							<label for="capacidade">
							Capacidade:</label>
							<input type="number" class="form-control" id="capacidade" name="capacidade" placeholder="Capacidade do Laboratório..." required>
						</div>
						<div style="padding-left: 21px">
							<div class="form-group">
								<input class="form-check-input" type="checkbox" value="1" id="projetor" name="projetor">
								<label class="form-check-label" for="projetor">Projetor</label>
							</div>
							<div class="form-group">
								<input class="form-check-input" type="checkbox" value="1" id="caixa" name="caixa">
								<label class="form-check-label" for="caixa">
									Caixa de som
								</label>
							</div>
							<div class="form-group">
								<input class="form-check-input" type="checkbox" value="1" id="ar" name="ar">
								<label class="form-check-label" for="ar">
									Ar-condicionado
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 mx-auto mt-3">
					<button type="submit" class="btn btn-secondary btn-block">Salvar</button>
				</form>

			</div>

		</div>

	</div>