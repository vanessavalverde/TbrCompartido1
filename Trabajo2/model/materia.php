<?php
class materia
{
    private $pdo;

    public $idMateria;
    public $Materia;
    public $Semestre;
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

            $stm = $this->pdo->prepare("SELECT * FROM materia");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idMateria)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM materia WHERE idMateria = ?");


            $stm->execute(array($idMateria));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idMateria)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM materia WHERE idMateria = ?");

            $stm->execute(array($idMateria));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE materia SET 
						Materia          = ?, 
						Semestre        = ?,
                        idPrograma        = ?
				    WHERE idMateria = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Materia,
                        $data->Semestre,
                        $data->idPrograma,
                        $data->idMateria
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(materia $data)
    {
        try {
            $sql = "INSERT INTO materia (Materia,Semestre,idPrograma) 
		        VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Materia,
                        $data->Semestre,
                        $data->idPrograma
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
