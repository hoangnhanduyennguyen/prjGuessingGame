<?php
    // Include the file loginaction.php
    $message ="";
    include("loginaction.php");

?>
<!Doctype HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Log In</title>
        <!---- Bootstrap library and other library ---->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!---- Java Script function ---->
        <script>
            function clickAlert() {
                alert("Returning to the Sign up Form ... ");
                window.location.href='signupform.php';
            }
        </script>
        <!---- CSS Styles ---->
        <style>
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
            <h3>Log In</h3>
	        <form method="post" action="loginform.php" >
                <div class="form-group">
                    <lable> User Name : </lable>
		            <input type="text" class="form-control" name="userName" maxlength='50' required="required" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <lable> Password : </lable>
		            <input type="password" class="form-control" name="userPassword" maxlength='50' required="required" placeholder="Enter password">
                </div>	
                <span class="mess"><?php echo $message; echo "<br>"?></span>
                <input id="inputsubmit" type="submit" name="CONNECT" class="btn btn-outline-primary" value="CONNECT">
                <input id='inputsubmit' type='button' class="btn btn-outline-primary" onclick="window.location.href='signupform.php'" value ="SIGN UP">
	        </form>
        </div>
        <br>
    </body>
</html>