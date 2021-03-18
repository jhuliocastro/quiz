<?php $this->layout('_themes', ["title" => 'Cadastrar Questionário']); ?>
<div class="container-fluid">
    <form method="post" action="/questionarios/cadastrar">
        <div class="mb-3">
            <label>Título</label>
            <textarea required name="titulo" class="form-control"></textarea>            
        </div>
        <div class="mb-3">
            <label>Alternativa <strong>A</strong></label>
            <textarea required name="alternativa_a" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Alternativa <strong>B</strong></label>
            <textarea required name="alternativa_b" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Alternativa <strong>C</strong></label>
            <textarea required name="alternativa_c" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Alternativa <strong>D</strong></label>
            <textarea required name="alternativa_d" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Qual a alternativa correta?</label>
            <select required name="alternativa_correta" class="form-control">
                <option value="alternativa_a">Alternativa A</option>
                <option value="alternativa_b">Alternativa B</option>
                <option value="alternativa_c">Alternativa C</option>
                <option value="alternativa_d">Alternativa D</option>
            </select>
        </div>
        <div>
            <input type="hidden" name="questionario" value="<?= $questionario ?>">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
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