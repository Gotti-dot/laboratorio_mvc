<?php
require_once 'model/materia.php';

class MateriaController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Materia();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/materia/materia.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $mat = new Materia();
        if (isset($_REQUEST['id'])) {
            $mat = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/materia/materia-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $mat = new Materia();
        $mat->id_materia = $_REQUEST['id-form'];
        $mat->codigo_materia = $_REQUEST['codigo-form'];
        $mat->nombre_materia = $_REQUEST['nombre-form'];
        $mat->total_horas = $_REQUEST['total-horas-form'];
        $mat->horas_teoria = $_REQUEST['horas-teoria-form'];
        $mat->horas_practica = $_REQUEST['horas-practica-form'];
        $mat->descripcion = $_REQUEST['descripcion-form'];

        if ($mat->id_materia > 0) {
            $this->model->Actualizar($mat);
        }else{
            $this->model->Registrar($mat);
        }
        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>