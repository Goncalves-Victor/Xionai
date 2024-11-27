<?php
session_start();

if(isset($useradmin)){

  if($useradmin == 0){
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
      <li class="nav-item active">
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

<div class="container-fluid">

  <h2 class="display-4 text-center my-3">Listagem de Laboratórios</h2>

  <div class="row">

    <div class="col-md-12">

      <form id="formCheckBox" action="<?php echo base_url('index.php/reserva/array_check_box') ?>" method="post">
        <table class="table w-100 text-center table-bordered">
          <thead class="thead-dark">
            <tr style="line-height: 40px;">
              <th scope="col">


                <div class="btn-group">
                  <button type="button" class="btn btn-dark btn-sm">
                    <input type="checkbox" id="selectAll" onchange="seleciona_tudo()">
                  </button>
                  <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="javascript: document.getElementById('formCheckBox').submit()">Excluir selecionados</a> -->
                    <a class="dropdown-item" href="javascript: $('#modalConfirmacaoMultipla').modal('show');">Excluir selecionados</a>
                  </div>
                </div>
              </th>
              <th scope="col">#</th>
              <th scope="col">Data da Reserva</th>
              <th scope="col">Turno</th>
              <th scope="col" colspan="5" style="width: 15%">Horários</th>
            <!-- <th scope="col">h1</th>
            <th scope="col">h2</th>
            <th scope="col">h3</th>
            <th scope="col">h4</th>
            <th scope="col">h5</th> -->
            <th scope="col">Laboratório</th>
            <th scope="col">Quem reservou</th>
            <th scope="col">Quando foi reservado</th>
            <th scope="col">Opções</th>
          </tr>
          <tr>
          </thead>
          <tbody>

            <?php foreach ($reserva as $dado) { ?>

              <tr>

                <td><input type="checkbox" name="reservas[]" value="<?php echo $dado->idreservas ?>"></td>
                <td><?php echo $dado->idreservas ?></td>
                <td><?php echo $dado->dia_reserva."/".$dado->mes_reserva."/".$dado->ano_reserva ?></td>
                <td><?php echo $dado->turno ?></td>

                <?php for($i = 1; $i < 6; $i++) {

                  $concatenei = 'h'.$i; ?>

                  <td>
                    <?php if($dado->$concatenei == 0){ ?>

                      <i class="fas fa-times text-danger"></i>

                    <?php } else { ?>

                      <i class="fas fa-check text-success"></i>

                    <?php } ?>
                  </td>

                <?php } ?>

                <td><?php echo $dado->nome ?></td>
                <td><?php echo $dado->nomeUser ?></td>
                <td><?php echo $dado->data_hora_reserva ?></td>
                <td>
                  <a href="<?php echo base_url('index.php/admin/editar_registro/'.$dado->idreservas) ?>" class="btn btn-secondary">Editar</a>
                  <a href="javascript: confirmacao(<?php echo $dado->idreservas ?>)" class="btn btn-danger">Excluir</a>
                </td>

              </tr>

            <?php } ?>

          </tbody>
        </table>
      </form>

    </div>

  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" onclick="exclui_registro()">Sim, desejo excluir!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalConfirmacaoMultipla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" onclick="$('#modalConfirmacao').modal('hide'); document.getElementById('formCheckBox').submit()">Sim, desejo excluir!</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var alvo = "";

  function confirmacao(idReserva) {
    alvo = idReserva;
    $('#modalConfirmacao').modal('show');
  }

  function exclui_registro() {
    $('#modalConfirmacao').modal('hide');
    window.location.href = "<?php echo base_url('index.php/reserva/excluir_registro/') ?>" + alvo;
  }

  function seleciona_tudo() {
    if($('#selectAll').prop('checked')==true){
      $('input[name="reservas[]"]').prop("checked",true);
    } else {
      $('input[name="reservas[]"]').prop("checked",false);
    }
  }
</script>