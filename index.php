<?php 

    function psw_generator($psw_length, $Allowed_chars){
    //Accepts the password length and the allowed characters for generation
        $password = "";
        for($i=0; $i <  $psw_length; $i++){
            $index_chars = random_int(0 , strlen($Allowed_chars) - 1 );
            //Generation of a random number to use as a random index to obtain characters from $Allowed_chars
            $password .= $Allowed_chars[$index_chars];
        };
        return $password;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-password</title>
</head>
<body>
    <header>
        
    </header>
    <main>
        <h1>FORM DI GENERAZIONE PASSWORD</h1>
        <p>Decidi la lunghezza della tua password!</p>
        <form action="./index.php" method="GET">
            <label for="form_password">Scegli una lunghezza</label>
            <input type="number" name="psw_length" id="form_passowrd" min="4" max="500" required>
            <button type="submit">Invia!</button>
            <a href="./index.php">Ripulisci il risultato</a>
        </form>

        <p>La tua password apparirà qui sotto</p>

        <?php 
        
        $Allowed_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';

            $field_password = "";
            if(!isset($_GET["psw_length"])){
                $field_password =  "<input type='text' placeholder='Password...' readonly >";
                echo $field_password;
                
            }
            else{
                $psw_length = (int)$_GET["psw_length"];
                $password= psw_generator($psw_length, $Allowed_chars);
                $field_password =  "<input type='text' value='$password' readonly >";
                echo $field_password;
            }
        ?>
    </main>
    <footer></footer>
    
</body>
</html>

