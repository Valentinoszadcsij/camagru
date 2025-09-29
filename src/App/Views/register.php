<div class="register bg-secondary bord-primary">
    <h2>Register</h2>
    <?php if (!empty($_SESSION['success'])): ?>
        <p style="color:blue;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>  
    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
        <form method="POST" action="/auth/register">
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Register</button>
        </form>
</div>