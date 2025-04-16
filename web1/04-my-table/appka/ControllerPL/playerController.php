<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../ModelsPL/database.php';
require_once '../ModelsPL/player.php';

class playerController {
    private $db;
    private $playerModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->playerModel = new Player($this->db);
    }

    public function createPlayer() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $position = htmlspecialchars($_POST['position']);
            $age = intval($_POST['age']);
            $nationality = htmlspecialchars($_POST['nationality']);

            // Uložení hrace do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->playerModel->create($name, $position, $age, $nationality)) {
                header("Location: http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerPL/player_list.php");
                exit();
            } else {
                echo "Chyba při ukládání hráče.";
            }
        }
    }

    public function listPlayers() {
        $players = $this->playerModel->getAll();
        include '../viewsPlayers/player_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new playerController();
$controller->createPlayer();