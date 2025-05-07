<?php
class Docente{
    private $pdo;

    public $id_docente;
    public $cedula;
    public $nombres;
    public $apellidos;
    public $titulo_academico;
    public $especialidad;
    public $telefono;
    public $email;
    public $fecha_contratacion;
    public $activo;

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
            $sql = "SELECT * FROM docentes";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Obtener($id_docente){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM docentes WHERE id_docente = ?");
            $stm->execute(array($id_docente));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Registrar(Docente $data){
        try {
            $sql = "INSERT INTO docentes (cedula, nombres, apellidos, titulo_academico, especialidad, telefono, email, fecha_contratacion, activo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_DATE, ?)";
    
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cedula,
                        $data->nombres,
                        $data->apellidos,
                        $data->titulo_academico,
                        $data->especialidad,
                        $data->telefono,
                        $data->email,
                        $data->activo
                    )
                ); 
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Actualizar($data){
        try {
            $sql = "UPDATE docentes SET
                        cedula = ?,
                        nombres = ?,
                        apellidos = ?,
                        titulo_academico = ?,
                        especialidad = ?,
                        telefono = ?,
                        email = ?,
                        fecha_contratacion = ?,
                        activo = ?
                    WHERE id_docente = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cedula,
                        $data->nombres,
                        $data->apellidos,
                        $data->titulo_academico,
                        $data->especialidad,
                        $data->telefono,
                        $data->email,
                        $data->fecha_contratacion,
                        $data->activo,
                        $data->id_docente
                    )
                ); 
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function Eliminar($id_docente){
        try {
            $stm = $this->pdo->prepare("DELETE FROM docentes WHERE id_docente = ?");
            $stm->execute(array($id_docente));
        } catch (Exception $e){
            die ($e->getMessage());
        }
    }
}
?>