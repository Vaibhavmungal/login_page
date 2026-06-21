<?php include 'db.php'; ?>
<?php
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
    if(mysqli_query($conn, $sql)){
        echo "✅ Registration Successful! <a href='login.php'>Login Here</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Register</button>
</form>
