<?php

namespace Excomposer\Models;

/**
 * Classe User pour la gestion des utilisateurs
 */
class User {
    private $id_user;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $created_at;
    private $updated_at;

    /**
     * Constructeur par défaut
     */
    public function __construct() {
        // Constructeur vide
    }

    /**
     * Obtient l'ID de l'utilisateur
     * 
     * @return int L'ID de l'utilisateur
     */
    public function getId_user() {
        return $this->id_user;
    }

    /**
     * Définit l'ID de l'utilisateur
     * 
     * @param int $id_user L'ID de l'utilisateur
     */
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    /**
     * Obtient le prénom de l'utilisateur
     * 
     * @return string Le prénom de l'utilisateur
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Définit le prénom de l'utilisateur
     * 
     * @param string $firstname Le prénom de l'utilisateur
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * Obtient le nom de famille de l'utilisateur
     * 
     * @return string Le nom de famille de l'utilisateur
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Définit le nom de famille de l'utilisateur
     * 
     * @param string $lastname Le nom de famille de l'utilisateur
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    /**
     * Obtient l'adresse email de l'utilisateur
     * 
     * @return string L'adresse email de l'utilisateur
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Définit l'adresse email de l'utilisateur
     * 
     * @param string $email L'adresse email de l'utilisateur
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Obtient le mot de passe de l'utilisateur
     * 
     * @return string Le mot de passe haché de l'utilisateur
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Définit le mot de passe de l'utilisateur
     * 
     * @param string $password Le mot de passe en clair à hacher
     */
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Obtient la date de création de l'utilisateur
     * 
     * @return string La date de création
     */
    public function getCreated_at() {
        return $this->created_at;
    }

    /**
     * Définit la date de création de l'utilisateur
     * 
     * @param string $created_at La date de création
     */
    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    /**
     * Obtient la date de mise à jour de l'utilisateur
     * 
     * @return string La date de mise à jour
     */
    public function getUpdated_at() {
        return $this->updated_at;
    }

    /**
     * Définit la date de mise à jour de l'utilisateur
     * 
     * @param string $updated_at La date de mise à jour
     */
    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    /**
     * Vérifie si un mot de passe en clair correspond au mot de passe haché
     * 
     * @param string $password Le mot de passe en clair à vérifier
     * @return bool True si le mot de passe correspond, false sinon
     */
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }
}
