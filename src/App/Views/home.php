<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="grid-layout">
        <nav class="navbar">Navbar here
            <div class="auth">
<?php if(!(isset($_SESSION['user_id']))): ?>                
                <a href="/Auth/register">Register</a>
                <a href="/Auth/login">Login</a>
<?php else: ?>                
                <form method="POST" action="/Auth/logout">
                     <button type="submit">Logout</button>
                </form>
<?php endif; ?>                
            </div>
        </nav>
        <div class="menu">
            <ul>
                <li>Home</li>
                <li>My Gallery</li>
            </ul>
        </div>
        <div class="main">main here</div>
        <div class="sidebar">sidebar here</div>
        <!-- <h1>Register User</h1>
        <form method="POST" action="">
            <label>Name: <input type="text" name="name" required></label><br>
            <label>Email: <input type="email" name="email" required></label><br>
            <label>Password: <input type="password" name="password" required></label><br>   
            <button type="submit">Register</button>
        </form> -->
    
        <!-- <p><?php echo $message ?? ''; ?></p> -->
    
        <footer class="footer">Footer</footer>
    </div>
</body>
</html>
