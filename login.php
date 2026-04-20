<?php
session_start();
include ('koneksi.php');

if(isset($_SESSION['id'])){
     header("location: index.php");
}
?>
   <!DOCTYPE html>
<html>

<head>
     <title>Login 
     </title>
     <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

     <div class="login-box">
     <img src="avatar.jpg" class="avatar">
          <h1>Login Here</h1>
          <form method="POST" action="ceklgin.php">
               <Input type="email" name="email" placeholder="Enter Email Address">
               <Input type="password" name="password" placeholder="Enter Password">
               <Input type="submit" name="login" value="Login">
               <a href="pendaftaran.php">Belum Punya Akun?</a>
          </form>
     </div>
</body>

</html>