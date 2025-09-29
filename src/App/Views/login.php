<div class="login bg-secondary bord-primary">
    <h2>Login</h2>
    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <p style="color:gray"><?php echo session_id();?></p>
    <form method="POST" action="/auth/login">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form> 
</div>