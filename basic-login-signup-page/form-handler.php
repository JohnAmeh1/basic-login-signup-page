<html>
<body>

<?php

if ($_GET["password"] !== $_GET["confirm-password"]) {
  echo "Password and Confirm Password do not match"
  ?>
  <a href="/HTML-login-assignment">Return to Create Account page</a>
  <?php
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "html-login-db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

/// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Users (username, email, passwd)
VALUES ('".$_GET["username"]."', '".$_GET["email"]."', '".$_GET["password"]."')";

if ($conn->query($sql) === TRUE) {
  echo "New User created successfully";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
<br>
<a href="/HTML-login-assignment">Return to Home Page</a>

</body>
</html>