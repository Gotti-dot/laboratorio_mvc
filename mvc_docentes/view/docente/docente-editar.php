<h1><?php $doc->id_docente != null ? $doc->nombres : 'Nuevo Registro'; ?></h1>
<ol>
    <li><a href="?c=Docente">Docente</a></li>
    <li><?php $doc->id_docente != null ? $doc->nombres : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Docente&a=Guardar" method="post">
    <input type="hidden" name="id-form" value="<?php echo $doc->id_docente; ?>">
    <div>
        <label>Cédula</label>
        <input type="text" name="cedula-form" value="<?php echo $doc->cedula; ?>" placeholder="Ingrese su cédula">
    </div>
    <div>
        <label>Nombres</label>
        <input type="text" name="nombres-form" value="<?php echo $doc->nombres; ?>" placeholder="Ingrese sus nombres">
    </div>
    <div>
        <label>Apellidos</label>
        <input type="text" name="apellidos-form" value="<?php echo $doc->apellidos; ?>" placeholder="Ingrese sus apellidos">
    </div>
    <div>
        <label>Título Académico</label>
        <input type="text" name="titulo-form" value="<?php echo $doc->titulo_academico; ?>" placeholder="Ingrese su título académico">
    </div>
    <div>
        <label>Especialidad</label>
        <input type="text" name="especialidad-form" value="<?php echo $doc->especialidad; ?>" placeholder="Ingrese su especialidad">
    </div>
    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono-form" value="<?php echo $doc->telefono; ?>" placeholder="Ingrese su teléfono">
    </div>
    <div>
        <label>Correo</label>
        <input type="text" name="email-form" value="<?php echo $doc->email; ?>" placeholder="Ingrese su correo">
    </div>
    
        <label>Activo</label>
        <input type="checkbox" name="activo-form" <?php echo $doc->activo ? 'checked' : ''; ?>>
    </div>
    <div>
        <button>Guardar</button>
    </div>
</form>