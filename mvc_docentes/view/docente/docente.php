<h1>Docente</h1>
<hr>
<a href="?c=Docente&a=Crud">Nuevo Docente</a>
<table>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Título Académico</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Fecha de Contratación</th>
            <th>Activo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r):?>
            <tr>
                <td><?php echo $r->cedula; ?></td>
                <td><?php echo $r->nombres; ?></td>
                <td><?php echo $r->apellidos; ?></td>
                <td><?php echo $r->titulo_academico; ?></td>
                <td><?php echo $r->especialidad; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->fecha_contratacion; ?></td>
                <td><?php echo $r->activo ? 'Sí' : 'No'; ?></td>
                <td>
                    <a href="?c=Docente&a=Crud&id_docente=<?php echo $r->id_docente;?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Estás seguro de eliminar este registro?')" href="?c=Docente&a=Eliminar&id_docente=<?php echo $r->id_docente;?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>