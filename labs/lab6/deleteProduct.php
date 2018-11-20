<?php 
   include 'dbConnection.php';
$conn = getDatabaseConnection("heroku_425553fa7a5eb37");

$sql = "DELETE FROM om_product
        WHERE productId = " . $_GET['productId'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("Location:admin.php");
?>