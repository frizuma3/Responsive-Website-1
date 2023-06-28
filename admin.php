<?php
session_start();
?>
<!-- 
 Topic: Multiplatform Dev 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 04 23
  This file is the Admin page that offers special priviledges to a user. 
 -->
<html>
<head>
<title>Theatre</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<header>
  <script>
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
    <a link rel="Blog" href="blog.php" class="active">Blog</a>
    <a link rel="Home" href="regUser.php">Member</a>
    <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
    <a link rel="About Us" href="aboutUs.php">About Us</a> 
    <a link rel="Log out" href="logout.php">Log out</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
    <i class="fa fa-bars"></i></a>
  </div>
  <br><br>

  <?php
    session_start();	
    $user_id = $_SESSION['user_id'];
    $surname = $_SESSION['surname'];
 

    include("../../DbConnect.php"); 


    $sql = "SELECT user_id,surname FROM t_users WHERE user_id='$user_id' AND surname='$surname'";  
	  $Result = mysqli_query($conn,$sql);    
    $details = mysqli_fetch_array($Result);
    //while ($details = mysqli_fetch_array($Result))
    echo '<tr>';
    echo '<td>Admin No: '.$details['user_id'].'</td><br>';
    echo '<td>Admin: '.$details['surname'].'</td><br>';
    $user_id = $details['user_id'];
  ?>
</header>
<body>
  <div class="header">
    <h1>The Local Theatre</h1>

    <h2>Your one-stop spot for Movie.</h2>

    <h2 id="summary"> Live the experience</h2>
  </div>

  <div class="row">
    <div class="col-3 menu">
      <div>
        <ul>
          <li>The City</li>
          <li>The Island</li>
          <li>The Food</li>
          <li><a link rel="Blog" href="blog.php">Our Blog</a></li>
        </ul>
      </div><br><br>
      <div>
        <?php
          // Connect to database
          include("../../DbConnect.php"); 

          // Query database table
          $sql = "SELECT * FROM t_users";
          $result = mysqli_query($conn, $sql);   
        ?>

        <style>
          form {
            text-align: center;
            border: 8px solid black;
            padding: 30px;
          }
        </style>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <label for="p_users"><h4>Promote to an Admin:</h4></label>
          <select name="p_users" id="p_users" style="width:100%;">
            <option value="">Choose a person</option>
            <?php
              // Display database table data as option select
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['user_id'] . "'>" . $row['user_id'] ." - ". $row['forename'] ." - ". $row['surname'] . "</option>";
              }
            ?>
          </select><br><br>
          <input type="submit" name="submit" value="Promote">
        </form>
 
        <?php
          if (isset($_POST['submit'])) {
            $id = $_POST['p_users'];

            // Promote the selected user
            $sql = "UPDATE t_users SET admin = 'Y' WHERE user_id = $id";
            $result = mysqli_query($conn, $sql);

            // Display message
            echo "<p>User promoted successfully!</p>";
          }

          mysqli_close($conn);
        ?><br><br>
      </div><br><br>



      <?php
        // Connect to database
        include("../../DbConnect.php");

        // Query database table
        $sql = "SELECT * FROM th_blog";
        $result3 = mysqli_query($conn, $sql);
      ?>

      <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center; border:3px solid black; ; padding:20px">
          <label for="d_blog"><h4>Delete a Blog:</h4></label>
          <select name="d_blog" id="d_blog" style="width:100%;">
            <option value="">Choose the blog</option>
            <?php
              // Display database table data as option select
              while ($row3 = mysqli_fetch_assoc($result3)) {
                echo "<option value='" . $row3['blog_id'] . "'>" . $row3['blog_id'] ." - ". $row3['title'] . "</option>";
              }
            ?>
          </select><br><br>
          <input type="submit" name="delete_submit" value="Delete">
        </form>

        <?php
          if (isset($_POST['delete_submit'])) {
            $id3 = $_POST['d_blog'];
            if (!empty($id3)) {
              // Delete the user using prepared statement
              $stmt = $conn->prepare("DELETE FROM th_blog WHERE blog_id = ?");
              $stmt->bind_param("i", $id3);
              if ($stmt->execute()) {
                echo "<p>Blog successfully deleted!</p>";
              } else {
                echo "<p>Error deleting blog.</p>";
              }
            } else {
              echo "<p>Please select a blog to delete.</p>";
            }
          }

          mysqli_close($conn);
        ?>
      </div><br><br>



      <?php
        // Connect to database
        include("../../DbConnect.php");

        // Query database table
        $sql = "SELECT * FROM th_comment";
        $result4 = mysqli_query($conn, $sql);
      ?>

      <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center; border:3px solid black; ; padding:20px">
          <label for="d_comment"><h4>Delete a comment:</h4></label>
          <select name="d_comment" id="d_comment" style="width:100%;">
            <option value="">Choose a comment</option>
            <?php
              // Display database table data as option select
              while ($row4 = mysqli_fetch_assoc($result4)) {
                echo "<option value='" . $row4['c_id'] . "'>" . $row4['blog_id'] ." - ". $row4['comment'] . "</option>";
              }
            ?>
          </select><br><br>
          <input type="submit" name="delete_comment" value="Delete">
        </form>

        <?php
          if (isset($_POST['delete_comment'])) {
            $id4 = $_POST['d_comment'];
            if (!empty($id4)) {
              // Delete the user using prepared statement
              $stmt = $conn->prepare("DELETE FROM th_comment WHERE c_id = ?");
              $stmt->bind_param("i", $id4);
              if ($stmt->execute()) {
                echo "<p>Comment successfully deleted!</p>";
              } else {
                echo "<p>Error deleting comment.</p>";
              }
            } else {
              echo "<p>Please select a comment to delete.</p>";
            }
          }

          mysqli_close($conn);
        ?>
      </div>
    </div>





    <div class="col-6">
        <h1>The Movies</h1>
        <p>The Local Theatre is always poised to entertain you with exciting and scintillating movies of the moment.</p>
        <p>We also bring you vintage and historical movies that not only entertains but teaches from wisdom and experiences.</p>
      

      <h3>Publish A Blog</h3> 
        <form method="post" action="insertblog.php">
          <label for="title">Title:</label>
          <input type="text" name="blogTitle" size="76" placeholder="Title of the blog" required/><br><br>   
          <label for="content">Content:</label>
          <textarea name="blogMessage" rows="20" cols="72" placeholder=" Write blog here ..." required></textarea>
          <br><br>
          <input type="reset"  value="Reset" style="float: left;"/>
          <input type="submit" value="Publish" style="float: right;"/>
        </form>
    </div>


    <div class="col-3 right">
      <div class="aside">
          <h2>What?</h2>
          <p>Inverness is a city of the Scotland.</p>
          <h2>Where?</h2>
          <p>Scotland is a country in the United Kingdom.</p>
          <h2>How?</h2>
          <p>You can reach Inverness airport from all over Europe.</p>
      </div><br><br>



      <?php
        // Connect to database
        include("../../DbConnect.php"); 

        // Query database table
        $sql = "SELECT * FROM t_users";
        $result = mysqli_query($conn, $sql);   
      ?>

      <style>
        form {
          text-align: center;
          border: 8px solid black;
          padding: 30px;
        }
      </style>

      <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="s_users"><h4>Suspend a user:</h4></label>
            <select name="s_users" id="s_users" style="width:100%;">
                <option value="">Choose a person</option>
                <?php
                    // Display database table data as option select
                    while ($suspendedUser = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $suspendedUser['user_id'] . "'>" . $suspendedUser['user_id'] ." - ". $suspendedUser['forename'] ." - ". $suspendedUser['surname'] . "</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" name="suspend_submit" value="Suspend">
        </form>

        <?php
          if (isset($_POST['suspend_submit'])) {
              $id = mysqli_real_escape_string($conn, $_POST['s_users']);

              // Suspend the selected user
              $sql = "UPDATE t_users SET suspended = 'Y' WHERE user_id = $id";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                  // Display a success message to the user
                  echo "<p>User suspended successfully.</p>";
              } else {
                  // Display an error message to the user
                  echo "<p>Failed to suspend user. Please try again later.</p>";
              }
            }

            mysqli_close($conn);
        ?>
      </div>




      <?php
        // Connect to database
        include("../../DbConnect.php");

        // Query database table
        $sql = "SELECT * FROM t_users";
        $result2 = mysqli_query($conn, $sql);
      ?>

      <style>
        form {
          text-align: center;
          border: 8px solid black;
          padding: 30px;
        }
      </style>
      <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <label for="r_users"><h4>Remove a user:</h4></label>
          <select name="r_users" id="r_users" style="width:100%;">
            <option value="">Choose a person</option>
            <?php
              // Display database table data as option select
              while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<option value='" . $row2['user_id'] . "'>" . $row2['user_id'] ." - ". $row2['forename'] ." - ". $row2['surname'] . "</option>";
              }
            ?>
          </select><br><br>
          <input type="submit" name="remove_submit" value="Remove">
        </form>

        <?php
          if (isset($_POST['remove_submit'])) {
            $id2 = $_POST['r_users'];
            if (!empty($id2)) {
              // Delete the user using prepared statement
              $stmt = $conn->prepare("DELETE FROM t_users WHERE user_id = ?");
              $stmt->bind_param("i", $id2);
              if ($stmt->execute()) {
                echo "<p>User removed successfully!</p>";
              } else {
                echo "<p>Error removing user.</p>";
              }
            } else {
              echo "<p>Please select a user to remove.</p>";
            }
          }

          mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>

</body>
 <?php include("footnote.php");?>   <!--Footnote Modularity -->
</html>
