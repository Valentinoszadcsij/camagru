<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="auth-page">
        <div class="register">
            <h2>Register</h2>
            <?php if (!empty($_SESSION['success'])): ?>
                <p style="color:blue;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>  
            <?php if (!empty($_SESSION['error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <form method="POST" action="/auth/register">
                Name: <input type="text" name="name" required><br>
                Email: <input type="email" name="email" required><br>
                Password: <input type="password" name="password" required><br>
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="login">
            <h2>Login</h2>
            <?php if (!empty($_SESSION['error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <p style="color:gray"><?php echo session_id();?></p>
            <form method="POST" action="/auth/login">
                Email: <input type="email" name="email" required><br>
                Password: <input type="password" name="password" required><br>
                <button type="submit">Login</button>
            </form> 
        </div>
    </div>
</body>
</html>