<?php session_start(); ?>
<h2>Login</h2>
<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>
<form method="POST" action="/login">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form> 