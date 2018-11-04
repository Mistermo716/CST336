<?php
function setGame(){
echo "<img class='h1' src='img/neonline.png' width='700vw'/>";
    echo "<img class='h2' src='img/neonline.png' width='700vw'/>";
    echo "<img class='v1' src='img/neonline.png' width='700vw'/>";
    echo "<img class='v2' src='img/neonline.png' width='700vw'/>";
    
    
    echo '<form action="#" method="post">';
    for($i=0; $i<9; $i++){
     echo "<input style='color:white' class='s s$i' type='submit' value='' name='s$i' />";   
    }

    echo "<input class='reset' style='color:white' type='submit' value='Play Again' name='reset' />";
    echo "<input class='reset' style='color:white' type='submit' value='Reset Score' name='resetWin' />";
    
    echo'</form>';
}

function playGame(){
    $_SESSION['BOARD'];
    $_SESSION['WINS'];

if(isset($_POST['reset'])){
        $_SESSION['BOARD'] = array();
    }
    
if(isset($_POST['resetWin'])){
    $_SESSION['WINS']['Player1'] = "";
    $_SESSION['WINS']['Player2'] = "";
}

if(count($_SESSION['BOARD']) % 2 == 0){
    if(isset($_POST['s0']) && isset($_SESSION['BOARD'][0]) != 1){
        $_SESSION['BOARD'][0] = "X";
    }
    if(isset($_POST['s1']) && isset($_SESSION['BOARD'][1]) != 1){
        $_SESSION['BOARD'][1] = "X";
    }
    if(isset($_POST['s2']) && isset($_SESSION['BOARD'][2]) != 1){
        $_SESSION['BOARD'][2] = "X";
    }
    if(isset($_POST['s3']) && isset($_SESSION['BOARD'][3]) != 1){
        $_SESSION['BOARD'][3] = "X";
    }
    if(isset($_POST['s4']) && isset($_SESSION['BOARD'][4]) != 1){
        $_SESSION['BOARD'][4] = "X";
    }
    if(isset($_POST['s5']) && isset($_SESSION['BOARD'][5]) != 1){
        $_SESSION['BOARD'][5] = "X";
    }
    if(isset($_POST['s6']) && isset($_SESSION['BOARD'][6]) != 1){
        $_SESSION['BOARD'][6] = "X";
    }
    if(isset($_POST['s7']) && isset($_SESSION['BOARD'][7]) != 1){
        $_SESSION['BOARD'][7] = "X";
    }
    if(isset($_POST['s8']) && isset($_SESSION['BOARD'][8]) != 1){
        $_SESSION['BOARD'][8] = "X";
    }
}
else if (count($_SESSION['BOARD']) % 2 == 1) {
    
    if(isset($_POST['s0']) && isset($_SESSION['BOARD'][0]) != 1){
        $_SESSION['BOARD'][0] = "O";
    }
    if(isset($_POST['s1']) && isset($_SESSION['BOARD'][1]) != 1){
        $_SESSION['BOARD'][1] = "O";
    }
    if(isset($_POST['s2']) && isset($_SESSION['BOARD'][2]) != 1){
        $_SESSION['BOARD'][2] = "O";
    }
    if(isset($_POST['s3']) && isset($_SESSION['BOARD'][3]) != 1){
        $_SESSION['BOARD'][3] = "O";
    }
    if(isset($_POST['s4']) && isset($_SESSION['BOARD'][4]) != 1){
        $_SESSION['BOARD'][4] = "O";
    }
    if(isset($_POST['s5']) && isset($_SESSION['BOARD'][5]) != 1){
        $_SESSION['BOARD'][5] = "O";
    }
    if(isset($_POST['s6']) && isset($_SESSION['BOARD'][6]) != 1){
        $_SESSION['BOARD'][6] = "O";
    }
    if(isset($_POST['s7']) && isset($_SESSION['BOARD'][7]) != 1){
        $_SESSION['BOARD'][7] = "O";
    }
    if(isset($_POST['s8']) && isset($_SESSION['BOARD'][8]) != 1){
        $_SESSION['BOARD'][8] = "O";
    }
    
}

for($i = 0; $i < 9; $i++){
        
        if($_SESSION['BOARD'][$i] == "X"){
        echo "<img class='xo xo$i' src='img/neonx.png'/>";
        }
        
        if($_SESSION['BOARD'][$i] == "O"){
        echo "<img class='xo xo$i' src='img/neono.png'/>";
        }
    }

if(($_SESSION['BOARD'][0] == $_SESSION['BOARD'][1] && $_SESSION['BOARD'][1] == $_SESSION['BOARD'][2]) 
|| ($_SESSION['BOARD'][0] == $_SESSION['BOARD'][4] && $_SESSION['BOARD'][4] == $_SESSION['BOARD'][8])){
    switch($_SESSION['BOARD'][0]){
        case "X":
            echo "<h1 style='color:white'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            $_SESSION['WINS']['Player2']++;
            echo "<h1 style='color:white'> Player 2 Wins </h1>";
            break;
    }
    
    
}

if(($_SESSION['BOARD'][0] == $_SESSION['BOARD'][3] && $_SESSION['BOARD'][3] == $_SESSION['BOARD'][6])){
    
    switch($_SESSION['BOARD'][0]){
        case "X":
            echo "<h1 style='color:white'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            echo "<h1 style='color:white'> Player 2 Wins </h1>";
            $_SESSION['WINS']['Player2']++;
            break;
    }
    
}

if(($_SESSION['BOARD'][3] == $_SESSION['BOARD'][4] && $_SESSION['BOARD'][4] == $_SESSION['BOARD'][5])){
    
    switch($_SESSION['BOARD'][3]){
        case "X":
            echo "<h1 style='color:white'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            echo "<h1 style='color:white'> Player 2 Wins </h1>";
            $_SESSION['WINS']['Player2']++;
            break;
    }
    
}

if(($_SESSION['BOARD'][6] == $_SESSION['BOARD'][7] && $_SESSION['BOARD'][7] == $_SESSION['BOARD'][8]) ||($_SESSION['BOARD'][6] == $_SESSION['BOARD'][4] && $_SESSION['BOARD'][4] == $_SESSION['BOARD'][2])  ){
    
    switch($_SESSION['BOARD'][6]){
        case "X":
            echo "<h1 style='color:white'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            echo "<h1 style='color:white'> Player 2 Wins </h1>";
            $_SESSION['WINS']['Player2']++;
            break;
    }
    
}

if(($_SESSION['BOARD'][1] == $_SESSION['BOARD'][4] && $_SESSION['BOARD'][4] == $_SESSION['BOARD'][7])){
    
    switch($_SESSION['BOARD'][1]){
        case "X":
            echo "<h1 style='color:white'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            echo "<h1 style='color:white'> Player 2 Wins </h1>";
            $_SESSION['WINS']['Player2']++;
            break;
    }
    
}
if(($_SESSION['BOARD'][2] == $_SESSION['BOARD'][5] && $_SESSION['BOARD'][5] == $_SESSION['BOARD'][8])){
    
    switch($_SESSION['BOARD'][2]){
        case "X":
            echo "<h1 style='color:black'> Player 1 Wins </h1>";
            $_SESSION['WINS']['Player1']++;
            break;
        case "O":
            echo "<h1 style='color:black'> Player 2 Wins </h1>";
            $_SESSION['WINS']['Player2']++;
            break;
    }
    
}
if(sizeof($_SESSION['BOARD']) % 2 == 0){

    echo "<h1 style='color:black'>Player 1's Turn</h1>";
}
else{
    echo "<h1 style='color:black'>Player 2's Turn</h1>";
}
    $playerKeys = array_keys($_SESSION['WINS']); //did this just to use another array function below code is like inception
    
    echo "<h1 class='player1' style='color:black'> Player 1 Score: ". $_SESSION['WINS'][$playerKeys[0]] .  "</h1>";
    echo "<h1 class='player2' style='color:black'> Player 2 Score: ". $_SESSION['WINS'][$playerKeys[1]] .  "</h1>";
    echo "<h1 style='color:black'> Lucky Spot of Round: " . rand(1,9) . "</h1>"; //put your X or O at lucky spot :)
    //also an excuse to use the rand() function. Since my submissions are using submit buttons loops are almost impossible.
}

?>