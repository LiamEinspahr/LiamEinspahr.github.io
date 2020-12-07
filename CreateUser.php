<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $username = $_POST['username'];
    $userExists = FALSE;

    $mysqli = new mysqli("mysql.eecs.ku.edu", "liameinspahr", "Jocai7xu",
    "liameinspahr");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $q = "SELECT `user_id` FROM Users"; //WHERE email ='" . $email . "'";
    $result = $mysqli->query($q);
    while ($row = $result->fetch_assoc()) {
        
        $temp = $row['user_id'];

        if($temp == $username) {
            $userExists = TRUE;
        }
    }


    if($username != "") {

        if($userExists == TRUE) {
            echo "Error, cannot register user, already exists." . "<br>";
        }
        else {
            $query = "INSERT INTO Users (`user_id`) VALUES ('$username')";
            $mysqli->query($query);
            echo "User saved! <br>";
        }

    }
    else {
        echo "Error, cannot register user, field is blank." . "<br>";
    }



    $mysqli->close();





?>