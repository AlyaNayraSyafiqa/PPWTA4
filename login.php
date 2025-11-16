<?php
session_start();

$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username == "admin" && $password == "123456") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $login_error = "Username atau password salah!";
    }
}
?>

<?php include 'header.php'; ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm" style="width: 350px; background-color: #ffe6f2;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4" style="color:#b03a5b;">Login</h3>

            <?php if($login_error): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($login_error); ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="admin">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required value="123456">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom">Login</button>
                </div>
            </form>

            <p class="mt-3 text-center text-muted" style="font-size:0.9rem;">
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
