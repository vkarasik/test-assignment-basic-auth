<?php
session_start();
if (isset($_SESSION['login'])) header('Location: /');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Auth Test Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <form class="form" id="login">
            <h2>Sign In</h2>
            <div>Don't have an account? <a href="signup.php">Sign up</a></div>
            <div class="form__item form__item_login">
                <input type="text" autocomplete="username" name="login" placeholder="Login" required>
                <span class="form__err"></span>
            </div>
            <div class="form__item form__item_pass">
                <input type="password" autocomplete="current-password" name="pass" placeholder="Password" required>
                <span class="form__err"></span>
            </div>
            <button class="btn btn_form">Login</button>
        </form>
    </main>
    <script src="js/script.js"></script>
</body>

</html>