<?php

function psw_generator($psw_length, $Allowed_chars, $flags_array)
//Accepts the password length and the allowed characters for generation
{
    $name_keys = array_keys($flags_array);
    $repeat = true;
    for ($i = 0; $i < count($flags_array); $i++) {
        if ($name_keys[$i] == "flag_repeat" && $flags_array["flag_repeat"] == 0) {
            $repeat = false;
            //Flag_repeat
        } else if ($name_keys[$i] == "flag_chars" && $flags_array["flag_chars"] == 0) {
            $Allowed_chars = preg_replace("/[a-zA-Z]/", "", $Allowed_chars);
            //If flag_chars  is disabled, so $Allowed_chars lost his chars

        } else if ($name_keys[$i] == "flag_num" && $flags_array["flag_num"] == 0) {
            $Allowed_chars = preg_replace("/[0-9]/", "", $Allowed_chars);
            //If flag_num is disabled, so $Allowed_chars lost his numbers
        } else if ($name_keys[$i] == "flag_symbol" && $flags_array["flag_symbol"] == 0) {
            $Allowed_chars = preg_replace("/[^a-zA-Z0-9]/", "", $Allowed_chars);
        }
    }


    $cont = 0;
    $password = "";
    while ($cont < $psw_length) {
        if ($repeat == true) {
            $index_chars = random_int(0, strlen($Allowed_chars) - 1);
            //Generation of a random number to use as a random index to obtain characters from $Allowed_chars
            $password .= $Allowed_chars[$index_chars];
            $cont++;
        } else {
            $index_chars = random_int(0, strlen($Allowed_chars) - 1);
            if (str_contains($password, $Allowed_chars[$index_chars])) {
                continue;
            } else {
                $password .= $Allowed_chars[$index_chars];
                $cont++;
            }
        }
    }

    return $password;
}
