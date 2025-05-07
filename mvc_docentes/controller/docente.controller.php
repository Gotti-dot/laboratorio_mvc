<?php
require_once 'model/docente.php';

class DocenteController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Docente();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/docente/docente.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $doc = new Docente();
        if (isset($_REQUEST['id_docente'])) {
            $doc = $this->model->Obtener($_REQUEST['id_docente']);
        }
        require_once 'view/header.php';
        require_once 'view/docente/docente-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $doc = new Docente();
        $doc->id_docente = $_REQUEST['id-form'];
        $doc->cedula = $_REQUEST['cedula-form'];
        $doc->nombres = $_REQUEST['nombres-form'];
        $doc->apellidos = $_REQUEST['apellidos-form'];
        $doc->titulo_academico = $_REQUEST['titulo-form'];
        $doc->especialidad = $_REQUEST['especialidad-form'];
        $doc->telefono = $_REQUEST['telefono-form'];
        $doc->email = $_REQUEST['email-form'];
        $doc->fecha_contratacion = $_REQUEST['fecha-form'];
        $doc->activo = isset($_REQUEST['activo-form']) ? 1 : 0;

        if ($doc->id_docente > 0) {
            $this->model->Actualizar($doc);
        }else{
            $this->model->Registrar($doc);
        }
        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_docente']);
        header('Location: index.php');
    }
}
?>