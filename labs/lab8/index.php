<!DOCTYPE html>
<html>
    <body>
        
        <?php  
         include 'inc/header.php';
  
        function getPetList(){
          include 'dbConnection.php';
         
          $conn = getDatabaseConnection("heroku_425553fa7a5eb37");

  
  $sql = "SELECT * FROM pets";
  
  $stmt = $conn->prepare($sql);
  $stmt -> execute();
  $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  return $record;
}
$pets = getPetList();
        ?>  
        
         <br /><br />
        <a class="btn btn-outline-primary" href="pets.php" role="button">Adopt Now! </a>

        <br /><br />
        <hr>
        <!-- add Carousel component -->
  <div style="width:40%; margin:auto" id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php 
      $inc = 0;
      foreach($pets as $pet){
        
        if($inc == 0){
          echo '<li data=target="#carouselExampleIndicators" data-slide-to="'.$inc.'" class="active"></li>';
        }
        else{
        echo '<li data=target="#carouselExampleIndicators" data-slide-to="'.$inc.'"></li>';
        }
        
        $inc++;
        
      }
      ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php 
      $increment = 0;
          foreach($pets as $pet){
            
            if($increment == 0){
              $increment = 1;
               echo '
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="img/'. $pet['pictureURL'] .'" alt="'.$pet['name'].' the '.$pet['breed'].'">
                  </div>
                  ';
            }
            else{
            echo '
                  <div class="carousel-item">
                    <img  class="d-block w-100" src="img/'. $pet['pictureURL'] .'" alt="'.$pet['name'].' the '.$pet['type'].'">
                  </div>
                  ';
            }
          }

    ?>
  </div>
</div>
        
        <?php
        include 'inc/footer.php'
        ?>

    </body>
</html>