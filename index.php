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
    <title>Main Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="content">
            <h1>Hello <?php echo $_SESSION['name']; ?> 👋</h1>
            <p>There is one guy who wants to work for you! Checkout his <a href="contacts.php">contacts</a></p>
            <p><strong>OR</strong></p>
            <a href="includes/logout.php" class="btn">Logout and lose your chance</a>
        </div>
    </main>
</body>

</html>