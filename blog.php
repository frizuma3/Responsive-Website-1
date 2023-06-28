<!-- 
 Topic: Multiplatform Dev 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 04 23
  This file is the blog page that offers registered users access to the website. 
 -->
<?php
session_start();
?>
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
      <a link rel="Member" href="regUser.php" class="active">Member</a>
      <a link rel="Home" href="Login.php">Admin</a>
      <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
      <a link rel="About Us" href="aboutUs.php">About Us</a> 
      <a link rel="Log out" href="logout.php">Log out</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
      <i class="fa fa-bars"></i></a>
    </div>
  </header>
  <body>

    <?php
    include("../../DbConnect.php"); 
    ?>
    <div class="row">
      <div class="col-3 menu">
        <div>
          <ul>
            <li>The City</li>
            <li>The Theatre</li>
            <li>An Experience</li>
          </ul>
        </div><br><br> 
      </div>




      <div class="col-6" style="text-align: center;">
        <?php 
          session_start();
          $user_id = $_SESSION['user_id'];
          

          // Retrieve data from the database
          $sql = "SELECT * FROM th_blog ORDER BY blog_id DESC LIMIT 3";
          $result = mysqli_query($conn, $sql);


          // Display data on the blog page
          while ($row = mysqli_fetch_assoc($result)) { 
          $blog_id = $row['blog_id'];
          $_SESSION['blog_id'] = $blog_id;


          // Retrieve comments from the database
          $comment_sql = "SELECT * FROM th_comment WHERE blog_id = $blog_id ORDER BY c_id DESC LIMIT 4";
          $comment_result = mysqli_query($conn, $comment_sql);


          echo '<div style="border: 3px solid black;">';
          echo "<h5>TITLE:</h5><h3>" . $row['title'] . "</h3>";
          echo "<h5>Our Micro Blog Message:</h5><p style='text-align:center;'>" . $row['content'] . "</p>";
          echo "<h6>Author ID:</h6><h6>" . $row['user_id'] . "</h6>";
              
          echo "<h5>Comments:</h5>"; 

          // Display comments on the blog page
          while ($comment_row = mysqli_fetch_assoc($comment_result)) { 
          
            echo "<p>The User " . $comment_row['user_id'] . " says:</p>";
            echo "<p>" . $comment_row['comment'] . "</p>";
          }


          echo '<form method="post" action="insertcomment.php">'; 
          echo '<textarea style="display: block; margin: 0 auto;" name="blogComment" rows="4" cols="78" placeholder="Write comment..." required></textarea><br><br>';
          echo '<input type="hidden" name="blog_id" value="' . $blog_id . '">'; // Include blog_id as a hidden field in the form
          echo '<input type="reset" value="Reset" style="display: block; margin: 0 auto;"/><br>';
          echo '<input type="submit" value="Post" style="display: block; margin: 0 auto;"/>';
          echo '</form><br><br><br>';
          echo '</div><br><br>'; 
          }
        ?><br><br>
      </div><br><br>

  
      <div class="col-3 right">
          <?php
                // Connect to database
                include("../../DbConnect.php"); 

                // Query database table
                $sql = "SELECT * FROM th_comment WHERE user_id =$user_id";
                $result = mysqli_query($conn, $sql);   
          ?>
        <div>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="text-align: center; border: 3px solid black; padding: 25px;">
            <label for="edit"><h4>Edit comment:</h4></label>
            <select name="edit" id="edit" style="width:100%;">
              <option value="" >Select comment</option>
              <?php
                // Display database table data as option select
                while ($editComment = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $editComment['c_id'] . "'>" . $editComment['comment'] ." - ". $editComment['blog_id'] ." - ". $editComment['user_id'] . "</option>";
                }
              ?>
            </select><br><br>
            <textarea style="display: block; margin: 0 auto;" name="commentEdit" rows="4" cols="30" placeholder="Edit comment..." required></textarea><br>
            <input type="submit" name="edit_submit" value="Edit">
          </form>

          <?php
            include("../../DbConnect.php");
            session_start();
            $commentEdit   =$_POST["commentEdit"];

            if (isset($_POST['edit_submit'])) {
              $id = mysqli_real_escape_string($conn, $_POST['edit']);

              // Edit the selected comment
              $sql = "UPDATE th_comment SET comment = '$commentEdit' WHERE c_id = $id";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                  // Display a success message to the user
                  echo "<p>Comment edited successfully.</p>";
              } else {
                  // Display an error message to the user
                  echo "<p>Failed to edit comment. Please try again later.</p>";
              }
            }
            mysqli_close($conn);
          ?>
          
        </div><br><br>


        <?php
          // Connect to database
          include("../../DbConnect.php");

          // Query database table
          $sql = "SELECT * FROM th_comment WHERE user_id = $user_id";
          $result2 = mysqli_query($conn, $sql);
        ?>
        <div>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align: center; border: 2px solid black; padding: 20px;">
            <label for="r_users"><h4>Delete a comment:</h4></label>
            <select name="r_users" id="r_users" style="width:100%;">
              <option value="">Select a comment</option>
              <?php
                // Display database table data as option select
                while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<option value='" . $row2['c_id'] . "'>" . $row2['blog_id'] ." - ". $row2['comment'] ." - ". $row2['user_id'] . "</option>";
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
              $stmt = $conn->prepare("DELETE FROM th_comment WHERE c_id = ?");
              $stmt->bind_param("i", $id2);
              if ($stmt->execute()) {
                echo "<p>Comment removed successfully!</p>";
              } else {
                echo "<p>Error removing comment.</p>";
              }
              } else {
                echo "<p>Please select a comment to remove.</p>";
              }
            }
            mysqli_close($conn);
          ?>
        </div>
      </div>
    </div> 

  </body>
  <?php include("footnote.php"); ?> <!--Footnote Modularity -->
</html> 


