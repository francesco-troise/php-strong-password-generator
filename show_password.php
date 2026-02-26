<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show-password</title>
</head>
<body>
    <header></header>
    <main>
        <p>Qui sotto la tua password:</p><br>
        <?php 
            echo "<b>{$_SESSION['password']}</b>";
            
        
        ?>
    </main>
    <footer></footer>
    
</body>
</html>