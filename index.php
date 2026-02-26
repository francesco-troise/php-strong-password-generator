<?php 
    session_start();
    //session start

    require"./functions/function.php";
    $Allowed_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    //Allowed characters for password generation

    if(isset($_GET["psw_length"])){
    //On loading: generate password only if the length parameter is present
        $psw_length = $_GET["psw_length"];
        $password = psw_generator($psw_length, $Allowed_chars);
        $_SESSION["password"] = $password;

        header("Location: ./show_password.php");

        exit;
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

        <p>Sarai indirizzato alla pagina di visualizzazione</p>
    </main>
    <footer></footer>
    
</body>
</html>

