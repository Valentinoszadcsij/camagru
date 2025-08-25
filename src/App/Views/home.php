<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <nav>Navbar here</nav>

    <h1>Register User</h1>
    <form method="POST" action="">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>   
        <button type="submit">Register</button>
    </form>

    <p><?php echo $message ?? ''; ?></p>

    <footer>Footer</footer>
</body>
</html>
