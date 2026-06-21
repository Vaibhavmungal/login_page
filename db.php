<?php
$host = "localhost";
$user = "root";   // default user
$pass = "";       // default password (empty)
$db = "login_page";   // ✅ changed from assignment_db to login_page

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
?>
