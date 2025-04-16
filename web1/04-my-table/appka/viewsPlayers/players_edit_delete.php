
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../ModelsPL/database.php';
require_once '../ModelsPL/player.php';

$db = (new Database())->getConnection();
$playerModel = new Player($db);
$players = $playerModel->getAll();

$editMode = false;
$playerToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $playerToEdit = $playerModel->getById($editId);
    if ($playerToEdit) {
        $editMode = true;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazani hráče</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sportovní tým</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/viewsPlayers/player_create.php">Přidat hráče</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerPL/player_list.php">Výpis hráčů</a>
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
                    <h2>Upravit hráče: <?= htmlspecialchars($playerToEdit['name']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerPL/player_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $playerToEdit['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">ID hráče:</label>
                                <input type="text" class="form-control" value="<?= $playerToEdit['id'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Jmeno hráče:</label>
                                <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($playerToEdit['name']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Pozice:</label>
                                <input type="text" id="position" name="position" class="form-control" required value="<?= htmlspecialchars($playerToEdit['position']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="age" class="form-label">Věk:</label>
                                <input type="number" id="age" name="age" class="form-control" required value="<?= htmlspecialchars($playerToEdit['age']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nationality" class="form-label">Národnost:</label>
                                <input type="text" id="nationality" name="nationality" class="form-control" required value="<?= htmlspecialchars($playerToEdit['nationality']) ?>">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <h2>Výpis hráče</h2> 
        <?php if(!empty($players)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Jméno hráče</th>
                        <th>Pozice</th>
                        <th>Věk</th>
                        <th>Národnost</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($players as $player): ?>
                        <tr>
                            <td><?= htmlspecialchars($player['name']) ?></td>
                            <td><?= htmlspecialchars($player['position']) ?></td>
                            <td><?= htmlspecialchars($player['age']) ?></td>
                            <td><?= htmlspecialchars($player['nationality']) ?></td>
                            <td>
                                    <a href="?edit=<?= $player['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                                    <a href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerPL/player_delete.php?id=<?= $player['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tohoto hráče?');">Smazat</a>
                            </td>
                        </tr>    
                    <?php endforeach; ?>    
                </tbody>
            </table>
            
        <?php else: ?>
            <div class="alert alert-info">Žádný hráč nebyl nalezen</div>
        <?php endif; ?>       
  
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>