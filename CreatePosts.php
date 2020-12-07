<?php
    
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $username = $_POST['username'];
    $newMsg = $_POST['message'];
    $postid = rand();
    $userExists = FALSE;
    

    $mysqli = new mysqli("mysql.eecs.ku.edu", "liameinspahr", "Jocai7xu",
    "liameinspahr");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $q = "SELECT `author_id` FROM Posts"; //This checks author_ids in "Posts" for usernames
    $result = $mysqli->query($q);
    while ($row = $result->fetch_assoc()) {
        
        $temp = $row['author_id'];

        if($temp == $username) {
            $userExists = TRUE;
        }
    }

    $q = "SELECT `user_id` FROM Users"; //This checks user_ids in "Users" for usernames
    $result = $mysqli->query($q);
    while ($row = $result->fetch_assoc()) {
        
        $temp = $row['user_id'];

        if($temp == $username) {
            $userExists = TRUE;
        }
    }


        //$data = "SELECT author_id FROM Posts"; //This block of code runs through and compares current username to database of existing usernames


    if ($userExists == TRUE) {

        if($newMsg == "") {
            echo "Cannot submit, message is blank. <br>";
        }
        else {
            $query = "INSERT INTO Posts (`post_id`,`content`,`author_id`) VALUES ('$postid', '$newMsg','$username')";
            $mysqli->query($query);
            echo "Post Saved! <br>";
        }
    }
    else {
        echo "Cannot submit, user does not exist. <br>";
    }


    

    /* close connection */
    $mysqli->close();





?>