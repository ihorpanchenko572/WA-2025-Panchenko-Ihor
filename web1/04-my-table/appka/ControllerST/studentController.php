<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../ModelsST/database.php';
require_once '../ModelsST/student.php';

class StudentController {
    private $db;
    private $studentModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->studentModel = new Student($this->db);
    }

    public function createStudent() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jmeno = htmlspecialchars($_POST['jmeno']);
            $prijmeni = htmlspecialchars($_POST['prijmeni']);
            $vek = intval($_POST['vek']);
            $narodnost = htmlspecialchars($_POST['narodnost']);

            if ($this->studentModel->create($jmeno, $prijmeni, $vek, $narodnost)) {
                header("Location: http://localhost/WA-2025-Panchenko-Ihor/web1/04-my-table/appka/ControllerST/student_list.php");
                exit();
            } else {
                echo "Chyba při ukládání studenta.";
            }
        }
    }

    public function listStudents() {
        $studenti = $this->studentModel->getAll();
        include '../viewstudenti/student_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new StudentController();
$controller->createStudent();
