<?php
require_once 'model/estudiante.php';
class EstudianteController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Estudiante();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/estudiante/estudiante.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $est = new Estudiante();
        if (isset($_REQUEST['id'])) {
            $est = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/estudiante/estudiante-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $est = new Estudiante();
        $est->id_con = $_REQUEST['id-form'];
        $est->nombre_con = $_REQUEST['nombre-form'];
        $est->apellido_con = $_REQUEST['apellido-form'];
        $est->email_con = $_REQUEST['email-form'];
        if ($est->id_con > 0) {
            $this->model->Actualizar($est);
        }else{
            $this->model->Registrar($est);
        }
        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>