<!DOCTYPE html>
<html>
    <head>
        <title>Password Modification Form</title>
        <!---- Bootstrap library and other library ---->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!---- CSS Styles ---->
        <style>
            /* Structure of the form */
            body {
                background-color: #ededed;
            }
            #firstdivbox {
                width: 50%;
                margin: auto;
                padding: 50px;
                border: 3px grey;
                background-color: white;
                font-size: 18px;
                font-style: oblique;
                -webkit-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                text-align: center;
            }
            .form-group {
                margin: 20px auto;
                float: none;
                width: 70%;
                padding: 8px 30px;
                box-sizing: border-box;
                border-radius: 5px;
            }
            #inputsubmit {
                font-size: 13px;
                margin:12px 38px;
                padding: 10px 16px;
            }

            /* Animation of the form */
            .fadeInDown {
                -webkit-animation-name: fadeInDown;
                animation-name: fadeInDown;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
            @-webkit-keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }
            @keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }
        </style>
    </head>
    <!---- The form body ---->
    <body>
        <div id='firstdivbox' class="fadeInDown">
            <h3>Password Modification</h3>
            <form method='post' action='passwordmodificationform.php'>
                <div class="form-group">
                    <label>Existing Username</label>
                    <input type='text' class="form-control" name='exist_username' maxlength='50' required='required' placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type='password' class="form-control" name='new_password' maxlength='50' required='required' placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type='password' class="form-control" name='confirm_password' maxlength='50' required='required' placeholder="Confirm password">
                </div>
                <div>
                    <?php
                        // Include the file passwordmodificationaction.php
                        include("passwordmodificationaction.php");
                        // Run the function, that is to modify the password for a specific user and display the corespoding messages
                        PassModificationFormAction();
                    ?>
                </div>
                <br>
                <!---- Button that perform the modify function that is in the Action file ---->
                <input id='inputsubmit' type='submit' class="btn btn-outline-primary" name='modify' value='MODIFY'>
                <!---- Button to return to the login form, Change the name of the address if needed ---->
                <button id='inputsubmit' type="button" class="btn btn-outline-primary" onclick="window.location.href='loginform.php'">SIGN-IN</button>
            </form>
        </div>
        <br>
    </body>
</html>


