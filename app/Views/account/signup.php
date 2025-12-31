<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>
    <h2>Signup</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <form method="post">
        <?= csrf_field() ?> <!-- CSRF protection -->
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
    </form>
    <a href="/login">Already have an account?</a>
</body>
</html>