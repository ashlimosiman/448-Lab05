<!--
    Author: Ashli Mosiman
    Date Last Updated: Oct 21, 2016
    File Name: CreateUser.php
    Description: takes in a username. If it exists, notifies the user that it exists. if it doesn't then save the username to the database
                    and lets the user know it was created.

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
    $query = "INSERT INTO Users(user_id)
                VALUES('".$username."')";

    if(strlen($username) < 1)//checks if username textbox is empty
    {
        echo "username text box is empty";
    }
    else if($result = $mysqli->query($query))//adds the new username to the database, along with notifying the user
    {
        echo "The new username was successfully added";
    }
    else//reports error is username already exists in the database
    {
        echo "Error: " . $mysqli->error;
    }

    $mysqli->close();

    echo "<br><a href=\"AdminHome.html\">Home</a><br /><br   />";
 ?>
