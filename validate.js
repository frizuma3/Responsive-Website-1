
function validateForm(){
    var inputValid = true;
    var email=document.Login.email.value;
    var password=document.Login.password.value;

    //email is length 0 or no @ symbol
    if(email == "" || password == ""){
        alert("You have to input  email and password to continue."); 
        inputValid = false;
        return inputValid;
    }
    else{
        alert("Input successful, click 'OK' to check in the database.");
        inputValid = true;
        return  inputValid;
    }
}




//    // Wait for the document to load
//    document.addEventListener("DOMContentLoaded", function() {
//     // Find the login link element
//     var loginLink = document.getElementById("login-link");

//     // Add a click event listener to the login link
//     loginLink.addEventListener("click", function(event) {
//       event.preventDefault(); // Prevent the default link behavior
//       // Perform the desired action, such as redirecting to another page or executing JavaScript code
//       // Example: window.location.href = "otherpage.js";
//       // Replace "otherpage.js" with the actual JavaScript page you want to link to
//       window.location.href = "Login.php";
//     });
//   });