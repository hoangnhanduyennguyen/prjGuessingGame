<?php
    require_once 'database.php';

    if(isset($_POST['create'])){
        $name = $_POST['username'];
        $pw = $_POST['password'];
        $confirmPW = $_POST['confirmPW'];
        //connect DB     
        $conn = new mysqli($hostname, $username, $password, $database);
        if ($conn->connect_error)die("Fatal Error");

        //check if the username alreay exists
        $query = "SELECT * FROM `users` WHERE `USERNAME` = '$name'";
        $result = $conn->query($query);
        
        if($result !== false && $result->num_rows !== 0){
            $message = "The username \"$name\" already exists.<br>Please try again!";
        }else{
          //Compare if two passwords are the same
            if(strcmp($pw, $confirmPW) === 0){
                
                $query = "INSERT INTO `users` (`USERNAME`, `PASSWORD`) VALUES ('$name', '$pw')";
                $result = $conn->query($query);
                if(!$result){
                    die("Fatal error");
                }else{
                    //If registration is successful, display the login form
                    $message = "The user \"$name\" has been created successfully!";
                    header("refresh:2;url=loginform.php");
                }

            }else{
                $message = "You entered 2 different passwords.<br>Please try again!";

            }
        }
        $conn->close();    
    }
   
?>