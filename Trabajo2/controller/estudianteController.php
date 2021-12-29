<?php
require_once 'model/estudiante.php';

class estudianteController{
    
    private $model;
   
    
    public function __CONSTRUCT(){
        $this->model = new estudiante();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/estudiante/estudiante.php';
    }
    
    public function Crud(){
        $est = new estudiante();
        
        if(isset($_REQUEST['idEstudiante'])){
            $est = $this->model->Obtener($_REQUEST['idEstudiante']);
        }
        
        require_once 'view/header.php';
        require_once 'view/estudiante/estudiante-editar.php';
    }
    
    public function Guardar(){
        $est = new estudiante();
        
        $est->idEstudiante = $_REQUEST['idEstudiante'];
        $est->Nombre = $_REQUEST['Nombre'];
        $est->Apellido = $_REQUEST['Apellido'];
        $est->Edad = $_REQUEST['Edad'];
        $est->Genero = $_REQUEST['Genero'];
        $est->idPrograma = $_REQUEST['idPrograma'];

        $est->idEstudiante > 0 
            ? $this->model->Actualizar($est)
            : $this->model->Registrar($est);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idEstudiante']);
        header('Location: index.php');
    }
}