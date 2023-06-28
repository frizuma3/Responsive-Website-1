<!-- 
 Topic: Multiplatform Dev 
  Student No: 21013159
  Student Name: Maximilian Nwosu
  School: UHI Inverness 
  Date: 31 04 23
  This file is the Registered user page that offers the users access to the website. 
 -->
<?php
  session_start();
    if(isset($_COOKIE["user_email"])) {
      $user_email = $_COOKIE["user_email"];
      echo "Welcome, $user_email!";
      } else {
      echo "Please log in.";
    }
?>
<html>
  <head>
    <title>Theatre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- This is referenced to W3Schools.com -->
  </head>
  <body>
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
        <a link rel="Home" href="Login.php">Admin</a>
        <a link rel="Contact Us" href="ContactUs.php">Contact Us</a>
        <a link rel="About Us" href="aboutUs.php">About Us</a> 
        <a link rel="Log out" href="logout.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">     
        <i class="fa fa-bars"></i></a>
      </div><br><br>

      <?php
        session_start();	
        $user_id = $_SESSION['user_id'];
        $surname = $_SESSION['surname'];
    

        include("../../DbConnect.php"); 


        $sql = "SELECT user_id,surname FROM t_users WHERE user_id='$user_id' AND surname='$surname'";  
        $Result = mysqli_query($conn,$sql);    
        $details = mysqli_fetch_array($Result);
        
        echo '<tr>';
        echo '<td>Member No: '.$details['user_id'].'</td><br>';
        echo '<td>Member: '.$details['surname'].'</td><br>';
      
      ?>
      <div class="header">
          <h1>The Local Theatre</h1>

          <h2>Your one-stop spot for Movie.</h2>

          <h2 id="summary"> Live the experience</h2>
      </div>
    </header>

    <div class="row">
      <div class="col-3 menu">
        <ul>
          <li>The City</li>
          <li>The Island</li>
          <li>The Food</li>
          <li><a link rel="Blog" href="blog.php">Our Blog</a></li>
        </ul>
      </div>

      <div class="col-6">
        <h1>The Movies</h1>
        <p>The Local Theatre is always poised to entertain you with exciting and scintillating movies of the moment.</p>
        <p>We also bring you vintage and historical movies that not only entertains but teaches from wisdom and experiences.</p>


        <h2>Movies in the Theatre</h2><br>
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

            // Display movie trailer based on the title
            $trailer_url = "";
            switch ($row['title']) {
              case "The_Gray_Man":
                $trailer_url = "https://www.youtube.com/watch?v=BmllggGO4pM";
              break;

              case "The_Medieval":
                $trailer_url = " https://www.youtube.com/watch?v=48s-ylWusWQ";
              break;

              case "The_Strays":
                $trailer_url = "https://www.youtube.com/watch?v=o9_UteTT9wA";
              break;

              case "Red_Notice":    
                $trailer_url = "https://www.youtube.com/watch?v=Pj0wz7zu3Ms";
              break;

              case "The_Main_Event":    
                $trailer_url = "https://www.youtube.com/watch?v=sQef2RqxeLk";
              break;

              case "Fall":    
                $trailer_url = "https://www.youtube.com/watch?v=aa5MXOMN1lM";
              break;

              case "King_of_Boys":    
                $trailer_url = "https://www.youtube.com/watch?v=i4OeHI3EJuY";
              break;

              case "Sex/Life 2":    
              $trailer_url = "https://www.youtube.com/watch?v=WnV0JoflZiA";
              break;

              default:
              break;
            }

            echo "<tr>";
            echo '<td>'.$movie_no.'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td>'.$row['year'].'</td>';
            echo '<td>'.$row['no_of_theatre_display'].'</td>';
            echo '<td><img height="100px" width="100px" src="'.$row['imagetable'].'"/></td>';
            echo '<td><a href="'.$trailer_url.'">Watch Trailer</a></td>';
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
  <?php include("footnote.php"); ?>    <!-- Footnote Modularity -->
</html>
