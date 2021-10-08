<?php
    // Require the database.php file
    require_once 'database.php'; 

    // Create a new object of the built-in class mysqli
    // Attempt to connect to MySQL using mysqli.php and the information include in the database.php file.
    $connection = new mysqli($hostname, $username, $password);
        
    // If connection to the MySQL fails display an error message
    if ($connection->connect_error) {
        die("Fatal Error - Not possible to connect to MySQL. Please check your connection ... <br>" . mysqli_connect_error());
    }
    // Else if connection to MySQL works continue the program, and try to connect to the Database
    else{
        $check_connect_to_db = mysqli_select_db($connection, 'accounts');
        // If connection to the Database fails, then we create the database
        if ($check_connect_to_db === FALSE){
            $sql_create_db = "CREATE DATABASE accounts";    
            $create_db = $connection->query($sql_create_db);
            // If the Database creation fails display an error message  
            if ($create_db === FALSE) {
                die("Fatal Error - Database cannot be created ... " . $connection->error);    
            }
            // If the Database creation works, then we now connect to the databse "accounts".
            else{ 
                $check_connect_to_db = mysqli_select_db($connection, 'accounts');
                // If connection to the database created fails display an error message
                if ($check_connect_to_db === FALSE)
                    die("Fatal Error - Attempt to connect to the created database, but not possible to connect to it ... " . $connection->error);
            }
        }
    }
            
    // If connection to the database created works create the table users and all the columns
    // First, describe the table, to see if it has any columns or not
    $sql_desc_table = "DESC users";
    $check_table_exists = $connection->query($sql_desc_table);

    // There is no columns exsit in the created database
    if ($check_table_exists === FALSE){
        $sql_create_table = "CREATE TABLE users
            (   ID INT(5) PRIMARY KEY AUTO_INCREMENT,
                USERNAME VARCHAR(50) NOT NULL,
                PASSWORD VARCHAR(50) NOT NULL
            ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        $create_table = $connection->query($sql_create_table);
                
        //If table creation fails display an error message
        if ($create_table === FALSE)
            die("Fatal Error - Table users cannot be created" . $connection->error); 
    }

    // Direct the user to the loginform.php to either login or sign up
    echo "<script> location.href='loginform.php'; </script>";
    // Exit the index.php file. 
    exit;
?>