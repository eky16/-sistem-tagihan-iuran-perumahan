<?php
$host = 'localhost';
$username = 'root';
$password ='';
$data = 'lellang';
$koneksi = new mysqli("$host", "$username", "$password", "$data");
if(mysqli_connect_error()){
    echo "Error :( </br>". mysqli_connect_error();
}
error_reporting(E_ALL & E_NOTICE);

?>
