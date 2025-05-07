<h1><?php $car->id_carrera !=null? $car->nombre_carrera:'Nuevo Registro'; ?></h1>
<ol>
    <li><a href="?c=Carrera">Carrera</a></li>
    <li><?php $car->id_carrera != null ? $car->nombre_carrera :'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Carrera&a=Guardar" method="post">
    <input type="hidden" name="id-form" value="<?php echo $car->id_carrera; ?>">
    <div>
        <label>Nombre de la carrera</label>
        <input type="text" name="nombre-form" value="<?php echo $car->nombre_carrera; ?>" placeholder="Ingrese el nombre de la carrera">
    </div>
    <div>
        <label>Código de la carrera</label>
        <input type="text" name="codigo-form" value="<?php echo $car->codigo_carrera; ?>" placeholder="Ingrese el código de la carrera">
    </div>
    <div>
        <label>Duración en semestres</label>
        <input type="number" name="duracion-form" value="<?php echo $car->duracion_semestres; ?>" placeholder="Ingrese la duración en semestres">
    </div>
    <div>
        <label>Descripción</label>
        <textarea name="descripcion-form" placeholder="Ingrese una descripción"><?php echo $car->descripcion; ?></textarea>
    </div>
    <div>
        
        <label>Activa</label>
        <input type="checkbox" name="activa-form" <?php echo $car->activa ? 'checked' : ''; ?>>
    </div>
    <div>
        <button>Guardar</button>
    </div>
</form>