<html>
<head>
	<title>The Local Theatre register user</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<header>
    <h1>The Local Theatre</h1>
    <h2>New User Registration</h2>
</header>
<?php
  include("../../DbConnect.php");              // Add in the database connection details

  // Get the information from  RegUser.php

  $Forename  =$_POST['forename'];
  $Surname   =$_POST['surname'];
  $Phone_number =$_POST['phone_number'];
  $Email		 = $_POST['email'];
  $Password  =$_POST['password'];
 

//$hash password
$hashed_password = password_hash($Password, PASSWORD_DEFAULT);


// prepare and bind
$sql=("INSERT INTO t_users (forename, surname, phone_number, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $Forename, $Surname, $Phone_number, $Email, $hashed_password);
$stmt->execute();

//Redirect to the Login page if the record is entered in the database table.
if ($stmt->affected_rows > 0) {
  header("Location: Login.php");
  exit();
} else {
  echo "Error: please try again! " . $sql . "<br>" . $conn->error;
}
$stmt->close();
?>
</body>
</html>