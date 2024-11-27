<nav class="navbar navbar-expand-md navbar-dark bg-danger">
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
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/usuario/cadastarUser') ?>">Cadastar usuário</a>
      </li>
      <li class="nav-item">
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

			if (isset($userCadastrado)) {

				if($userCadastrado == true){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<p>Usuário cadastrado com sucesso!</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

			<?php $userCadastrado = false; } } ?>
			
			<h3 class="display-5 text-center my-4">Cadastar Usuário</h3>
			<form action="http://localhost/xionai/index.php/Usuario/insereUser" method="post">
				<div class="form-row">
					<div class="form-group col-md-8">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" id="nome" name="nomeUser" placeholder="Digite o nome..." required>
					</div>
					<div class="form-group col-md-4">
						<label for="idade">Idade</label>
						<input type="number" class="form-control" id="idade" name="idade" placeholder="Digite a idade..." required>
					</div>
				</div>
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Digite o username..." required>
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha..." required>
				</div>

				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
				</div>
				</div>
				<div class="col-md-8 mx-auto mt-3">
					<button type="submit" class="btn btn-secondary btn-block">Salvar</button>
				</div>
			</form>

		</div>

	</div>

</div>