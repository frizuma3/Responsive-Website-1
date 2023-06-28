<html>
<head>
<title>The Local Theatre</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<script>
   function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
 }  

 function myTouchFunction() {
  myFunction(); // Call the existing myFunction() for the responsive navigation behavior
}

function myKeyEvent(event) {
  if (event.keyCode === 1) {
    myFunction(); // Call the existing myFunction() for the responsive navigation behavior
  }
}
</script>
<div class="topnav" id="myTopnav">
    <a link rel="Home" href="index.php" class="active">Home</a>
    <a link rel="SignUP" href="SignUp.php">Sign Up</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a> 
    <a href="javascript:void(0);" class="icon" onclick="myFunction()" ontouchstart="myTouchFunction()">
<i class="fa fa-bars"></i></a>
</div>   

<body onkeydown="myKeyEvent(event)">

<div class="header">
        <h1>The Local Theatre</h1>

        <h2>Your one-stop spot for Movie.</h2>

        <h2 id="summary"> Live the experience</h2>
</div>


<script src="validate.js"></script>
<h3>Please enter your Email and password</h3>

<form name="Login" onsubmit="return validateForm();" action="CheckUser1.php" method="post">
        <table class="login"> 
        <tr>
        <td>Email address :</td>
        <td><input type="text" name="email"  size="30"/></td>
        </tr>
        <tr>
        <td>Password:</td>
        <td><input type="password" name="password"  size="30"/></td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" value="Login"/><br><br><input type="reset" value="Reset"/></td>
        </tr>
        
        
                <?php
                        session_start();
                        if(isset($_SESSION["error"]))
                        {
                                echo '<div class="error" id="error">' . $_SESSION['error'] . '</div>';
                                unset($_SESSION['error']);
                        }
                ?>  
        
        </table>
</form>




        <h3>New User? Sign up!</h3>
        <FORM METHOD="LINK" ACTION="SignUp.php">
        <table class="login">
        <td><INPUT class="adduser" id="login" TYPE="submit" VALUE="Sign Up"></td>
        </table>
        </FORM>

</body>
<?php include("footnote.php"); ?> <!--Footnote Modularity -->
</html>