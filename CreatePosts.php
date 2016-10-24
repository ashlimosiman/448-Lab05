<!--
    Author: Ashli Mosiman
    Date Last Updated: Oct 21, 2016
    File Name: CreatePosts.php
    Description: takes in the post and the username. Checks if the username exists. If it does, it posts the content and saves to the database.
                    If not, then it throws an error message.

-->

<?php
    /*Reports errors*/
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "amosiman", "Password123!", "amosiman" );


    /* check connection */
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $username = $_POST["username"];
    $content = $_POST["content"];
    $userQuery = "SELECT * FROM Users WHERE user_id = '$username'";

    $result= $mysqli->query($userQuery);


    if (!$result) {
    echo "Could not successfully run query";
    exit;
    }

    /*if($result > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo $row['user_id'];
        }
    }*/

    if($result->num_rows > 0)
    {

        if($mysqli->query("INSERT INTO `Posts` (`content`, `author_id`) VALUES ('$content', '$username')"))
            echo "You have successfully posted a message";
    }
    else
    {
        echo "This is not correct.";
    }

    $result->free();
    /* close connection */
    $mysqli->close();


    echo "<br><a href=\"AdminHome.html\">Home</a><br /><br   />";
 ?>
