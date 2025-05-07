<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Semestre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">
        <?php echo $est->id != null ? "Editar Semestre: $est->nombre_semestre" : "Nuevo Registro"; ?>
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=Semestre">Semestre</a></li>
        <li class="breadcrumb-item active"><?php echo $est->id != null ? $est->nombre_semestre : "Nuevo Registro"; ?></li>
    </ol>

    <form action="?c=Semestre&a=Guardar" method="post" class="p-4 bg-light rounded">
        <input type="hidden" name="id-form" value="<?php echo $est->id; ?>">

        <div class="mb-3">
            <label class="form-label">Numero Semestre</label>
            <input type="text" name="numero_semestre-form" value="<?php echo $est->numero_semestre; ?>" class="form-control" placeholder="Ingrese su numero" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre Semestre</label>
            <input type="text" name="nombre_semestre-form" value="<?php echo $est->nombre_semestre; ?>" class="form-control" placeholder="Ingrese Nombre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio-form" value="<?php echo $est->fecha_inicio; ?>" class="form-control" placeholder="Ingrese su Fecha Inicio" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha Fin</label>
            <input type="date" name="fecha_fin-form" value="<?php echo $est->fecha_fin; ?>" class="form-control" placeholder="Ingrese su Fecha Fin" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Activo</label>
            <select name="activo-form" class="form-control">
                <option value="1" <?php echo ($est->activo == 1) ? 'selected' : ''; ?>>Activo</option>
                <option value="0" <?php echo ($est->activo == 0) ? 'selected' : ''; ?>>Inactivo</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" onclick="confirmSave()">Guardar</button>
        </div>
    </form>
</div>

<script>
    function confirmSave() {
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            text: "Los datos se guardarán en la base de datos.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector("form").submit();
            }
        });
        return false; // Previene el envío automático del formulario.
    }
</script>

</body>
</html>
