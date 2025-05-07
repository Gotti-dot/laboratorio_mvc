<h1><?php $mat->id_materia != null ? $mat->nombre_materia : 'Nuevo Registro'; ?></h1>
<ol>
    <li><a href="?c=Materia">Materia</a></li>
    <li><?php $mat->id_materia != null ? $mat->nombre_materia : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Materia&a=Guardar" method="post">
    <input type="hidden" name="id-form" value="<?php echo $mat->id_materia; ?>">
    <div>
        <label>Código de Materia</label>
        <input type="text" name="codigo-form" value="<?php echo $mat->codigo_materia; ?>" placeholder="Ingrese el código de la materia">
    </div>
    <div>
        <label>Nombre de Materia</label>
        <input type="text" name="nombre-form" value="<?php echo $mat->nombre_materia; ?>" placeholder="Ingrese el nombre de la materia">
    </div>
    <div>
        <label>Total de Horas</label>
        <input type="number" name="total-horas-form" value="<?php echo $mat->total_horas; ?>" placeholder="Ingrese el total de horas">
    </div>
    <div>
        <label>Horas Teoría</label>
        <input type="number" name="horas-teoria-form" value="<?php echo $mat->horas_teoria; ?>" placeholder="Ingrese las horas de teoría">
    </div>
    <div>
        <label>Horas Práctica</label>
        <input type="number" name="horas-practica-form" value="<?php echo $mat->horas_practica; ?>" placeholder="Ingrese las horas de práctica">
    </div>
    <div>
        <label>Descripción</label>
        <textarea name="descripcion-form" placeholder="Ingrese la descripción de la materia"><?php echo $mat->descripcion; ?></textarea>
    </div>
    <div>
        <button>Guardar</button>
    </div>
</form>