<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection("heroku_425553fa7a5eb37");

$username = $_POST['username'];
$password = sha1($_POST['password']);

//statement below will cause SQL injection by adding 
//or 1=1 which is true and hacker can break in
/*$sql = "SELECT *
        FROM om_admin
        WHERE username='$username'
        AND password='$password'";*/
        
//: parameters that will be stored in array and prevent SQL injection
$sql = "SELECT *
        FROM om_admin
        WHERE username= :username
        AND password= :password";
        
$np = array();

$np[":username"] = $username;
$np[":password"] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$record= $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($record)){
    $_SESSION['incorrect'] = true;
    //will relocate back to login.php screen if password is incorrect.
    header("Location:login.php");
}
else{
    $_SESSION['incorrect'] = false;
    //$record has the sql statement and the keys to the records are firstName and lastName
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    header("Location:admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title> </title>
    </head>
    <body>

    </body>
</html>