<?php

namespace Services;
session_start();
require_once "./../../Framework/Datebase.php";

use Framework\Database;

class AuthService
{


    private Database $db;
    public function __construct()
    {
        $this->db=new Database();
    }

    public function register($firstName, $lastName, $email, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (Nom, Prenom, email, PASSWORD, status) VALUES (:nom, :prenom, :email, :pass, :status)";
        $params = [
            'nom' => $firstName,
            'prenom' => $lastName,
            'email' => $email,
            'pass' => $hashedPassword,
            'status'=> 401
        ];


        try {
            $this->db->query($sql, $params);
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error registering user: " . $e->getMessage());
        }
    }


    public function getUsersByEmail($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $params = ['email' => $email];

        try {
            $emailCount = $this->db->query($sql, $params)->count();
            return ['num' => $emailCount];
        } catch (\Exception $e) {
            throw new \Exception("Error fetching user count by email: " . $e->getMessage());
        }
    }




    public function login($email ,$password)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        $passwordsMatch = password_verify(
            $password,
            $user['password'] ?? ''
        );

        if (!$user || !$passwordsMatch) {
            throw new \Exception("password invalid");
        }

        if ($user['status'] == 401) {
            header("Location: role.php");
            exit();
        } else {
            if ($user['status'] != 403) {
                if ($user['role_id'] == 3) {
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: dashboard.php");
                    exit();
                }
            } else {
                header("Location: 403.php");
            }
        }
        session_regenerate_id();

        $_SESSION['user'] = $user['idUser'];
    }



    public function UpdateRoleByIdUser($status, $roleId)
    {
        $sql = "UPDATE users SET status = :status , role_id = :roleId  WHERE idUser = :idUser";
        $params = [
            'status' => $status,
            'roleId' => $roleId,
            'idUser' => $_SESSION['user']
        ];

        try {
            $this->db->query($sql, $params);


            $updatedUser = $this->getUserById($_SESSION['user']);

            $this->db->query($sql, $params);


            $updatedUser = $this->getUserById($_SESSION['user']);

            if ($updatedUser['role_id'] == 2) {

                echo '<script>window.location.replace("403.php");</script>';
                exit();
            } else {

                echo '<script>window.location.replace("index.php");</script>';
                exit();
            }
        } catch (\Exception $e) {
            throw new \Exception("Error updating user role: " . $e->getMessage());
        }
    }

    private function getUserById($userId)
    {
        $sql = "SELECT * FROM users WHERE idUser = :idUser";
        $params = ['idUser' => $userId];

        try {
            return $this->db->query($sql, $params)->find();
        } catch (\Exception $e) {
            throw new \Exception("Error fetching user by ID: " . $e->getMessage());
        }
    }

    public function getUsers()
    {

        try {

            $sql = "SELECT * FROM users";


            $users = $this->db->query($sql)->findAll();

            return $users;
        } catch (\Exception $e) {

            throw new \Exception("Error fetching users: " . $e->getMessage());
        }
    }
}
