<!DOCTYPE html>
<html>
<head>
	<title>Talent Search</title>
</head>
<body>

	<?php
$servername = "localhost";
$username = "root";
$password = "alham";
$dbname = "talents";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO talents (regdno, name, class)
  VALUES (:regdno, :name, :class)");
  $stmt->bindParam(':regdno', $regdno);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':class', $class);

  // insert a row
  $regdno = $_POST["regdno"];
  $name = $_POST["name"];
  $class = $_POST["class"];
  $stmt->execute();

  
  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>


</body>
</html>
