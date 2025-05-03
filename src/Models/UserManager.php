<?php
namespace Excomposer\Models;

use Excomposer\Models\User;

/** Class UserManager **/
class UserManager {

    private $bdd;

    
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getUserById($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM User WHERE Id_user = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Excomposer\Models\User");
        return $stmt->fetch();
    }
    public function getUserByEmail($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute(array(
            $email
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Excomposer\\Models\\User");
        return $stmt->fetch();
    }

    public function store($userData)
    {
        $stmt = $this->bdd->prepare("INSERT INTO user(firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $userData['firstname'] ?? null,
            $userData['lastname'] ?? null,
            $userData['email'],
            $userData['password'],
        ));
        return $this->bdd->lastInsertId();
    }
}
