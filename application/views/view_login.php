<style type="text/css">

html, body{
	height: 100%;
	width: 100%;
	display: flex;
	align-items: center;
}
body{
	background: url("<?php echo base_url() ?>assets/img/fundo.jpg") no-repeat top center;
	background-attachment: fixed;
	background-size: cover;
}
label{
	cursor: pointer;
}

</style>
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-3 mx-auto">

			<div>
				<p style="text-align: center; ">
					
				<img src="<?php echo base_url() ?>assets/img/senai.png" style="width: 98%">
				</p>
			</div>

			<?php 

			if (isset($userDesconhecido)) {

				if($userDesconhecido == true){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<p>Usuário e/ou senha inválidos. Por favor, tente novamente!</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

			<?php $userDesconhecido = false; } } ?>

			<!-- base_url = http://localhost/Xionai/ -->
			<form action="<?php echo base_url('index.php/usuario/verifica_usuario') ?>" method="post">
				<div class="form-group">
					<label for="username">Usuário:</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Digite o seu nome de usuário..." required="true">
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input type="password" class="form-control" id="password" name="senha" placeholder="Digite aqui a sua senha..." required="true">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="mostrarSenha" onchange="mostra_senha(document.getElementById('mostrarSenha').checked)">
					<label class="form-check-label" for="mostrarSenha">Mostrar senha</label>
				</div>
				<div class="col-md-12 text-center mt-4">
					<button type="submit" class="btn btn-danger w-50" style="background-color: red;">Enviar</button>
				</div>
			</form>

		</div>

	</div>

</div>

<script type="text/javascript">
	
	function mostra_senha(checkbox) {
		if(checkbox == true){
			document.getElementById('password').type = "text";
		} else {
			document.getElementById('password').type = "password";
		}
	}

</script>