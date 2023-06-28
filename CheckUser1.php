<!DOCTYPE html>
<!-- author, date, project description-->
<html>
<head>
	<title>The Local Theatre successful login</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<header>
    <h1>The Local Theatre</h1>
</header>


<?php
include("../../DbConnect.php");
require("CheckUser2.php");
// Call the form handler function
handleForm();

?>
</body>
</html>
