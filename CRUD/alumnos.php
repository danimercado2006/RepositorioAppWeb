<?php
    /* Incluir la informacion de archivo conexion.php */
    include("conexion.php");
    $conexion = conectar();
    $sql = "SELECT * FROM alumno";
    $query = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos | CRUD PHP</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        .card-custom {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .avatar-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark py-3 shadow-sm sticky-top" style="background: linear-gradient(90deg, #1e293b 0%, #0f172a 100%) !important;">
        <div class="container">
            <span class="navbar-brand d-flex align-items-center gap-2 fw-bold">
                <i class="bi bi-mortarboard-fill text-primary fs-4"></i> Control Escolar &bull; Alumnos
            </span>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2">
                <i class="bi bi-people-fill me-1"></i> Módulo Académico
            </span>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container my-5 flex-grow-1">
        <div class="row g-4">
            <!-- Formulario de Registro -->
            <div class="col-lg-4">
                <div class="card card-custom bg-white sticky-top" style="top: 90px;">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <div class="d-flex align-items-center gap-2">
                            <span class="p-2 bg-primary-subtle text-primary rounded-3">
                                <i class="bi bi-person-plus-fill fs-5"></i>
                            </span>
                            <div>
                                <h5 class="card-title fw-bold mb-0">Registrar Alumno</h5>
                                <small class="text-muted">Ingresa los datos escolares</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="insertar.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Matrícula</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-card-heading"></i></span>
                                    <input type="text" class="form-control" name="matricula" placeholder="Ej. 122043000" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Nombre(s)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="nombre" placeholder="Ej. Carlos" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Apellido Paterno</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="ap" placeholder="Ej. Gómez" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Apellido Materno</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="am" placeholder="Ej. Morales" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-semibold text-secondary">Edad</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-calendar3"></i></span>
                                    <input type="number" class="form-control" name="edad" placeholder="Ej. 20" min="1" max="100" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-plus-circle-fill"></i> Guardar Alumno
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabla de Alumnos -->
            <div class="col-lg-8">
                <div class="card card-custom bg-white">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title fw-bold mb-0">Listado General de Alumnos</h5>
                                <small class="text-muted">Registro activo en la base de datos</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-secondary text-uppercase small">
                                    <tr>
                                        <th class="ps-4">Alumno</th>
                                        <th>Matrícula</th>
                                        <th>Edad</th>
                                        <th class="text-end pe-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_array($query)): ?>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <div class="avatar-circle">
                                                        <?php echo strtoupper(substr($row['nombre'], 0, 1)); ?>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido_p'] . ' ' . $row['apellido_m']); ?></div>
                                                        <small class="text-muted">ID: #<?php echo $row['id']; ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark border font-monospace px-2.5 py-1.5">
                                                    <?php echo htmlspecialchars($row['matricula'] ?? 'S/M'); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary fw-semibold">
                                                    <?php echo htmlspecialchars($row['edad']); ?> años
                                                </span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary rounded-pill px-2.5 me-1" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger rounded-pill px-2.5" onclick="return confirm('¿Deseas eliminar este registro?')" title="Eliminar">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-top py-3 text-center text-muted small mt-auto">
        &copy; 2026 Módulo de Alumnos &bull; Bootstrap 5 &amp; PHP MySQL
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
