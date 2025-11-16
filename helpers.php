<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = [];
}

function requireLogin() {
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit();
    }
}

function validateContact($data) {

    $errors = [];

    if (empty($data["nama"])) {
        $errors[] = "Nama harus diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data["nama"])) {
        $errors[] = "Nama hanya boleh huruf dan spasi.";
    }

    if (empty($data["telepon"])) {
        $errors[] = "Nomor telepon harus diisi.";
    } elseif (!preg_match("/^[0-9+]+$/", $data["telepon"])) {
        $errors[] = "Nomor telepon hanya boleh angka atau '+'";
    }

    if (!empty($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    return $errors;
}
