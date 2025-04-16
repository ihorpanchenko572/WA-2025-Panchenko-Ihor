<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../ModelsPL/database.php';
require_once '../ModelsPL/player.php';

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = (new Database())->getConnection();
        $bookModel = new Player($db);

        if ($bookModel->delete($id)) {
            header("Location: ../viewsPlayers/players_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání hráče.";
        }
    } else {
        echo "Neplatný požadavek.";
    }