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
    setGame();
    //echo "<img class='xo xo5' src='img/neono.png'/>";
    
    $row1 = array();
    $row2 = array();
    $row3 = array();
    
    while(true){
    
    
    if(isset($_POST['s1'])){
        $row1[1] = "X";
    }
    }
    
    
    for($i = 0; $i < 3; $i++){
        
        if($row1[$i] == "X"){
        echo "<img class='xo xo$i' src='img/neonx.png'/>";
        }
        
        if($row1[$i] == "O"){
        echo "<img class='xo xo$i' src='img/neono.png'/>";
        }
        
        if($row2[$i] == "X"){
            $pos = $i + 3;
            echo "<img class='xo xo$pos' src='img/neonx.png'/>";
        }
        
        if($row2[$i] == "O"){
            $pos = $i + 3;
            echo "<img class='xo xo$pos' src='img/neono.png'/>";
        }
        
        if($row3[$i] == "X"){
            $pos = $i + 6;
            echo "<img class='xo xo$pos' src='img/neonx.png'/>";
        }
        
        if($row3[$i] == "O"){
            $pos = $i + 6;
            echo "<img class='xo xo$pos' src='img/neono.png'/>";
        }
        
    }
    
    
    echo '<form action="index.php" method="post">';
    for($i=0; $i<9; $i++){
     echo "<input class='s s$i' type='submit' value='' name='s$i'>";   
    }
    
    echo'</form>';
    
    
   

    ?>
    </body>
    
</html>