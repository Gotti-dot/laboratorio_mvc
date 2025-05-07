<h1>Estudiante</h1>
<hr>
<a href="?c=Estudiante&a=Crud">Nuevo Estudiante</a>
<table>
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Fecha Registro</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r):?>
            <tr>
                <td><?php echo $r->nombre; ?></td>
                <td><?php echo $r->apellido; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->fecha_registro; ?></td>
                <td>
                    <a href="?c=Estudiante&a=Crud&id=<?php echo $r->id;?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('Estas seguro de Eliminar este registro?')" href="?c=Estudiante&a=Eliminar&id=<?php echo $r->id;?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach;?>
    </tbody>
</table>