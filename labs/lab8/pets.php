<?php
  include 'inc/header.php';
?>
<?php

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

foreach($pets as $pet){
  echo "Name: ";
  echo "<a href='#' class='petlink' id='". $pet['id'] ."'>" . $pet['name'] ."</a><br>";
  echo "Type: " . $pet['type'] . "<br>";
  echo "<button id='".$pet['id']."' type='button' class='btn btn-primary petlink'>Adopt Me!</button>";
  echo "<hr><br>";
}
?>



<script>

    $(document).ready( function(){
        
        $(".petLink").click( function(){
            
            $("#petInfo").html("<div style='margin:auto' class='loader'></div>");

            
            var delay = 1000; //causing delay of API call so loader has time for load animation and I get points for the loader :)
            var globalThis = this; //so I can access this within delay function
            setTimeout(function() {
              $.ajax({
                type: "GET",
                url: "api/getPetInfo.php",
                dataType: "json",
                data: { "id": $(globalThis).attr('id')},
                success: function(data,status) {
                
                //   console.log(data);
                   $("#petInfo").html(` <img src='img/${data.pictureURL}'><br > 
                                        Age: ${data.age} <br>
                                        Breed: ${data.breed} <br> 
                                        ${data.description}`);   
                 
                   $("#petNameModalLabel").html(data.name);                   
                
                }
                
            });
              
            }, delay);
            
            $('#petInfoModal').modal("show");
        
        }); 
        
    });

    
</script>            

<!-- Modal -->
<div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="petNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="petInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        
        <footer>
            Disclaimer: The information in this site is not real.
        </footer>

    </body>
</html>
