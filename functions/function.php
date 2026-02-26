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