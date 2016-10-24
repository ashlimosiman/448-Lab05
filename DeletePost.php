<!--
    Author: Ashli Mosiman
    Date Last Updated: Oct 21, 2016
    File Name: DeletePost.php
    Description: deletes any selected posts from the database

-->

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "amosiman", "Password123!", "amosiman");
if ($mysqli->connect_error)
{
    die("Connection failed: ".$mysqli->connect_error);
    exit();
}
$poststodelete=$_POST['delete'];
foreach($poststodelete as $post)
{
  $query="DELETE FROM Posts WHERE post_id='{$post}'";
  if ($mysqli->query($query))
  {
    echo "Post '{$post}' was deleted successfully!<br>";
  }
  else
  {
    echo 'Error: ' . $query . '<br>' . $mysqli->error;
  }
}
$mysqli->close();

echo "<br><a href=\"AdminHome.html\">Home</a><br /><br   />";
?>
