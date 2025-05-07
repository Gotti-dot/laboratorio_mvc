<?php
class Semestre{
    private $pdo;

    public $id;
    public $numero_semestre;
    public $nombre_semestre;
    public $fecha_inicio;
    public $fecha_fin;
    public $activo;

    public function __CONSTRUCT(){
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function Listar(){
        try {
            $result = array();
            $sql = "SELECT * FROM semestres";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Obtener($id){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM semestres WHERE id = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Registrar(Semestre $data){
        try {
            $sql = "INSERT INTO semestres (numero_semestre,nombre_semestre,fecha_inicio,fecha_fin,activo) VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
            ->execute(
                array(
                    $data->numero_semestre_con,
                    $data->nombre_semestre_con,
                    $data->fecha_inicio_con,
                    $data->fecha_fin_con,
                    $data->activo_con
                )
            );
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Actualizar($data){
        try {
            $sql = "UPDATE semestres SET
                            numero_semestre = ?,
                            nombre_semestre = ?,
                            fecha_inicio = ?,
                            fecha_fin = ?,
                            activo = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
            ->execute(
                array(
                    $data->numero_semestre_con,
                    $data->nombre_semestre_con,
                    $data->fecha_inicio_con,
                    $data->fecha_fin_con,
                    $data->activo_con,
                    $data->id_con
                )
            );
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }
    
    public function Eliminar($id){
        try {
            $stm = $this->pdo->prepare("DELETE FROM semestres WHERE id = ?");
            $stm->execute(array($id));

        } catch (Exception $e){
            die ($e->getMessage());
        }
    }
}
?>