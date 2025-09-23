<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-primary">
    <div class="auth-page">
        <div class="register bg-secondary bord-primary">
            <h2>Register</h2>
            <?php if (!empty($_SESSION['success'])): ?>
                <p style="color:blue;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>  
            <?php if (!empty($_SESSION['error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <div class="auth-form">
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