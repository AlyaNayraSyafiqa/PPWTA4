<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }

if(!isset($_SESSION['kontak'])) $_SESSION['kontak'] = [];

$errors = [];
$old = [
    'nama' => trim($_POST['nama'] ?? ''),
    'telepon' => trim($_POST['telepon'] ?? ''),
    'email' => trim($_POST['email'] ?? '')
];

if(!$old['nama']) $errors['nama'] = "Nama wajib diisi";
elseif(!preg_match("/^[a-zA-Z\s]+$/",$old['nama'])) $errors['nama'] = "Nama hanya boleh huruf dan spasi";

if(!$old['telepon']) $errors['telepon'] = "Telepon wajib diisi";
elseif(!preg_match("/^[0-9]+$/",$old['telepon'])) $errors['telepon'] = "Telepon hanya boleh angka";

if(!$old['email']) $errors['email'] = "Email wajib diisi";
elseif(!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Email tidak valid";

$foto_name = null;
if(isset($_FILES['foto']) && $_FILES['foto']['error']==0){
    $targetDir = "uploads/";
    if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);

    $fileName = time() . "_" . basename($_FILES['foto']['name']);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg','jpeg','png'];

    if(!in_array($fileType,$allowedTypes)){
        $errors['foto'] = "Hanya file JPG, JPEG dan PNG yang diperbolehkan";
    } else {
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$targetFile)){
            $foto_name = $fileName;
        } else {
            $errors['foto'] = "Gagal upload foto";
        }
    }
}

if($errors){
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: add.php");
    exit();
}

$_SESSION['kontak'][] = [
    'nama' => $old['nama'],
    'telepon' => $old['telepon'],
    'email' => $old['email'],
    'foto' => $foto_name
];
$_SESSION['success'] = "Kontak berhasil ditambahkan!";
header("Location: index.php");
exit();
