<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../ModelsST/database.php';
require_once '../ModelsST/student.php';

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = (new Database())->getConnection();
        $bookModel = new Student($db);

        if ($bookModel->delete($id)) {
            header("Location: ../viewstudenti/students_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání hráče.";
        }
    } else {
        echo "Neplatný požadavek.";
    }