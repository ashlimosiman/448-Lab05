<!--
    Author: Ashli Mosiman
    Date Last Updated: Oct 21, 2016
    File Name: ViewUsers.php
    Description: shows a list of current users

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

    $users = $mysqli->query("SELECT user_id FROM Users");

    echo '<table border = "1" style = "width = 100%">';
    echo '<th>Users</th>';
    while($row = mysqli_fetch_array($users))
    {
        $person = $row['user_id'];
        echo '<tr><td>'.$person.'</td></tr>';
    }
    echo '</table>';
    $mysqli->close();

    echo "<br><a href=\"AdminHome.html\">Home</a><br /><br   />";
?>
