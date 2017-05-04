<!-- banner.php -->

  <?php
	//This would be the fictitious PDO connection 
	//include (db.php);
  
    class dataObject
	{
		private $id;
		private $name;
		private $description;
		private $active;
		private $created;
		private $updated;
		
		public function __construct($inputId, $inputModel, $inputDescription, $active, $created,$updated)
		{
			//Constructor for the class data
			$this->id = $inputId;
			$this->name = $inputModel;
			$this->description = $inputDescription;
			$this->active = $active;
			$this->created = $created;
			$this->updated = $updated;
		}	


		public function getBool($checkboxData)
		{
			if($checkboxData == "on")
			{
				return 1;
			} else {
				return 0;
			}
			
		}
		
		
		public function createData($data)
		{
			//Data is taken from the user and used to store in the database. This is the SQL statment that would be used
			$query = "INSERT INTO dataTable (id, name, description, active, created, updated) VALUES ('". $this->id. "', '" . $this->name ."', '" .$this->description;  
			
			$activeCheck = self::getBool($this->active);
			$createdCheck = self::getBool($this->created);
			$updatedCheck = self::getBool($this->updated);
			
			$query .=  "', '" . $activeCheck .  "', '" . $createdCheck .  "', '" . $updatedCheck .  "')";
			
			echo "Dependant on the database, this query would then be used: ";
			echo $query;
		}
		
		public function fetchDataById()
		{
		
			$query = "SELECT * FROM dataTable WHERE id = '" . $this->id . "'";
			//As I don't have a database connection, the following code will be commented out, and dummy data will be put in
			//$db_Connection would have been gotten from db.php
			
			/*
				$rowsWithMatchingLoginName = mysqli_query($db_Connection, $query)
					or die("Something went wrong");
				
				$numRecords = mysqli_num_rows($rowsWithMatchingLoginName);
				
				if ($numRecords == 1)
				{
					$row = mysqli_fetch_array($rowsWithMatchingLoginName);
					
					$this->id = $id
					$this->name = $row["name"];
					$this->description = $row["description"];
					$this->active = $row["active"];
					$this->created = $row["created"];
					$this->updated = $row["updated"];
				} else {
					echo "Something went wrong";
				}
			*/
			
			$this->name = "name";
			$this->description = "description";
			$this->active = 1;
			$this->created = 1;
			$this->updated = 1;
			//Dummy data being added
			
			echo "ID: ";
			echo $this->id;
			echo "\n";
			
			echo "Name: ";
			echo $this->name;
			echo "\n";
			
			echo "Description: ";
			echo $this->description;
			echo "\n";
			
			
			echo "Active:";
			echo $this->active;
			echo "\n";
			
			echo "Created: ";
			echo $this->created;
			echo "\n";
			
			echo "Updated: ";
			echo $this->updated;
			
		}
		
		public function searchData()
		{
		
			//Construction the query based off user input
			$andCheck = 0;
			
			$query = "SELECT * FROM dataTable WHERE ";
			
			if($this->id != '')
			{
				$andCheck = 1;
				$query .= "id = '" . $this->id . "' ";
			}
			
			if($this->name != '')
			{
				if($andCheck == 1)
					$query .= " AND ";
				else 
					$andCheck = 1;
				
				$query .= "name = '" . $this->name ."' ";
			}
			
			if($this->description != '')
			{
				if($andCheck == 1)
					$query .= " AND ";
				else 
					$andCheck = 1;
				
				$query .= "name = '" . $this->description ."' ";
			}
			
			if($this->active != '')
			{
				if($andCheck == 1)
					$query .= " AND ";
				else 
					$andCheck = 1;
				
				$query .= "active = '" . $this->active ."' ";
			}
			
			if($this->created != '')
			{
				if($andCheck == 1)
					$query .= " AND ";
				else 
					$andCheck = 1;
				
				$query .= "created = '" . $this->created ."' ";
			}
			
			if($this->updated != '')
			{
				if($andCheck == 1)
					$query .= " AND ";
				else 
					$andCheck = 1;
				
				$query .= "updated = '" . $this->updated ."' ";
			}
	
				echo $query;
				
			//As I don't have a database connection, the following code will be commented out, and dummy data will be put in
			//$db_Connection would have been gotten from db.php
			
			/*
				$rowsWithMatchingLoginName = mysqli_query($db_Connection, $query)
					or die("Something went wrong");
				
				$numRecords = mysqli_num_rows($rowsWithMatchingLoginName);
				
				echo "<table id='tableFormat'  border = \"1\" align=\"center\">";
	
				echo "<tr>
				<th>id</th>
				<th>name</th>
				<th>description</th>
				<th>active</th>
				<th>created</th>
				<th>updated</th>
				</tr>";


				for($i = 0; $i < $numRows; $i++)
				{
				$row = mysqli_fetch_array($members);
				echo "<tr>";
				echo "<td width='15%'>" .$row["id"]. "</td>";
				echo "<td width='15%'>" .$row["name"]. "</td>";
				echo "<td width='15%'>" .$row["description"]. "</td>";
				echo "<td width='15%'>" .$row["active"]. "</td>";
				echo "<td width='15%'>" .$row["created"]. "</td>";
				echo "<td width='15%'>" .$row["updated"]. "</td>";
				echo "</tr>";
				}
				echo "</table>";
			*/
			
		}	
		
	}


	class dataObjectFactory
	{
		public static function create($id, $name, $description, $active, $created, $updated)
		{
			return new dataObject($id, $name, $description, $active, $created, $updated);
		}
	}


  ?>
