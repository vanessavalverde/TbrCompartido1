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
        
        if(isset($_REQUEST['idInstructor'])){
            $inst = $this->model->Obtener($_REQUEST['idInstructor']);
        }
        
        require_once 'view/header.php';
        require_once 'view/instructor/instructor-editar.php';
    }
    
    public function Guardar(){
        $inst = new instructor();
        
        $inst->idInstructor = $_REQUEST['idInstructor'];
        $inst->Nombre = $_REQUEST['Nombre'];
        $inst->Apellido = $_REQUEST['Apellido'];
        $inst->Edad = $_REQUEST['Edad'];
        $inst->Genero = $_REQUEST['Genero'];
        $inst->titulo = $_REQUEST['titulo'];

        $inst->id > 0 
            ? $this->model->Actualizar($inst)
            : $this->model->Registrar($inst);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idInstructor']);
        header('Location: index.php');
    }
}