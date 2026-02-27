<?php
session_start();
//session start
require './functions/function.php';

$Allowed_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
//Allowed characters for password generation


if (isset($_GET['psw_length'])) {
    //On loading: generate password only if the length parameter is present
    $psw_length = $_GET['psw_length'];

    $flag_repeat = isset($_GET['psw_repeat']) ? (int) $_GET['psw_repeat'] : 0;
    $flag_chars = isset($_GET['psw_chars']) ? (int) $_GET['psw_chars'] : 0;
    $flag_upper_lower = (isset($_GET['upper_case']) || isset($_GET['lower_case'])) ? 1 : 0;
    $flag_num = isset($_GET['psw_numbers']) ? (int) $_GET['psw_numbers'] : 0;
    $flag_symbol = isset($_GET['psw_symbols']) ? (int) $_GET['psw_symbols'] : 0;
    //Flags representing password parameters

    $flags_array = ['psw_length' => $psw_length, 'flag_repeat' => $flag_repeat, 'flag_chars' => $flag_chars, 'flag_upper_lower' => $flag_upper_lower, 'flag_num' => $flag_num, 'flag_symbol' => $flag_symbol];
    foreach ($flags_array as $key => $value) {
        // Saltiamo il controllo sulla lunghezza, perché non è una flag 0/1
        if ($key !== 'psw_length') {
            if (!in_array($value, [0, 1, '0', '1'])) {
                header('Location: ./index.php');
                exit();
            }
        }
    }

    $password = psw_generator($psw_length, $Allowed_chars, $flags_array);
    //Function that generates password - uses password length and allowed characters
    $_SESSION['password'] = $password;

    header('Location: ./show_password.php');
    //redirect to display page as soon as the password is generated

    exit();
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

            <span class="info_radio" for="psw_repeat_yes">Consenti ripetizioni di caratteri</span>

            <label for="psw_repeat_yes">Si</label>
            <input type="radio" name="psw_repeat" id="psw_repeat_yes" value="1" checked>

            <label for="psw_repeat_no">No</label>
            <input type="radio" name="psw_repeat" id="psw_repeat_no" value="0">

            <label for="psw_chars">Lettere</label>
            <input type="checkbox" id="psw_chars" name="psw_chars" value="1">

            <label for="psw_numbers">Numeri</label>
            <input type="checkbox" name="psw_numbers" id="psw_numbers" value="1">

            <label for="psw_symbols">Simboli</label>
            <input type="checkbox" name="psw_symbols" id="psw_symbols" value="1">

            <button type="submit">Invia!</button>
            <a href="./index.php">Ripulisci il risultato</a>
        </form>

        <p>Sarai indirizzato alla pagina di visualizzazione</p>
    </main>
    <footer></footer>

</body>

</html>