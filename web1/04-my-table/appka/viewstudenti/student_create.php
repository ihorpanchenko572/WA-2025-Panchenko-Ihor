<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat studenta</title>

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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat nového studenta</h2>
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerST/studentController.php" method="post">
                            
                            <div class="mb-3">
                                <label for="jmeno" class="form-label">Jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="jmeno" name="jmeno" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="prijmeni" class="form-label">Příjmení: <span class="text-danger">*</span></label>
                                <input type="text" id="prijmeni" name="prijmeni" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="vek" class="form-label">Věk: <span class="text-danger">*</span></label>
                                <input type="number" id="vek" name="vek" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="narodnost" class="form-label">Národnost:</label>
                                <input type="text" id="narodnost" name="narodnost" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit studenta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
