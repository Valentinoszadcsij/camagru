<?php session_start(); ?>
<h2>Register</h2>
<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>
<form method="POST" action="/auth/register">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>