
<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    // $blog_id =$_SESSION['blog_id']; 
    include("../../DbConnect.php");              // Add in the database connection details
    
    // Get the comment text from  blog.php
    $comment   =$_POST['blogComment'];
    $blog_id   =$_POST['blog_id'];

    // Store the comment text in a session variable
    $_SESSION['comment'] = $comment;


    // Prepare statement, bind and Insert data into the database
    $sql =("INSERT INTO th_comment (comment, blog_id, user_id) VALUES (?,?,?)");
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$comment, $blog_id, $user_id);
    $stmt->execute();

    // Redirect to the blog page
    if ($stmt->affected_rows > 0) {
    
    header("Location: blog.php");
    exit();
    } else {
    echo "Error: please try again! " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();


?>