<h1>Carrera</h1>
<hr>
<a href="?c=Carrera&a=Crud">Nueva Carrera</a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>Duración (Semestres)</th>
            <th>Descripción</th>
            <th>Fecha Creación</th>
            <th>Activa</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r):?>
            <tr>
                <td><?php echo $r->nombre_carrera; ?></td>
                <td><?php echo $r->codigo_carrera; ?></td>
                <td><?php echo $r->duracion_semestres; ?></td>
                <td><?php echo $r->descripcion; ?></td>
                <td><?php echo $r->fecha_creacion; ?></td>
                <td><?php echo $r->activa ? 'Sí' : 'No'; ?></td>
                <td>
                    <a href="?c=Carrera&a=Crud&id=<?php echo $r->id_carrera;?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Estás seguro de eliminar este registro?')" href="?c=Carrera&a=Eliminar&id=<?php echo $r->id_carrera;?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>