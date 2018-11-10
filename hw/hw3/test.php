
<?php
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
    $arr = array();
    echo '<select>';
    foreach($data['sources'] as $source){
      echo "<option value='{$source['id']}'>{$source['name']}</option>";
    }
    echo '</select>';
?>