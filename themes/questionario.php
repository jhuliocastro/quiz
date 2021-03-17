<?php $this->layout('_themes', ["title" => 'Questionário']); ?>
<div class="container-fluid">
<a href="/questionarios/cadastrar/<?= $idQuestionario ?>" class="btn btn-secondary">Cadastrar Novo</a>
<br/>
<br/>
    <?= $questionarios ?>
</div>
<?php $this->start('scripts'); ?>
<script>
    $(function() {
        $( "#accordion-2" ).accordion({
            collapsible: true
        });
    });
</script>
<?php $this->end(); ?>