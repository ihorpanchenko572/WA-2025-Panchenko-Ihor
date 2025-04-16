<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../ModelsST/database.php';
require_once '../ModelsST/student.php';

$db = (new Database())->getConnection();
$studentModel = new Student($db);
$studenti = $studentModel->getAll();

$editMode = false;
$studentToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $studentToEdit = $studentModel->getById($editId);
    if ($studentToEdit) {
        $editMode = true;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání studentů</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Školní evidence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/viewstudenti/student_create.php">Přidat studenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerST/student_list.php">Výpis studentů</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($editMode): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Upravit studenta: <?= htmlspecialchars($studentToEdit['jmeno']) ?> <?= htmlspecialchars($studentToEdit['prijmeni']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerST/student_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $studentToEdit['id'] ?>">

                            <div class="mb-3">
                                <label class="form-label">ID studenta:</label>
                                <input type="text" class="form-control" value="<?= $studentToEdit['id'] ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="jmeno" class="form-label">Jméno:</label>
                                <input type="text" id="jmeno" name="jmeno" class="form-control" required value="<?= htmlspecialchars($studentToEdit['jmeno']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="prijmeni" class="form-label">Příjmení:</label>
                                <input type="text" id="prijmeni" name="prijmeni" class="form-control" required value="<?= htmlspecialchars($studentToEdit['prijmeni']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="vek" class="form-label">Věk:</label>
                                <input type="number" id="vek" name="vek" class="form-control" required value="<?= htmlspecialchars($studentToEdit['vek']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="narodnost" class="form-label">Národnost:</label>
                                <input type="text" id="narodnost" name="narodnost" class="form-control" required value="<?= htmlspecialchars($studentToEdit['narodnost']) ?>">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <h2 class="mt-5">Výpis studentů</h2>
    <?php if (!empty($studenti)): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
            <tr>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Věk</th>
                <th>Národnost</th>
                <th>Akce</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($studenti as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['jmeno']) ?></td>
                    <td><?= htmlspecialchars($student['prijmeni']) ?></td>
                    <td><?= htmlspecialchars($student['vek']) ?></td>
                    <td><?= htmlspecialchars($student['narodnost']) ?></td>
                    <td>
                        <a href="?edit=<?= $student['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                        <a href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerST/student_delete.php?id=<?= $student['id'] ?>"
                           class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tohoto studenta?');">Smazat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Žádný student nebyl nalezen.</div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
