<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);

include 'header.php';
?>

<h3 class="page-title text-center">Tambah Kontak</h3>

<?php if($success): ?>
    <div class="alert alert-success">
        <?php echo $success; ?>
    </div>
<?php endif; ?>

<form action="add-process.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control <?php echo isset($errors['nama']) ? 'is-invalid' : ''; ?>" name="nama" value="<?php echo htmlspecialchars($old['nama'] ?? ''); ?>">
        <?php if(isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?php echo $errors['nama']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" class="form-control <?php echo isset($errors['telepon']) ? 'is-invalid' : ''; ?>" name="telepon" value="<?php echo htmlspecialchars($old['telepon'] ?? ''); ?>">
        <?php if(isset($errors['telepon'])): ?>
            <div class="invalid-feedback"><?php echo $errors['telepon']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
        <?php if(isset($errors['email'])): ?>
            <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto (opsional)</label>
        <input type="file" class="form-control <?php echo isset($errors['foto']) ? 'is-invalid' : ''; ?>" name="foto" accept="image/*">
        <?php if(isset($errors['foto'])): ?>
            <div class="invalid-feedback"><?php echo $errors['foto']; ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-custom">Simpan</button>
</form>

<?php include 'footer.php'; ?>
