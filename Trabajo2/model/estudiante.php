<?php
//Requiero el archivo de clase para extenderlo en este script
//require_once("persona.php");
//Clase hija
class estudiante 
{
    private $pdo;
    public $idEstudiante;
    public $Nombre;
    public $Apellido;
    public $Edad;
    public $Genero;
    public $idPrograma;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = conexion::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM estudiante");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idEstudiante)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM estudiante WHERE idEstudiante= ?");


            $stm->execute(array($idEstudiante));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idEstudiante)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM estudiante WHERE idEstudiante = ?");

            $stm->execute(array($idEstudiante));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE estudiante SET 
						Nombre=?,
                        Apellido=?,
                        Edad=?,
                        Genero=?,
                        idPrograma=?
				    WHERE idEstudiante = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Edad,
                        $data->Genero,
                        $data->idPrograma,
                        $data->idEstudiante
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(estudiante $data)
    {
        try {
            $sql = "INSERT INTO estudiante (Nombre,Apellido,Edad,Genero,idPrograma) 
		        VALUES (?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Edad,
                        $data->Genero,
                        $data->idPrograma
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
