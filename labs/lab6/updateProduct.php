<?php
 include 'dbConnection.php';
$conn = getDatabaseConnection("heroku_425553fa7a5eb37");

if(isset($_GET['productId'])){
  $product = getProductInfo();
}

function getProductInfo(){
  global $conn;
  
  $sql = "SELECT * 
          FROM om_product
          WHERE productId = " . $_GET['productId'];
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  
  return $record;
}

function getCategories($catId){
  global $conn;
  
  $sql = "SELECT catId, catName
          FROM om_category
          ORDER BY catName";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($records as $record){
    echo "<option ";
    echo ($record['catId'] == $catId)?"selected": "";
    echo " value='" . $record['catId'] . "'>" . $record['catName'] . "</option>";
  }
  
  if(isset($_GET['updateProduct'])){
    $sql = "UPDATE om_product
            SET productName = :productName,
                productDescription = :productDescription,
                productImage = :productImage,
                price = :price,
                catId = :catId
            WHERE productId = :productId;";
            
    $np = array();
    $np[':productName'] = $_GET['productName'];
    $np[':productDescription'] = $_GET['description'];
    $np[':productImage'] = $_GET['productImage'];
    $np[':price'] = $_GET['price'];
    $np[':catId'] = $_GET['catId'];
    $np[':productId'] = $_GET['productId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    echo "Product has been updated!";
    
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Update Product</title>
  </head>
  
  <body>
    <form>
      <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
      <strong>Product Name: </strong> <input type="text" name="productName" class="form-control" value="<?=$product['productName']?>"/><br>
      <strong>Description: </strong> <input type="textarea" name="description" class="form-control" value="<?=$product['productDescription']?>"/><br>
      <strong>Price: </strong> <input type="text" name="price" class="form-control" value="<?=$product['price']?>"/><br>
      <strong>Category: </strong> <select name="catId" class="form-control" ><br>
        <option value="">Select One</option>
        <?php getCategories($product['catId']); ?>
      </select><br>
      <strong>Set Image URL</strong><input type="text" name="productImage" value="<?=$product['productImage']?>" class="form-control" /> <br>
      <input type="submit" name="updateProduct" class="btn btn-primary" value="Update Product">
    </form>
  </body>
</html>