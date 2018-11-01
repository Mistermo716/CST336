<?php
function setGame(){
echo "<img class='h1' src='img/neonline.png' width='700vw'/>";
    echo "<img class='h2' src='img/neonline.png' width='700vw'/>";
    echo "<img class='v1' src='img/neonline.png' width='700vw'/>";
    echo "<img class='v2' src='img/neonline.png' width='700vw'/>";
    for($i=0; $i<9; $i++){
     echo "<input class='s s$i' type='submit' value='$i'>";   
    }
}
?>