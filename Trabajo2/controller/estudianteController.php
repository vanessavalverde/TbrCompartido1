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
        
        if(isset($_REQUEST['id'])){
            $est = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/estudiante/estudiante-editar.php';
    }
    
    public function Guardar(){
        $est = new estudiante();
        
        $est->id = $_REQUEST['id'];
        $est->Nombre = $_REQUEST['nombre'];
        $est->Apellido = $_REQUEST['apellido'];
        $est->Edad = $_REQUEST['edad'];
        $est->Genero = $_REQUEST['genero'];
        $est->idPrograma = $_REQUEST['idPrograma'];

        $est->id > 0 
            ? $this->model->Actualizar($est)
            : $this->model->Registrar($est);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}