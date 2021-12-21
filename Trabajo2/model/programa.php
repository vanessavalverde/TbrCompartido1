<?php
class programa
{
    private $pdo;

    public $IdPrograma;
    public $Programa;
    public $Activo;

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

            $stm = $this->pdo->prepare("SELECT * FROM programa");
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
                ->prepare("SELECT * FROM programa WHERE IdPrograma = ?");


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
                ->prepare("DELETE FROM programa WHERE IdPrograma = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE programa SET 
						Programa          = ?, 
						Activo        = ?
				    WHERE IdPrograma = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Programa,
                        $data->Activo,
                        $data->IdPrograma
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(programa $data)
    {
        try {
            $sql = "INSERT INTO programa (Programa,Activo) 
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Programa,
                        $data->Activo
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
