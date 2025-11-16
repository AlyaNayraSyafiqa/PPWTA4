<?php
session_start();
if(!isset($_SESSION['login'])){ header("Location: login.php"); exit(); }
include 'header.php';
?>

<h3 class="page-title text-center">Daftar Kontak</h3>

<?php if(!empty($_SESSION['kontak'])): ?>
<table class="table table-bordered table-custom align-middle text-center">
<thead>
<tr>
<th>Foto</th>
<th>Nama</th>
<th>Telepon</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach($_SESSION['kontak'] as $index => $kontak): ?>
<tr>
<td>
<?php if($kontak['foto']): ?>
<img src="uploads/<?= htmlspecialchars($kontak['foto']); ?>" 
style="width:50px;height:50px;object-fit:cover;border-radius:50%;">
<?php else: ?>
<span class="text-muted">Tidak ada</span>
<?php endif; ?>
</td>
<td><?= htmlspecialchars($kontak['nama']); ?></td>
<td><?= htmlspecialchars($kontak['telepon']); ?></td>
<td><?= htmlspecialchars($kontak['email']); ?></td>
<td>
    <a href="edit.php?index=<?= $index ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
    <a href="delete.php?index=<?= $index ?>" class="btn btn-sm btn-danger mb-1" 
       onclick="return confirm('Yakin ingin menghapus kontak ini?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p class="text-center">Belum ada kontak.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>
