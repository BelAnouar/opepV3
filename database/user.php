<?php

function register($firstName, $lastName, $email, $password)
{
    global $conn;
    $results = getUsersByEmail($email);

    if ($results['num'] > 0) {
        echo "Email already exists!";
    } else {
        $new_password = md5($password . $email);
        $sql = $conn->prepare("INSERT INTO users (Nom, Prenom, email, PASSWORD, status) VALUES (?, ?, ?, ?, 401)");

        if ($sql) {
            $sql->bind_param("ssss", $firstName, $lastName, $email, $new_password);
            $sql->execute();
            return true;
        } else {
            echo "SQL prepare error: " . $conn->error;
        }
    }
}

function login($email, $password)
{
    global $conn;
    $results = getUsersByEmail($email);

    if ($results['num'] == 0) {
        echo "Email doesn't already exist!";
    } else {
        $new_password = md5($password . $email);
        $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND PASSWORD = ?");

        if ($sql) {
            $sql->bind_param("ss", $email, $new_password);
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "SQL prepare error: " . $conn->error;
        }
    }
}

function getUsersByEmail($email)
{
    global $conn;
    $sql = $conn->prepare("SELECT COUNT(*) AS num FROM users WHERE email = ?");

    if ($sql) {
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        return $row;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
function UpdateRoleByEmail($email, $status, $role)
{
    global $conn;
    $sql = $conn->prepare("UPDATE  users SET status = ? , role_id = ?  WHERE email = ?");

    if ($sql) {
        $sql->bind_param("iis", $status, $role, $email);
        $sql->execute();

        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
function getUsers()
{
    global $conn;

    if ($conn) {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result) {
            $users = $result->fetch_all(MYSQLI_ASSOC);
            return $users;
        } else {
            echo "SQL query error: " . $conn->error;
        }
    } else {
        echo "Database connection error";
    }
}
function  getRoles($idRole)
{
    global $conn;

    if ($conn) {

        $sql = $conn->prepare("SELECT * FROM ROLE WHERE idRole = ?");

        if ($sql) {
            $sql->bind_param("i", $idRole);
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "SQL query error: " . $conn->error;
        }
    } else {
        echo "Database connection error";
    }
}

function UpdateStatusByidUSer($status, $iduser)
{
    global $conn;
    $sql = $conn->prepare("UPDATE  users SET status = ?   WHERE idUser = ?");

    if ($sql) {
        $sql->bind_param("ii", $status, $iduser);
        $sql->execute();

        return true;
    } else {
        echo "SQL prepare error: " . $conn->error;
    }
}
