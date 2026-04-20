<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title> Bumi Indah RT02</title>

    <link rel="stylesheet" typr="text/css" href="tampilanawall.css">
</head>

<body>
    <header>
        <div class="main">
            <ul>
                
                <?php if (isset($_SESSION['status']) == "loggedIn") { ?>
                    
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="pendaftaran.php">Register</a></li>
                <?php } ?>
            </ul>

        </div>

    </header>

</body>

</html>