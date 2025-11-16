<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }
include 'header.php';
?>

<h3 class="page-title text-center">Tambah Kontak</h3>

<form action="add-process.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" class="form-control" name="telepon" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto (opsional)</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
    </div>
    <button type="submit" class="btn btn-custom">Simpan</button>
</form>

<?php include 'footer.php'; ?>
