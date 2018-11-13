<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/journal/bootstrap.min.css" rel="stylesheet" integrity="sha384-5C8TGNupopdjruopVTTrVJacBbWqxHK9eis5DB+DYE6RfqIJapdLBRUdaZBTq7mE" crossorigin="anonymous">
  <link href="css/main.css" rel="stylesheet"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  
  <body>
<?php
  include 'inc/functions.php';
  displayNavbar();
  if($_GET['search'] == ''){
    displayHeadlines('top');
  }
  else{
    getSearchResults();
  }
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>