<?php $this->layout('_clientes', ["title" => 'Seleção de Quiz']); ?>
<div class="container">
    <div class="row">
        <div class="linha1" style="font-size: 25px;">
            SELECIONE UM QUIZ
        </div>
    </div>
    <div class="row">
        <div class="alternativas">
            <?= $quiz ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="/quiz/iniciar">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Informe o seu nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
          <input type="hidden" id="quiz" name="quiz" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Iniciar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php $this->start('scripts'); ?>
<script>
var myModal = new bootstrap.Modal(document.getElementById('modalCliente'));
function selecionaQuiz(quiz){
    $("#titulo").html(quiz);
    $("#quiz").val(quiz);
    myModal.show();
    $("#nome").focus();
}
</script>
<?php $this->end(); ?>