<?php 
    require_once 'database.php';
    //this code wii execute if the user clicks connect button 
        if(isset($_POST['CONNECT'])){
    //this code checks the database connection 
            $connection = new mysqli($hostname, $username, $password);
            $select_db = mysqli_select_db($connection, $database);
    //this code will show the error if there is issue in connecting to the database
            if(!$select_db){
                die("<br>Connection error in connecting with database !!!<br> ");
            }
    //if connection will done successfully this code will read data from user 
            mysqli_select_db($connection, $database);
            $userName = $_POST['userName'];
            $passWord = $_POST['userPassword'];
            $query = $connection->query("SELECT * FROM Users");
            if($query === false ){
                die("<br>There is no user registered !!<br>");
            }
            $count = 0;
            $rows = $query->num_rows;
    // userName and passWord will read the data from the user 
            for ($j=0; $j < $rows; ++$j){
                $query->data_seek($j);
                $tempUserName = htmlspecialchars($query->fetch_assoc()['USERNAME']);
                $query->data_seek($j);
                $tempPassword = htmlspecialchars($query->fetch_assoc()['PASSWORD']);
    // it will compare read data from the table and check it with input data in if..else statement
    // first option is for checking username and password both are same
                if ($tempUserName == $userName && $tempPassword == $passWord){
                    
                    echo "<script> location.href='gameform.php'; </script>";
    // Exit the index.php file. 
                    exit;
                    $count = 1;
                }
    // second option is for checking if user name is correct but password is not matched
                elseif ($tempUserName == $userName && $tempPassword != $passWord){
                    $message = "Error: You entered a wrong password.<br>To modify your password, please click on the following link. <a href=\"http://localhost/finalproject/passwordmodificationform.php\">Modify Password</a>";
                    $count = 1;
                }
    // third option is for checking if user name is not valid but password is correct
                elseif ($tempUserName != $userName && $tempPassword == $passWord){
                    $message = 'Error: You entered a wrong username!!';
                    $count = 1;
                }
            }
    //if there is not a match of any condition in if..else statement count varible will change it's value or else I will ask user to register     
            if($count == 0){
                
                $message = 'Error: The username and password you have entered does not exist.<br>Please sign up first, and sign in again.';
            }
            $connection->close();
        }
    ?>
     
