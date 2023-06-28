<!--
  Topic: Multiplatform Dev 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 04 23
  This file is the Sign Up page that offers the user form to enter registration details.
-->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
      
<script>
// function Compute() {
//     document.getElementById("Password").value = Math.floor(Math.random() * 10000) + 1; 
// } 

function Compute() {
    var surnameInput = document.getElementById("surname");
    var surnameValue = surnameInput.value;
    var randomNumber = Math.floor(Math.random() * 10000) + 1;
    var password = surnameValue + randomNumber;
    document.getElementById("Password").value = password;
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function handleChange(event) {
    var inputElement = event.target;
    console.log("Input value changed:", inputElement.value);
    // Additional logic or actions to perform when the input value changes
}
</script>
<div class="topnav" id="myTopnav">
    <a link rel="Home" href="index.php" class="active">Home</a>
    <a link rel="Login" href="Login.php">Login</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a> 
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
</div> 
<br><br>
<body>
<div class="row">
    <div class="column">
        <h2>New User Registration</h2><br><br>
        <br>
        <div class= "Register"><br><br>
            <form method="post" action="WriteUser.php"><br><br> <!-- The function to take the form element to another page for entering the details to the Database table -->
                <div><label>First Name</label>
                    <div><input class="form-control" type="text" name="forename" placeholder="Enter your First Name" required onchange="handleChange(event)"> </div> <!-- This function retrieves the target element from the event object and logs the changed input value to the console -->
                </div>
                 <br>
                <div><label>Surname</label>
                    <div><input class="form-control" type="text" name="surname" id="surname" placeholder="Enter your surname" required onchange="handleChange(event)"> </div>
                </div>
                <br>                
                <div><label>Phone Number</label>
                    <div><input class="form-control" type="text" name="phone_number" placeholder="Enter your Phone Number" required onchange="handleChange(event)"> </div>
                </div>
               <br>
                <div><label>Email</label>
                    <div><input class="form-control" type="email" name="email" placeholder="Enter your email" required onchange="handleChange(event)"> </div>
                </div>
               <br>
               <div><label>Password</label>
                <div><input class="form-control" id="Password" type="text" name="password" placeholder="Enter your password" required onchange="handleChange(event)"> </div>
                </div><br>
                <div>
                <div colspan="4" align=center><input type=button id="Generate Password" value="Generate Password" onClick="Compute()"/><div>
                </div>
                <br><br>              
               <input type="reset"  value="Clear"/>
               <br><br>
                <input type="submit" class="btn btn-primary" id="Register" name="Register" value="Register"/>
                <br>

            </form><br>
        </div><br>
    </div><br>
</div>

</body><br><br>
<?php include("footnote.php"); ?>  <!--Footnote Modularity -->
</html>






















<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
      
<script>
function Compute() {
    document.getElementById("Password").value = Math.floor(Math.random() * 10000) + 1; 
   } 

   function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
 }  
</script>
<div class="topnav" id="myTopnav">
    <a link rel="Home" href="index.php" class="active">Home</a>
    <a link rel="Login" href="Login.php">Login</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a> 
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
</div> 
<br><br>
<body>
<div class="row">
    <div class="column">
        <h2>New User Registration</h2><br><br>
        <br>
        <div class= "Register"><br><br>
            <form method="post" action="WriteUser.php"><br><br>      The function to take the form element to another page for entering the details to the Database table 
                <div><label>First Name</label>
                    <div><input class="form-control" type="text" name="forename" placeholder="Enter your First Name" required> </div>
                </div>
                 <br>
                <div><label>Surname</label>
                    <div><input class="form-control" type="text" name="surname" placeholder="Enter your surname" required> </div>
                </div>
                <br>                
                <div><label>Phone Number</label>
                    <div><input class="form-control" type="text" name="phone_number" placeholder="Enter your Phone Number" required> </div>
                </div>
               <br>
                <div><label>Email</label>
                    <div><input class="form-control" type="email" name="email" placeholder="Enter your email" required> </div>
                </div>
               <br>
               <div><label>Password</label>
                <div><input class="form-control" id="Password" type="text" name="password" placeholder="Enter your password" required> </div>
                </div><br>
                <div>
                <div colspan="4" align=center><input type=button id="Generate Password" value="Generate Password" onClick="Compute()"/><div>
                </div>
                <br><br>              
               <input type="reset"  value="Clear"/>
               <br><br>
                <input type="submit" class="btn btn-primary" id="Register" name="Register" value="Register"/>
                <br>

            </form><br>
        </div><br>
    </div><br>
</div>

</body><br><br>
<?php include("footnote.php"); ?>  
</html>     -->