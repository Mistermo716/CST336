<?php
function getPetList(){
  include 'dbConnections.php';
  
  $conn = getDatabaseConnection("heroku_425553fa7a5eb37");
  
  $sql = "SELECT * FROM pets";
  
  $stmt = $conn->prepare($sql);
  $stmt = execute();
  $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  return $record;
}

$pets = getPetList();

foreach($pets as $pet){
  echo "Name: ";
  echo "<a href='#' class='petlink' id='". $pet['id'] ."'>" . $pet['name'] ."</a><br>";
  echo "Type: " . $pet['type'] . "<br>";
  echo "<button id='".$pet['id']."' type='button' class='btn btn-primary petlink'>Adopt Me!</button>";
  echo "<hr><br>";
}