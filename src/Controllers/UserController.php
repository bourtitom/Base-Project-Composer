<?php

namespace Excomposer\Controllers;

use Excomposer\Models\UserManager;
use Excomposer\Models\User;

/** Class ModelController **/
class UserController {
    private $manager;


    public function __construct() {
        $this->manager = new UserManager();

    }

    /** HomePage page d'accueil**/
    public function homepage() {

        require VIEWS . 'PageViews/homepage.php';
    }
    public function showLogin(){

        require VIEWS . 'Auth/login.php';
    }
    public function showRegister(){

        require VIEWS . 'Auth/register.php';
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }

    /**
     * Gère l'enregistrement d'un nouvel utilisateur
     */
    public function register() {
        $_SESSION['old'] = $_POST;

        // Vérification que les mots de passe correspondent
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $_SESSION["error"]['message'] = "Les mots de passe ne correspondent pas";
            header("Location: /register");
            return;
        }

        /** vérifie si le pseudo existe déjà **/
        $res = $this->manager->getUserByEmail($_POST["email"]);
        var_dump($res);
        // Vérifier si l'email existe déjà (si fourni)
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $emailCheck = $this->manager->getUserByEmail($_POST['email']);
            if ($emailCheck) {
                $_SESSION["error"]['email'] = "Cette adresse email est déjà utilisée !";
                header("Location: /register");
                return;
            }
        }

        if (empty($res)) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            // Préparer les données utilisateur
            $userData = [
                'email' => $_POST['email'] ?? null,
                'password' => $password,
                'firstname' => $_POST['firstname'] ?? null,
                'lastname' => $_POST['lastname'] ?? null
            ];
            
            $userId = $this->manager->store($userData);

            $_SESSION["user"] = [
                "id" => $userId,
                "email" => $_POST["email"],
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "fullname" => $_POST["firstname"] . ' ' . $_POST["lastname"],
            ];
            header("Location: /");
        } else {
            $_SESSION["error"]['username'] = "Le pseudo choisi est déjà utilisé !";
            header("Location: /register");
        }
    }

    /**
     * Gère la connexion d'un utilisateur
     */
    public function login() {
        $_SESSION['old'] = $_POST;

            $res = $this->manager->getUserByEmail($_POST['email']);

            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId_user(),
                    "firstname" => $res->getFirstname(),
                    "lastname" => $res->getLastname(),
                    "email" => $res->getEmail(),
                    "fullname" => $res->getFirstname() . ' ' . $res->getLastname()
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
                exit;

            }
    }
}
