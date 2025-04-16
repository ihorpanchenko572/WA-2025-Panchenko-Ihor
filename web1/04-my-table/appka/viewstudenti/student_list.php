<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis studentů</title>

    <!-- Bootstrap CSS -->
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

        <h2>Výpis studentů</h2>

        <?php if (!empty($studenti)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Věk</th>
                        <th>Národnost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studenti as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($student['jmeno']) ?></td>
                            <td><?= htmlspecialchars($student['prijmeni']) ?></td>
                            <td><?= htmlspecialchars($student['vek']) ?></td>
                            <td><?= htmlspecialchars($student['narodnost']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádný student nebyl nalezen.</div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
