<!-- 
 Topic: Multiplatform Dev 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 04 23
  This file is the index or landing page of the website. 
 -->
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var loginLink = document.getElementById('login-link');
        loginLink.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default link behavior
          window.location.href = 'Login.php'; // Navigate to the login page
        });
      });
    </script>
  </head>

  <header>
    <div class="topnav">
      <a link rel="About Us" style="float:right" href="aboutUs.php">About Us</a>
      <a link rel="Contact Us" style="float:right" href="ContactUs.php">Contact Us</a>
      <a id="login-link" link rel="Login" href="">Login</a>    <!-- Click - addEventListener -->
      <a link rel="Sign Up" href="SignUp.php">Sign Up</a> 
    </div><br><br>
  </header>
  <body>

    <div class="header">
      <h1>The Local Theatre</h1>
    </div>

    <div class="row">
      <div class="col-3 menu">
        <ul>
          <li>The City</li>
          <li>The Island</li>
          <li>The Food</li>
          <li><a link rel="Login" href="Login.php">Our Blog Post</a></li>
        </ul>
      </div>

      <div class="col-6">
        <h1>The Movies</h1>
        <p>The Local Theatre is always poised to entertain you with exciting and scintillating movies of the moment.</p>
        <p>We also bring you vintage and historical movies that not only entertains but teaches from wisdom and experiences.</p>
      

        <h2>Movies in the Theatre</h2> 
        <br>
        <table class="products" border="1">
        <tr>
        <tr>
        <th>Movie No</th>
        <th>Title</th>
        <th>Release Year</th>
        <th>Display in Theatre</th>
        <th>Image</th>
        </tr>
        </tr>
        <?php	
          // connect to the database...
              include("../../DbConnect.php"); 
              
          // 	 phrase the query you want to ask... e.g.
          $sql = "SELECT * FROM th_movie";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

          while ($row = mysqli_fetch_assoc($result)) {
            $movie_no = $row['movie_no'];

            echo "<tr>";
            echo '<td>'.$movie_no.'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td>'.$row['year'].'</td>';
            echo '<td>'.$row['no_of_theatre_display'].'</td>';
            echo '<td><img height="100px" width="100px" src="'.$row['imagetable'].'"/></td>';
            echo '<td><a href="Login.php">Watch Trailer</a></td>';
            echo '</tr>';
          }   
        ?>
        </table><br><br>
      </div>



      <div class="col-3 right">
        <div class="aside">
          <h2>What?</h2>
          <p>Inverness is a city of the Scotland.</p>
          <h2>Where?</h2>
          <p>Scotland is a country in the United Kingdom.</p>
          <h2>How?</h2>
          <p>You can reach Inverness airport from all over Europe.</p>
        </div>
      </div>
    </div>

  </body>
  <?php include("footnote.php"); ?> <!--Footnote Modularity -->
</html>


