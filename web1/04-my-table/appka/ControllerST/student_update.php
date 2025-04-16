<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Formulář byl odeslán na: " . $_SERVER['REQUEST_URI'];

require_once '../ModelsST/database.php';
require_once '../ModelsST/student.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $jmeno = htmlspecialchars($_POST['jmeno']);
    $prijmeni = htmlspecialchars($_POST['prijmeni']);
    $vek = intval($_POST['vek']);
    $narodnost = htmlspecialchars($_POST['narodnost']);

    $db = (new Database())->getConnection();
    $studentModel = new Student($db);

    $success = $studentModel->update(
        $id,
        $jmeno,
        $prijmeni,
        $vek,
        $narodnost
    );

    if ($success) {
        header("Location: ../viewstudenti/students_edit_delete.php");
        exit();
    } else {
        echo "Chyba při aktualizaci studenta.";
    }
} else {
    echo "Neplatný požadavek.";
}
