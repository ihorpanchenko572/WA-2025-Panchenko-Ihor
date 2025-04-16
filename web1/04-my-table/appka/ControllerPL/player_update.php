<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "Форма отправлена на путь: " . $_SERVER['REQUEST_URI'];
require_once '../ModelsPL/database.php';
require_once '../ModelsPL/player.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $position = htmlspecialchars($_POST['position']);
        $age = intval($_POST['age']);
        $nationality = htmlspecialchars($_POST['nationality']);


        $db = (new Database())->getConnection();
        $playerModel = new Player($db);

        $success = $playerModel->update(
            $id,
            $name,
            $position,
            $age,
            $nationality,
        );

        if ($success) {
            header("Location: ../viewsPlayers/players_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci hráče.";
        }
    } else {
        echo "Neplatný požadavek.";
    }