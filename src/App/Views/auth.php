<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body class="bg-secondary auth-page">
    <nav class="navbar bg-primary bord-primary">
            <div class="navbar-left">LOGO</div>
            <div class="navbar-center">42Fans</div>
            <div class="navbar-right">
            <?php if(!(isset($_SESSION['user_id']))): ?>                
                <a href="/Auth/register">
                    <div class="icon-btn profile"></div>
                </a>
            <?php else: ?>
                <a href="/UserProfile">
                    <div class="icon-btn profile"></div>
                </a>                
                <form method="POST" action="/Auth/logout">
                     <button type="submit" class="icon-btn logout" aria-label="Log out"></button>
                </form>
            <?php endif; ?>                
            </div>
    </nav>
    <div class="auth-form">
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
        <div class="login bg-secondary bord-primary">
            <h2>Login</h2>
            <?php if (!empty($_SESSION['error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <p style="color:gray"><?php echo session_id();?></p>
            <form method="POST" action="/auth/login">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Login</button>
            </form> 
        </div>
    </div>
</body>
</html>