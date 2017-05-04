<!DOCTYPE html>
  <head>
  </head>
  <body>
  
  <?php 
  include("factory.php");
	$newData = dataObjectFactory::create($_POST["id"], '', '', '', '', '');
	$newData->fetchDataById();
  ?>
  <a href = "welcome.php">Click here to go back</a>
  </body>
</html>