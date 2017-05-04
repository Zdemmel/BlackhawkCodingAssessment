<!DOCTYPE html>
  <head>
  </head>
  <body>
  
  <?php 
  include("factory.php");
  
	if($_POST["activeSearch"] == "on")
	{
		if($_POST["active"] == "on")
			$activeConstruct = 1;
		else
			$activeConstruct = "0";
	}
	
	if($_POST["createdSearch"] == "on")
	{
		if($_POST["created"] == "on")
			$createdConstruct = 1;
		else
			$createdConstruct = "0";
	}
	
	if($_POST["updatedSearch"] == "on")
	{
		if($_POST["updated"] == "on")
			$updatedConstruct = 1;
		else
			$updatedConstruct = "0";
	}
	
	$newItem = dataObjectFactory::create($_POST["id"], $_POST["name"], $_POST["desc"], $activeConstruct, $createdConstruct, $updatedConstruct);
	$newItem->searchData();
  ?>
  <a href = "welcome.php">Click here to go back</a>
  </body>
</html>