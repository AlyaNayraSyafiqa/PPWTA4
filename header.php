<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Kontak</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Pacifico (brush pen style) -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
        body {
            padding-top: 100px;   /* jarak navbar ke konten */
            padding-bottom: 100px; /* jarak footer ke konten */
            background-color: #fff0f5; /* soft pastel pink */
            color: #333;
        }

        footer {
            height: 80px;
            line-height: 80px;
            background-color: #f8d7e3; /* soft dusty pink */
        }

        .navbar-custom {
            background-color: #f4a6c0; /* soft pink */
            min-height: 70px; /* lebih lebar */
        }

        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 2rem;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 2px 2px 6px rgba(0,0,0,0.2);
        }

        .btn-custom {
            background-color: #f7c0d5;
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #f4a6c0;
            color: #fff;
        }

        .table-custom th {
            background-color: #f4a6c0;
            color: #fff;
        }

        .form-control:focus {
            border-color: #f4a6c0;
            box-shadow: 0 0 0 0.2rem rgba(244,166,192,0.25);
        }

        .alert-info {
            background-color: #ffe6f2;
            color: #b03a5b;
        }

        h3.page-title {
            margin-bottom: 30px; /* jarak ke konten */
            color: #b03a5b;
        }
    </style>
</head>
<body>

<!-- Navbar fixed-top -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> SimetakApp </a>
    <div class="d-flex">
      <?php if (isset($_SESSION['login'])): ?>
        <a class="btn btn-outline-light me-2" href="add.php">Tambah Kontak</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container">
