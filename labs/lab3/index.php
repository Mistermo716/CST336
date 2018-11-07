<!DOCTYPE html>
<?php 
    $backgroundImage = "img/sea.jpg";
    //API call is below
    if(isset($_GET['keyword'])){
        // echo "You searched for: " . $_GET['keyword'];
        include 'api/pixabayAPI.php';
        if(!isset($_GET['layout'])){ //if layout is not set
        $imageURLs = getImageURLs($_GET['keyword']);
        }
        else{ //if layout is set pass second parameter for layout
            $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        }
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        
    }
    
?>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br>
        <?php 
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            }
            else{
                // for($i = 0; $i < 5; $i++){
                //     //echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200'>";
                
                
                // //code below will always select unique images no duplicates
                
                // do {
                //     $randomIndex = rand(0, count($imageURLs));
                // }
                // while(!isset($imageURLs[$randomIndex]));
                
                // echo "<img src='" . $imageURLs[$randomIndex] . "' width='200'/>";
                // unset($imageURLs[$randomIndex]); //will remove this from array
                // //unset destroys variables or in this case the image in the array.
                // }
                if($_GET['keyword'] == ""){ //if no keyword dont display carousel
                    
                }
                else{
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                for($i =0; $i < 7; $i++){
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0) ? "class=''active" : "";
                    echo "></li>";
                }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php 
                    for($i = 0; $i < 7; $i++){
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        } while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="carousel-item ';
                        echo ($i == 0) ? "active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
                
            </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
        <?php 
            }
            }
        ?>
        <br>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value=""/>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for = "lhorizontal"> Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical"> Vertical</label>
            <select name="keyword">
                <option value="">Select One</option>
                <option value="Island">Island</option>
                <option value="Desert">Desert</option>
                <option value="Mountain">Mountain</option>
                <option value="Snow">Snow</option>
                <option value="Stars">Stars</option>
            </select>
            <input type="submit" value="Search"/>
        </form>
        <br /> <br />
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>