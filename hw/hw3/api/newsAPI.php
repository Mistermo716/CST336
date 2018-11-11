<?php

function getNews($keyword='', $lang='en', $source='', $sort = '', $pageSize = 20){
    $curl = curl_init();
  
  curl_setopt_array($curl, array(
      CURLOPT_URL => "https://newsapi.org/v2/everything?q=$keyword&language=$lang&sources=$source&sortBy=$sort&pageSize=$pageSize&apiKey=6e77f8ab73e34fa0831186ed84833fff",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache'
      ),
    ));
  
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
    echo '<div class="container-fluid">';
    $count = 1;
    
   foreach($data['articles'] as $article){
      $image = $article['urlToImage'];
      $title = $article['title'];
      $description = $article['description'];
      $url = $article['url'];
      $author = $article['author'];
      $name = $article['source']['name'];
      $date = $article['publishedAt'];
      $displayDate = substr($date, 0, strpos($date, 'T'));
      
      if($count == 1){
        echo '<div class="row">';
        echo '<br />';
      }
      
      echo '<div class="col-sm-12 col-lg-6" col-12>';
      echo "<div class='card mx-auto'>";
      echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>$title</h5>";
      echo "<p class='card-text'>Date: $displayDate</p>";
      echo "<p class='card-text'>Author: $author</p>";
      echo "<p class='card-text'>Source: $name</p>";
      echo "<p class='card-text'>$description</p>";
      echo"<a href='$url' class='btn btn-primary'>Read More</a>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      if($count == 2){
         echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      if($count < 2){
        $count++;
      }
      else{
        $count = 1;
      }
    }
  
}

function getSources(){
  $source = "https://newsapi.org/v2/sources?apiKey=6e77f8ab73e34fa0831186ed84833fff";
 
 $curl = curl_init();
  
    curl_setopt_array($curl, array(
      CURLOPT_URL => $source,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache'
      ),
    ));
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
     $sourcesMenu1 = '<select name="source">'. "<option value=''>All News Sources</option>";
    foreach($data['sources'] as $source){
      $sourcesMenu2 = $sourcesMenu2 . "<option value='{$source['id']}'>{$source['name']}</option>";
    } 
    
    $sourcesMenu3 = '</select>';
    
    return $sourcesMenu1 . $sourcesMenu2 . $sourcesMenu3;
}

function getTopHeadlines($category='top'){
  $curl = curl_init();
  
  
  if($category =='top'){
  curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://newsapi.org/v2/top-headlines?country=us&apiKey=6e77f8ab73e34fa0831186ed84833fff',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache'
      ),
    ));
  }
  else {
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://newsapi.org/v2/top-headlines?country=us&category=$category&apiKey=6e77f8ab73e34fa0831186ed84833fff",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'cache-control: no-cache'
      ),
    ));
  }
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
    echo '<div class="container-fluid">';
    $count = 1;
    foreach($data['articles'] as $article){
      $image = $article['urlToImage'];
      $title = $article['title'];
      $description = $article['description'];
      $url = $article['url'];
      $author = $article['author'];
      $name = $article['source']['name'];
      $date = $article['publishedAt'];
      $displayDate = substr($date, 0, strpos($date, 'T'));
      
      if($image != ""){
      
      if($count == 1){
        echo '<div class="row">';
        echo '<br />';
      }
      
      echo '<div class="col-sm-12 col-lg-6" col-12>';
      echo "<div class='card mx-auto'>";
      echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>$title</h5>";
      echo "<p class='card-text'>Date: $displayDate</p>";
      echo "<p class='card-text'>Author: $author</p>";
      echo "<p class='card-text'>Source: $name</p>";
      echo "<p class='card-text'>$description</p>";
      echo"<a href='$url' class='btn btn-primary'>Read More</a>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      if($count == 2){
         echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      if($count < 2){
        $count++;
      }
      else{
        $count = 1;
      }
      }
      else{
        
      }
    }

}
?>