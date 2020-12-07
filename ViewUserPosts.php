<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$selectedUser = $_POST['mytable'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "liameinspahr", "Jocai7xu",
"liameinspahr");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT `author_id`,`content`,`post_id` FROM Posts";
$result = $mysqli->query($query);
echo "<table border=1>"; // start a table tag in the HTML

while($row = $result->fetch_assoc()){
    $temp = $row['author_id'];
    if($temp == $selectedUser) {
        echo "<tr><td>" . $row['author_id']. "</td><td>" . $row['content'] . "</td></tr>";
    }  
}

echo "</table>"; //Close the table in HTML

$mysqli->close(); //Make sure to close out the database connection








?> 