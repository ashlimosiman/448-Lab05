<!--
    Author: Ashli Mosiman
    Date Last Updated: Oct 21, 2016
    File Name: ViewUserPosts.php
    Description: shows a list of current posts made by users

-->

<?php

    $user=$_POST["owner"];

    echo "You chose to see posts by <b>" . $user . "</b>.";

    $mysqli = new mysqli("mysql.eecs.ku.edu", "amosiman", "Password123!", "amosiman");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT content FROM Posts WHERE author_id='$user'";

    echo "<table>";
    if ($result = $mysqli->query($query))
    {
        $array1 = $result->fetch_all();
    }

    foreach($array1 as $entry)
    {
        echo "<tr style=\"border:1px dotted gray\" bgcolor=\"gray\"><td>" . $entry[0] . "</td><td><b></td></tr>";
    }

    echo "</table>";

    mysql_close();

    echo "<br><a href=\"AdminHome.html\">Home</a><br /><br   />";
?>
