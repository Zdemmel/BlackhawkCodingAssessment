<!DOCTYPE html>
  <head>
  </head>
  <body>
  
  <?php 
  include("factory.php");
	$newItem = dataObjectFactory::create($_POST["id"], $_POST["name"], $_POST["desc"], $_POST["active"], $_POST["created"], $_POST["updated"]);
	$newItem->createData();
  ?>
  <a href = "welcome.php">Click here to go back</a>
  </body>
</html>