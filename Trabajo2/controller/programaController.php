<?php
require_once 'model/programa.php';

class programaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new programa();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/programa/programa.php';
    }
    
    public function Crud(){
        $prg = new programa();
        
        if(isset($_REQUEST['id'])){
            $prg = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/programa/programa-editar.php';
    }
    
    public function Guardar(){
        $prg = new programa();
        
        $prg->IdPrograma = $_REQUEST['id'];
        $prg->Programa = $_REQUEST['Programa'];
        $prg->Activo = $_REQUEST['Activo'];

        $prg->IdPrograma > 0 
            ? $this->model->Actualizar($prg)
            : $this->model->Registrar($prg);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}