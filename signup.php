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
        <form class="form" id="signup">
            <h2>Sign Up</h2>
            <div>Already have an account? <a href="signin.php">Sign in</a></div>
            <div class="form__item form__item_login">
                <input type="text" autocomplete="username" name="login" placeholder="Login" required>
                <span class="form__err"></span>
            </div>
            <div class="form__item form__item_pass">
                <input type="password" autocomplete="new-password" name="pass" placeholder="Password" required>
                <input type="password" autocomplete="new-password" name="passrepeat" placeholder="Repeat password" required>
                <span class="form__err"></span>
            </div>
            <div class="form__item form__item_email">
                <input type="email" name="email" placeholder="Email" required>
                <span class="form__err"></span>
            </div>
            <div class="form__item form__item_name">
                <input type="text" name="name" placeholder="Name" required>
                <span class="form__err"></span>
            </div>
            <span class="form__success"></span>
            <button class="btn btn_form">Create an account</button>
        </form>
    </main>
    <script src="js/script.js"></script>
</body>

</html>