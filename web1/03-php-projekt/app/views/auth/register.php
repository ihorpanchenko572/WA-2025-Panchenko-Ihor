<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    
    <!-- Bootstrap CSS hgmgjg -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- <link rel="stylesheet" href="/public/css/styles.css"> -->
</head>
<body class="bg-light">

    <div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/03-php-projekt/app/views/books/book_create.php">Přidat knihu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/03-php-projekt/app/controllers/book_list.php">Výpis knih</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/03-php-projekt/app/views/auth/register.php">Registrace</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/03-php-projekt/app/controllers/book_list.php">Příhlašení</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Registrace uživatele</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/UserController.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail (nepovinný): <span class="text-danger">*</span></label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Jméno (nepovinný):</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">Příjmení (nepovinný):</label>
                                <input type="text" id="surname" name="surname" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password_hash" class="form-label">Heslo: <span class="text-danger">*</span></label>
                                <input type="number" id="password_hash" name="password_hash" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_hash" class="form-label">Potvrzení hesla: <span class="text-danger">*</span></label>
                                <input type="number" id="password_hash" name="password_hash" class="form-control" step="0.01" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html><!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Knihovna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/books/book_create.php">Přidat knihu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/book_list.php">Výpis knih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Registrace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Přihlášení</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Registrace uživatele</h2>
                </div>
                <div class="card-body">
                    <form id="registrationForm" action="../../controllers/register.php" method="post" >
                        <div class="mb-3">
                            <label for="username" class="form-label">Uživatelské jméno:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail (nepovinný):</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Jméno (nepovinné):</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label">Příjmení (nepovinné):</label>
                            <input type="text" id="surname" name="surname" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo:</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                   title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Potvrzení hesla:</label>
                            <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                            <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                Hesla se neshodují.
                            </div>
                        </div>

                        

                        <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Kontrola hesel v JS -->
<script>
    const form = document.getElementById('registrationForm');
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirm');
    const message = document.getElementById('passwordMatchMessage');

    form.addEventListener('submit', function (e) {
        if (password.value !== confirm.value) {
            e.preventDefault();
            message.classList.remove('d-none');
        } else {
            message.classList.add('d-none');
        }
    });
</script>

</body>
</html>