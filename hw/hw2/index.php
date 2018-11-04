<html>
    
    <head>
        <title>Neon Tic Tac Toe</title>
        <style>
             @import url("css/main.css");
        </style>
    </head>

    <body style="background-color: black">
    
    <?php
    include 'inc/functions.php';
    echo "<h1 style='color:black' class='title'>Neon Tic Tac Toe</h1>";
    session_start();
    setGame();
    playGame();

    
    ?>
    </body>
    
</html>