<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }

$index = $_GET['index'] ?? null;
if($index!==null && isset($_SESSION['kontak'][$index])){
    // Hapus file foto jika ada
    $foto = $_SESSION['kontak'][$index]['foto'] ?? null;
    if($foto && file_exists("uploads/$foto")) unlink("uploads/$foto");

    // Hapus kontak dari session
    array_splice($_SESSION['kontak'],$index,1);
}

header("Location: index.php");
exit();
