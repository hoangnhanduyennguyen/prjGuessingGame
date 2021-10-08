<?php
    // Include the file gameaction.php
    $message ="";
    include("gameaction.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Kids Guessing Game</title>
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
                width: 60%;
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
	<body>
        <div id='firstdivbox' class="fadeInDown">
            <h1>Kids Guessing Game</h1>
            <h2>Welcome!</h2>
            <p>The system will generate 5 random numbers soon <br>Select 5 different numbers beetween 0 to 12 to guess them</P>
            <form method="post" action="gameform.php">
                <?php
                    for($i=0; $i<5; ++$i){
                        echo <<<END
                        <select name ="guessNums[]" >
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        END;
                    }
                ?>
                <br><br>
                <span class="mess"><?php echo $message; echo "<br>"?></span>	
                <input id='inputsubmit' type='submit' class="btn btn-outline-primary" name='submit' value='SUBMIT'>
                <input id='inputsubmit' type='button' class="btn btn-outline-primary" onclick="window.location.href='loginform.php'" value ="SIGN OUT"/>
                	
            </form>
        </div>
		<br/>
	</body>
</html>

