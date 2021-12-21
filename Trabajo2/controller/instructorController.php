<?php
require_once 'model/instructor.php';

class instructorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new instructor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/instructor/instructor.php';
    }
    
    public function Crud(){
        $inst = new instructor();
        
        if(isset($_REQUEST['id'])){
            $inst = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/instructor/instructor-editar.php';
    }
    
    public function Guardar(){
        $inst = new instructor();
        
        $inst->id = $_REQUEST['id'];
        $inst->Nombre = $_REQUEST['nombre'];
        $inst->Apellido = $_REQUEST['apellido'];
        $inst->Edad = $_REQUEST['edad'];
        $inst->Genero = $_REQUEST['genero'];
        $inst->titulo = $_REQUEST['titulo'];

        $inst->id > 0 
            ? $this->model->Actualizar($inst)
            : $this->model->Registrar($inst);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}