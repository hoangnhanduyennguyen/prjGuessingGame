<?php
    function PassModificationFormAction() {
        // The action file

        // If click on the Modify Button 
        if (isset($_POST['modify'])) {
            
            // Attributes 
            $exist_username = htmlentities($_POST['exist_username']);
            $new_pass = htmlentities($_POST['new_password']);
            $confirm_pass = htmlentities($_POST['confirm_password']);

            // DB connection
            require_once 'Database.php';
            $connection = new mysqli($hostname, $username, $password, $database);
            // Exception
            if ($connection->connect_error) {
                die("<br>Fatal Error - Unable to connect to MySQL Database ... <br>". mysqli_connect_error());
            }

            // 1- Check username and Password
            // SQL query
            $sql_search_query = "SELECT * FROM users WHERE USERNAME='$exist_username'";
            $search_query = $connection->query($sql_search_query);
            // Exception
            if ($search_query === FALSE) {
                die("Fatal Error - SQL Query cannot be performed in the table users ... ". $connection->error);
            }

            $num_of_rows = $search_query->num_rows;

            // 2- Update the password to the database when those two statement are true
            if ($num_of_rows > 0 && $new_pass == $confirm_pass) {
                $sql_update_query = "UPDATE users SET PASSWORD='$new_pass' WHERE USERNAME='$exist_username'";
                $update_query = $connection->query($sql_update_query);
                // Exception
                if ($update_query === FALSE) {
                    die("Fatal Error - SQL Query cannot be performed in the table users ... ". $connection->error);
                } 
                // Show success message 
                else {
                    $message = "New password has been updated successfully!";
                    ?>
                    <span class="mess"><?php echo $message; echo "<br>"?></span>
                    <?php
                }
            } 
            // If username not found
            else if ($num_of_rows <= 0) {
                $message = "The username you entered > ". $exist_username ." < does not exist ... Please check it again !";
                ?>
                <span class="mess"><?php echo $message; echo "<br>"?></span>
                <?php
            } 
            // Check entered password
            else if ($new_pass != $confirm_pass) {
                $message = "You entered 2 different passwords. Please check it again !";
                ?>
                <span class="mess"><?php echo $message; echo "<br>"?></span>
                <?php
            }
            // Close SQL Database connection
            $search_query->close();
            $connection->close();
        }
    }
?>