<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "liameinspahr", "Jocai7xu",
"liameinspahr");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
    
        echo "DELETED" . "<br>"; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.

                        $q= "DELETE FROM `Posts` WHERE `content` = '$check' LIMIT 1";
                        $mysqli->query($q);

        
    }
    $mysqli->close();
}
?>