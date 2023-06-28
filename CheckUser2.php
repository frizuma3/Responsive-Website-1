<?php
include("../../DbConnect.php");  // Add in the database connection details

// Create a server-based form handler function
function handleForm() {
    include("../../DbConnect.php");
    session_start();
    
    // Now get the information from the Form
    $Email	  = $_POST['email'];
    $Password = $_POST['password'];
    
    
    $stmt = $conn->stmt_init();
    if($stmt->prepare("SELECT user_id,surname,email,password,admin,suspended FROM t_users
    WHERE  email= ?"))
     {
      $stmt->bind_param('s',$Email);
      $stmt->execute();
      $stmt->bind_result($user_id,$surname,$email,$password,$admin,$suspended);
    
          if($stmt->fetch())
          {
            session_start();
            $_SESSION["valid"] = 'True';
            $_SESSION["user_id"] = $user_id;
            $_SESSION["surname"] = $surname;
            $_SESSION["email"] = $email;
            $_SESSION["admin"] = $admin;
            $_SESSION["suspended"] = $suspended;
    
            // Set the cookie
          setcookie("user_email", $email, time() + (86400 * 30), "/"); // Cookie will expire after 30 days
    
          // Check if the cookie is set
          if(isset($_COOKIE["user_email"])) {
            echo "Cookie is set!";
            } else {
            echo "Cookie is not set!";
          }
    
            echo "<script type='text/javascript'>
            alert('Your  $email !  password is $Password');
            <?php include('regUser.php'); ?>
            <?php include('admin.php'); ?>
            <?php include('SignUp.php'); ?>
            </script>";
    
              if(password_verify($Password, $password))
                  {		
                
                if ($_SESSION["suspended"]=='Y'){
                  echo 'Account Verified '.$Email;
                          echo "<script type='text/javascript'>
                            alert('This account is suspended');
                                window.location.href='SignUp.php';
                                </script>";
                }
                elseif($_SESSION["admin"]=='N'){
                  echo 'Password Verified '.$Email;
                  echo "<script type='text/javascript'>
                  alert('The password is correct');
                    window.location.href='regUser.php';
                    </script>";
                    // header("Location: regUser.php");
                  } 
                elseif($_SESSION["admin"]=='Y'){
                  echo 'Password Verified '.$Email;
                          echo "<script type='text/javascript'>
                            alert('The password is correct');
                                window.location.href='admin.php';
                                </script>";
                }
                        }
              else {
                    echo "<script type='text/javascript'>
                    alert('Unsuccessful Login. Try again!');
                    window.location.href='Login.php';
                    </script>";
                    // header("Location: Login.php");
                    }
          }else
                
             {
                echo 'Unrecognised login details';
                header("Location: Login.php");
             }
      }else{
        echo 'Prepared statement is broken';
      }

      $stmt->close();
    } 
?>