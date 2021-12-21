<?php
require_once 'model/materia.php';

class materiaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new materia();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/materia/materia.php';
    }
    
    public function Crud(){
        $mat = new materia();
        
        if(isset($_REQUEST['id'])){
            $mat = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/materia/materia-editar.php';
    }
    
    public function Guardar(){
        $mat = new materia();
        
        $mat->idMateria = $_REQUEST['id'];
        $mat->Materia = $_REQUEST['Materia'];
        $mat->Semestre = $_REQUEST['Semestre'];
        $mat->idPrograma = $_REQUEST['idPrograma'];

        $mat->idMateria > 0 
            ? $this->model->Actualizar($mat)
            : $this->model->Registrar($mat);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}