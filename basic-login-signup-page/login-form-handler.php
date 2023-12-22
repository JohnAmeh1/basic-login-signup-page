<html>
<body>

<?php
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

$sql = "SELECT * FROM Users WHERE username='".$_GET["username"]."' OR email='".$_GET["username"]."' AND passwd='".$_GET["password"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo "You are logged in!";
  }
} else {
  echo "You have no account!";
}
$conn->close();
?>
<br>
<a href="/HTML-login-assignment">Return to Home Page</a>

</body>
</html>