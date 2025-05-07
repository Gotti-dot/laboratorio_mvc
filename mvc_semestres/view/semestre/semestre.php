<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semestres</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <hr>

    <a href="?c=Semestre&a=Crud" class="btn btn-success mb-3">Nuevo Semestre</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Numero Semestre</th>
                <th>Nombre Semestre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->Listar() as $r): ?>
                <tr>
                    <td><?php echo $r->numero_semestre; ?></td>
                    <td><?php echo $r->nombre_semestre; ?></td>
                    <td><?php echo $r->fecha_inicio; ?></td>
                    <td><?php echo $r->fecha_fin; ?></td>
                    <td><?php echo ($r->activo == 1) ? "Activo" : "Inactivo"; ?></td>
                    <td>
                        <a href="?c=Semestre&a=Crud&id=<?php echo $r->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="confirmDelete('?c=Semestre&a=Eliminar&id=<?php echo $r->id; ?>')" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

</body>
</html>
