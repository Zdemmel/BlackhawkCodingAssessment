<!DOCTYPE html>

  <head>
  </head>
  <body>
  <!--
  In this web application, the user would be given three options to either add, search for a specific Id, or search for a table by criteria
  the data items are an id number, a name, a description, if the item is active, if the item has been created yet, and if the item has been updated
  -->
	<form action ="addNewItem.php" method="post">
		Enter data here to add an object <br>
		ID: <input type = "text" name = "id"><br>
		Name: <input type = "text" name = "name"><br>
		Description: <input type = "text" name = "desc"><br>
		Active: <input type = "checkbox" name = "active"><br>
		Created: <input type = "checkbox" name = "created"><br>
		Updated: <input type = "checkbox" name = "updated"><br>
		<input type="submit">
	</form>

	<br>
	<br>

	<form action ="fetchById.php" method="post">
		Enter an ID here to retrieve it's data set  <br>
		ID: <input type = "text" name = "id"><br>
	<input type="submit">
	</form>
	
	<br>
	<br>
	
	<form action ="SearchByCriteria.php" method="post">
		Enter data search for an object. If you want to search by a boolean, please click the first box, followed by the second box for the boolean status, otherwise keep the first box empty <br>
		ID: <input type = "text" name = "id"><br>
		Name: <input type = "text" name = "name"><br>
		Description: <input type = "text" name = "desc"><br>
		Active: <input type = "checkbox" name = "activeSearch"><input type = "checkbox" name = "active"><br>
		Created: <input type = "checkbox" name = "createdSearch"><input type = "checkbox" name = "created"><br>
		Updated: <input type = "checkbox" name = "updatedSearch"><input type = "checkbox" name = "updated"><br>
		<input type="submit">
	</form>
  </body>
</html>
