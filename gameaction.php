<?php	
        if(isset($_POST['submit'])){ 
            //Gets user inputs and stores in an array
            $message ="";
            $guessNums = $_POST['guessNums'];
            //Counts all the values of an array
            $result = array_count_values($guessNums);
            //Creates a variable to count the dupplicate numbers
            $dupplicate = 0;
            //Counts dupplicate numbers
            foreach ($result as $key => $value) {
                if ($value > 1){
                    $dupplicate++;
                }
            }
            // If there is a dupplicate number, an error message is displayed
            if ($dupplicate != 0){
                $message = "You guessed the numbers $guessNums[0], $guessNums[1], $guessNums[2], $guessNums[3], $guessNums[4]. <br> Error: Please choose 5 different numbers!";
            }
            // If 5 numbers are different 
            else{
                // Creates an array and generates 5 different random numbers using function rand()
                $randNums =array();
                for ($i=0;$i<5;$i++){
                    do
                    $number = rand(0,12);
                    while(in_array($number,$randNums));
                    array_push($randNums,$number);
                }
                // Generates random different numbers       
                $count=0;
                for($i=0;$i<5;$i++){
                    if(in_array($guessNums[$i],$randNums)){
                        $count++;
                    }
                }
                //Displays appropriate messages
                //If there is no number matched
                if($count == 0){
                    $message = "We generate the numbers $randNums[0], $randNums[1], $randNums[2], $randNums[3], $randNums[4] <br>You guessed the numbers $guessNums[0], $guessNums[1], $guessNums[2], $guessNums[3], $guessNums[4] <br>You guessed any of the numbers we generate! <br>You’re an apprentice guesser!";
                }
                //If there are less than 5 numbers matched
                else if($count <5){
                    $message = "We generate the numbers $randNums[0], $randNums[1], $randNums[2], $randNums[3], $randNums[4] <br>You guessed the numbers $guessNums[0], $guessNums[1], $guessNums[2], $guessNums[3], $guessNums[4] <br>You guessed $count of the numbers we generate! <br>You’re a good guesser!";
                }
                //If all 5 numbers matched
                else{
                    $message = "We generate the numbers $randNums[0], $randNums[1], $randNums[2], $randNums[3], $randNums[4] <br>You guessed the numbers $guessNums[0], $guessNums[1], $guessNums[2], $guessNums[3], $guessNums[4] <br>You guessed all the numbers we generate! <br>You’re an EXCELLENT guesser!"; 
                }
            }
        }
?>	