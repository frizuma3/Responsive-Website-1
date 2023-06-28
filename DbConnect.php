<?php
// This is the version you would use ordinarily...

// Sets up the connection parameters to a mysql database

// To use you edit the parameters into the '' below

// If connection fails it's usually one of the parameters has been mistyped
// or the server's down...


// DEFINE ('DB_USER', 'IN21013159');                           // The username
// //DEFINE ('DB_USER', 'root');                           // The username
// DEFINE ('DB_PASSWORD','IN21013159');                        // The password
// //DEFINE ('DB_PASSWORD','');                        // The password
// DEFINE ('DB_HOST', 'localhost');                        // The mysql server host address 
// DEFINE ('DB_NAME', 'IN21013159');                           // The database name
// @$DB = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
// if (mysqli_connect_errno())
//   {
//   echo 'Cannot connect to the database: ' . mysqli_connect_error();
//   }
//   //error suppression
//   error_reporting(0);


  $servername = "localhost";
  $username = "IN21013159";
  $password = "IN21013159";
  $dbname = "IN21013159";

  //create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);
 
  //check the connection
  if($conn->connect_error){ 
    die("Connection failed: ".$conn->connect_error);
  }

// ?>

<?php
// $servername = "localhost";
// $username = "IN21013159";
// $password = "IN21013159";
// $dbname = "IN21013159";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);  //create a connection
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   //echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
?>