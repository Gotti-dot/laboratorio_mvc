<?php
require_once 'model/carrera.php';
class CarreraController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Carrera();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/carrera/carrera.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $car = new Carrera();
        if (isset($_REQUEST['id'])) {
            $car = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/carrera/carrera-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $car = new Carrera();
        $car->id_carrera = $_REQUEST['id-form'];
        $car->nombre_carrera = $_REQUEST['nombre-form'];
        $car->codigo_carrera = $_REQUEST['codigo-form'];
        $car->duracion_semestres = $_REQUEST['duracion-form'];
        $car->descripcion = $_REQUEST['descripcion-form'];
        $car->fecha_creacion = $_REQUEST['fecha-form'];
        $car->activa = isset($_REQUEST['activa-form']) ? 1 : 0;

        if ($car->id_carrera > 0) {
            $this->model->Actualizar($car);
        }else{
            $this->model->Registrar($car);
        }
        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>