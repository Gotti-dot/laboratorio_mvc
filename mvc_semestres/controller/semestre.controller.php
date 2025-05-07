<?php
require_once 'model/semestre.php';
class SemestreController{
    private $model;
    public function __CONSTRUCT(){
        $this->model = new Semestre();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/semestre/semestre.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $est = new Semestre();
        if(isset($_REQUEST['id'])){
            $est = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/semestre/semestre-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $est = new Semestre();
        $est->id_con = $_REQUEST['id-form'];
        $est->numero_semestre_con = $_REQUEST['numero_semestre-form'];
        $est->nombre_semestre_con = $_REQUEST['nombre_semestre-form'];
        $est->fecha_inicio_con = $_REQUEST['fecha_inicio-form'];
        $est->fecha_fin_con = $_REQUEST['fecha_fin-form'];
        $est->activo_con = $_REQUEST['activo-form'];

        if ($est->id_con > 0) { 
            $this->model->Actualizar($est);
        } else {
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