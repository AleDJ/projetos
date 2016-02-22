<h1 class="page-header">
 <?php 
   if ($tar->id == null){
   	echo '<a class="titulo"> Cadastrar Tarefa </a>';
   }
   else {
    echo '<a class="titulo"> Editar Tarefa </a>';
   }
   ?>
</h1>

 <a class="botao" href="?c=Tarefa">Lista de Tarefas</a>
   
   <?php 

   if ($tar->id != null):
   echo '<a class="botao" href="?c=Tarefa&a=Crud">Cadastrar Tarefa</a>';
   endif;
   
   ?>
  
<br>
 
<br>

<fieldset id="fdsTarefa" class="field" >
<form id="frm-tarefa" action="?c=Tarefa&a=Salvar" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?php echo $tar->id; ?>" />
    
    <div class="form-group">
        <label>Descrição: </label>
        <input type="text" id="descricao" style="width:320px" name="descricao" value="<?php echo $tar->descricao; ?>" class="form-control" placeholder="Informe a tarefa" data-validacion-tipo="requerido|min:3" />
    </div>
   
    <hr />
    
    <div class="text-right">
        <button class="botao btn-success" onClick="return validarDescricao();" >Salvar</button>
    </div>
</form>
</fieldset>
<script>

	function validarDescricao(){
		if (descricao.value === ""){
		 alert ('É necessário informar um nome para a tarefa.');
		 return false; 
		}
	}

</script>