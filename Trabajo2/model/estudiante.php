<?php
//Requiero el archivo de clase para extenderlo en este script
require_once("persona.php");
//Clase hija
class estudiante extends persona
{
    public $idPrograma;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = conexion::StartUp();
            $this->id=0;
            $this->Nombre = "";
            $this->Apellido = "";
            $this->Edad = "";
            $this->Genero = "";
            $this->idPrograma="";
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

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM estudiante WHERE idEstudiante = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM estudiante WHERE idEstudiante = ?");

            $stm->execute(array($id));
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
                        $data->id
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
