<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
require_once '../models/Database.php';
require_once '../models/User.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email =  !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
            $password_hash = htmlspecialchars($_POST['password_hash']);
            $name =  !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
            $surname =  !empty($_POST['surname']) ? htmlspecialchars($_POST['surname']) : null;

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->userModel->create($username, $email, $name, $surname, $password_hash)) {
                header("Location: ../controllers/user_list.php");
                exit();
            } else {
                echo "Chyba při ukládání user.";
            }
        }
    }

        public function listUsers () {
            $users = $this->userModel->getAll();
    }
 }

// Volání metody při odeslání formuláře
$controller = new UserController();
$controller->createUser();