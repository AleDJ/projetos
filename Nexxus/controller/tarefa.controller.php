<?php
require_once 'model/tarefa.php';

class TarefaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Tarefa();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tarefa/tarefa.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $tar = new Tarefa();
        
        if(isset($_REQUEST['id'])){
            $tar = $this->model->Obter($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tarefa/tarefa-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Salvar(){
        $tar = new Tarefa();
        
        $tar->id = $_REQUEST['id'];
        $tar->descricao = $_REQUEST['descricao'];

        $tar->id > 0 
            ? $this->model->Atualizar($tar)
            : $this->model->Registrar($tar);
        
        header('Location: index.php');
    }
    
    public function Excluir(){
        $this->model->Excluir($_REQUEST['id']);
        header('Location: index.php');
    }
}