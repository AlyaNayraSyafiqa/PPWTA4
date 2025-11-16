<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']);

if(!isset($_SESSION['login'])){ 
    header("Location: login.php"); 
    exit(); 
}

include 'header.php';
?>

<h3 class="page-title text-center">Tambah Kontak</h3>

<form action="add-process.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" required value="<?= htmlspecialchars($old['nama'] ?? '') ?>">
        <?php if(isset($errors['nama'])): ?>
            <div class="text-danger mt-1"><?= htmlspecialchars($errors['nama']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" class="form-control" name="telepon" required value="<?= htmlspecialchars($old['telepon'] ?? '') ?>">
        <?php if(isset($errors['telepon'])): ?>
            <div class="text-danger mt-1"><?= htmlspecialchars($errors['telepon']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        <?php if(isset($errors['email'])): ?>
            <div class="text-danger mt-1"><?= htmlspecialchars($errors['email']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto (opsional)</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
        <?php if(isset($errors['foto'])): ?>
            <div class="text-danger mt-1"><?= htmlspecialchars($errors['foto']) ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-custom">Simpan</button>
</form>

<?php include 'footer.php'; ?>
