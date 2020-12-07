<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "liameinspahr", "Jocai7xu",
"liameinspahr");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Users"; //You don't need a ; like you do in SQL
$result = $mysqli->query($query);
echo "<table border=1>"; // start a table tag in the HTML

while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . 'USERNAME: '. "</td><td>" . $row['user_id'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

$mysqli->close(); //Make sure to close out the database connection

?>