<h1 class="titulo">Tarefa</h1>

<div class="well well-sm text-right">
    <a class="botao" href="?c=Tarefa&a=Crud">Cadastrar Tarefa</a>
</div>

<table class="table table-striped" border="1">
    <thead>
    <tr>
            <th>Descrição</th>
            <th class="centralizar">Ação</th>
        </ tr>
    </thead>
    <tbody>
    <br>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td style="width:200px"><?php echo $r->descricao; ?></td>
            <td style="width:80px; text-align: center;">
                <a style="margin-right:5px" href="?c=Tarefa&a=Crud&id=<?php echo $r->id; ?>"><img src="images/edit.png" alt="edit" /></a>
                <a onclick="javascript:return confirm('Confirma a exclusão deste registro?');" href="?c=Tarefa&a=Excluir&id=<?php echo $r->id; ?>"><img src="images/delete.png" alt="excluir" /></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 