
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
            <?php debug_session_to_console(); ?>
            <div class="navbar-left">LOGO</div>
            <div class="navbar-center">42Fans</div>
            <div class="navbar-right">
            <?php

            use App\Models\User;

            if(User::is_logged_in() == false): ?>                
                <a href="/Auth/">
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
    </div>
</body>
</html>