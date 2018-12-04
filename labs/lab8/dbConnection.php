<?php 
  function getDatabaseConnection($dbname = 'heroku_425553fa7a5eb37'){
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b276295562b531';
    $password = 'ec93aba2';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
  }
?>