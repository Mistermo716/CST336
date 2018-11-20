<?php 
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Ottermart - Admin Site</title>
  </head>
  
  <body>
    <h1>
      Ottermart - Admin Site
    </h1>
    
    <form method="POST" action="loginProcess.php">
      Username: <input type="text" name="username" /><br/>
      Password: <input type="password" name="password" /> <br />
      
      <input type="submit" name="submitForm" value="login" />
      
      <?php
      if($_SESSION['incorrect']){
        echo "<p class='lead' id='error' style='color:red'";
        echo "<strong>Incorrect Username or Password!</strong></p>";
        
      }
      
      ?>
    </form>
  </body>
</html>