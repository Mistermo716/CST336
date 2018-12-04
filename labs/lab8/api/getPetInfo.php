<?php

include '../dbConnection.php';
$dbConn = getDatabaseConnection("heroku_425553fa7a5eb37");
$sql = "SELECT * FROM pets";
        
$stmt = $dbConn->prepare($sql);
$stmt -> execute(array("id"=>$_GET['id']));
$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultSet);