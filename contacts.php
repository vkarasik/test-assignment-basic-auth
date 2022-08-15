<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: signin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="content">
            <h1>Vadim Karasik</h1>
            <a href="https://www.linkedin.com/in/vadkarasik/" target="_blank">LinkedIn</a>
            <a href="https://github.com/vkarasik" target="_blank">GitHub</a>
            <a href="mailto:vadkarasik@gmail.com" target="_blank">vadkarasik@gmail.com</a>
            <p>Back to <a href="/">home</a> page</p>
            <p><strong>OR</strong></p>
            <a href="includes/logout.php" class="btn">Logout</a>
        </div>
    </main>
</body>

</html>