<?php
class Materia{
    private $pdo;

    public $id_materia;
    public $codigo_materia;
    public $nombre_materia;
    public $total_horas;
    public $horas_teoria;
    public $horas_practica;
    public $descripcion;

    public function __CONSTRUCT(){
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Listar(){
        try {
            $result = array();
            $sql = "SELECT * FROM materias";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Obtener($id){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM materias WHERE id_materia = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Registrar(Materia $data){
        try {
            $sql = "INSERT INTO materias (codigo_materia, nombre_materia, total_horas, horas_teoria, horas_practica, descripcion) VALUES (?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
            ->execute(
                array(
                    $data->codigo_materia,
                    $data->nombre_materia,
                    $data->total_horas,
                    $data->horas_teoria,
                    $data->horas_practica,
                    $data->descripcion
                )
            ); 
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Actualizar($data){
        try {
            $sql = "UPDATE materias SET
                     codigo_materia = ?,
                     nombre_materia = ?,
                     total_horas = ?,
                     horas_teoria = ?,
                     horas_practica = ?,
                     descripcion = ?
                WHERE id_materia = ?";

            $this->pdo->prepare($sql)
            ->execute(
                array(
                    $data->codigo_materia,
                    $data->nombre_materia,
                    $data->total_horas,
                    $data->horas_teoria,
                    $data->horas_practica,
                    $data->descripcion,
                    $data->id_materia
                )
            ); 
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Eliminar($id){
        try {
            $stm = $this->pdo->prepare("DELETE FROM materias WHERE id_materia = ?");
            $stm->execute(array($id));
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }
}
?>