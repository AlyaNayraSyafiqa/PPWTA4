<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }
include 'header.php';

$index = $_GET['index'] ?? null;
if($index===null || !isset($_SESSION['kontak'][$index])){
    echo "<p class='text-danger'>Kontak tidak ditemukan!</p>";
    include 'footer.php'; exit();
}

$kontak = $_SESSION['kontak'][$index];
?>

<h3 class="page-title text-center">Edit Kontak</h3>

<form action="edit-process.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="index" value="<?= $index ?>">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" required value="<?= htmlspecialchars($kontak['nama']); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" class="form-control" name="telepon" required value="<?= htmlspecialchars($kontak['telepon']); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($kontak['email']); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto (opsional)</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
        <?php if($kontak['foto']): ?>
            <p class="mt-2">Foto saat ini:</p>
            <img src="uploads/<?= htmlspecialchars($kontak['foto']); ?>" style="width:80px;height:80px;object-fit:cover;border-radius:50%;">
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-custom">Update</button>
</form>

<?php include 'footer.php'; ?>
