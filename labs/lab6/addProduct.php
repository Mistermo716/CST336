<?php 
  include 'dbConnection.php';
$conn = getDatabaseConnection("heroku_425553fa7a5eb37");

function getCategories(){
  global $conn;
  $sql = "SELECT catId, catName
          FROM om_category
          ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 //fetch all products in login we only used fetch because there should only be one record.
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record){
      echo "<option value='" . $record['catId'] . "'>". $record['catName'] . "</option>";
    }
    
    if(isset($_GET['submitProduct'])){
      $productName = $_GET['productName'];
      $productDescription = $_GET['productDescription'];
      $productImage = $_GET['productImage'];
      $productPrice = $_GET['price'];
      $catId = $_GET['catId'];
      
      $sql = "INSERT INTO om_product
              (productName, productDescription, productImage, price, catId)
              VALUES (:productName, :productDescription, :productImage, :price, :catId);";
              
      $np = array();
      $np[':productName'] = $productName;
      $np[':productDescription'] = $productDescription;
      $np[':productImage'] = $productImage;
      $np[':price'] = $productPrice;
      $np[':catId'] = $catId;
      
      $stmt = $conn->prepare($sql);
      $stmt->execute($np);
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add Product</title>
  </head>
  
  <body>
    <form>
      <strong>Product Name: </strong> <input type="text" name="productName" class="form-control"/><br>
      <strong>Description: </strong> <input type="textarea" name="productDescription" class="form-control"/><br>
      <strong>Price: </strong> <input type="text" name="price" class="form-control"/><br>
      <strong>Category: </strong> <select name="catId" class="form-control"><br>
        <option value="">Select One</option>
        <?php getCategories(); ?>
      </select><br>
      <strong>Set Image URL</strong><input type="text" name="productImage" class="form-control" /> <br>
      <input type="submit" name="submitProduct" class="btn btn-primary" value="Add Product">
    </form>
  </body>
</html>