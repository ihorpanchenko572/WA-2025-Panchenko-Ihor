<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat hráče</title>
    
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
                            <a class="nav-link" href="http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerPL/player_list.php">Výpis hráče</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <h2>Výpis hráče</h2>
        
        <?php if(!empty($players)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Jméno hráče</th>
                        <th>Pozice</th>
                        <th>Věk</th>
                        <th>Národnost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($players as $player): ?>
                        <tr>
                            <td><?= htmlspecialchars($player['name']) ?></td>
                            <td><?= htmlspecialchars($player['position']) ?></td>
                            <td><?= htmlspecialchars($player['age']) ?></td>
                            <td><?= htmlspecialchars($player['nationality']) ?></td>
                        </tr>    
                    <?php endforeach; ?>    
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádný hráč nebyl nalezen</div>
        <?php endif; ?>       
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>