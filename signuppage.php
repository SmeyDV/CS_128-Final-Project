<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Signup Page</title>
    
</head>
<body>
    <div class="container">
        <div class="heading">Sign Up</div>
        <form class="form" action="signup.php" method="POST">
            <input
                placeholder="Username"
                id="username"
                name="username"
                type="text"
                class="input"
                required
            />
            <input
                placeholder="E-mail"
                id="email"
                name="email"
                type="email"
                class="input"
                required
            />
            <input
                placeholder="Password"
                id="password"
                name="password"
                type="password"
                class="input"
                required
            />
            <input
                placeholder="Confirm Password"
                id="confirm_password"
                name="confirm_password"
                type="password"
                class="input"
                required
            />
            <input value="Sign Up" type="submit" class="signup-button" />
        </form>
    </div>
</body>
</html>
