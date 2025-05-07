<?php
class Estudiante{
    private $pdo;

    public $id;
    public $nombre;
    public $apellido;
    public $email;

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
                $sql = "SELECT * FROM estudiantes";
                $stm = $this->pdo->prepare($sql);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
                
            } catch (Exception $e){
                die ($e->getMessage());
            }
            }

            public function Obtener($id){
                try {
                    $stm = $this->pdo->prepare("SELECT * FROM estudiantes WHERE id = ?");
                    $stm->execute(array($id));
                    return $stm->fetch(PDO::FETCH_OBJ);
                    
                } catch (Exception $e){
                    die ($e->getMessage());
                }
                }
            
                public function Registrar(Estudiante $data){
                    try {
                        $sql = "INSERT INTO estudiantes (nombre,apellido,email) VALUES (?,?,?)";
                        $this->pdo->prepare($sql)
                        ->execute(
                            array(
                                $data->nombre_con,
                                $data->apellido_con,
                                $data->email_con
                            )
                            ); 
                    } catch (Exception $e){
                        die ($e->getMessage());
                    }
                    }

                    public function Actualizar($data){
                        try {
                            $sql = "UPDATE estudiantes SET
                                         nombre = ?,
                                         apellido = ?,
                                         email = ?
                                    WHERE id = ? ";

                            $this->pdo->prepare($sql)
                            ->execute(
                                array(
                                    $data->nombre_con,
                                    $data->apellido_con,
                                    $data->email_con,
                                    $data->id_con
                                )
                                ); 
                        } catch (Exception $e){
                            die ($e->getMessage());
                        }
                        }
                
                        public function Eliminar($id){
                            try {
                                $stm = $this->pdo->prepare("DELETE FROM estudiantes WHERE id = ?");
                                $stm->execute(array($id));
                                
                            } catch (Exception $e){
                                die ($e->getMessage());
                            }
                            }
    }
?>