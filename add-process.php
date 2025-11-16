<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }

if(!isset($_SESSION['kontak'])) $_SESSION['kontak'] = [];

$errors = [];
$nama = trim($_POST['nama'] ?? '');
$telepon = trim($_POST['telepon'] ?? '');
$email = trim($_POST['email'] ?? '');
$foto_name = null;

if(!$nama) $errors[] = "Nama wajib diisi";
if(!$telepon) $errors[] = "Telepon wajib diisi";
if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid";

if(isset($_FILES['foto']) && $_FILES['foto']['error']==0){
    $targetDir = "uploads/";
    if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);

    $fileName = time() . "_" . basename($_FILES['foto']['name']);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg','jpeg','png'];

    if(!in_array($fileType,$allowedTypes)){
        $errors[] = "Hanya file JPG, JPEG dan PNG yang diperbolehkan";
    } else {
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$targetFile)){
            $foto_name = $fileName;
        } else {
            $errors[] = "Gagal upload foto";
        }
    }
}

if(empty($errors)){
    $_SESSION['kontak'][] = [
        'nama'=>$nama,
        'telepon'=>$telepon,
        'email'=>$email,
        'foto'=>$foto_name
    ];
    header("Location: index.php");
    exit();
}else{
    $_SESSION['errors'] = $errors;
    header("Location: add.php");
    exit();
}
