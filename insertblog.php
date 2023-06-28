<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    include("../../DbConnect.php");              // Add in the database connection details
    
    // Get the information from  admin.php
    $BTitle  =$_POST['blogTitle'];
    $BMessage   =$_POST['blogMessage'];


    // Prepare statement, bind and Insert data into the database
    $sql =("INSERT INTO th_blog (user_id, title, content) VALUES (?,?,?)");
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user_id, $BTitle, $BMessage);
    $stmt->execute();

    // Redirect to the blog page
    if ($stmt->affected_rows > 0) 
    {
    header("Location: blog.php");
    exit();
    } else {
    echo "Error: please try again! " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
?>