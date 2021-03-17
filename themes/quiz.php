<?php $this->layout('_themes', ["title" => 'Quiz']); ?>
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Criar</h5>
        <br/>
        <div class="container-fluid">
            <form method="post" action="/quiz/adicionar">
                <div class="mb-3">
                    <label>Informe o Título do Quiz</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
                <br/>
            </form>
        </div>
    </div>
    <br/>
    <div class="card">
        <h5 class="card-header">Lista</h5>
        <br/>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Quant Questinários</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Quant Questinários</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?= $tabela ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts'); ?>
<script>
    $("#titulo").focus();
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<?php $this->end(); ?>