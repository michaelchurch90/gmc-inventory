<?php
include_once 'User.php';
class Database
{
	private $connection;

/*
	private $SERVER = 'localhost';
	private $USERNAME = 'root';
	private $PASSWORD = 'sports11.';
	private $DATABASE = 'gmc_inventory';
	/*/
	
		private $SERVER = 'cs2.gcsu.edu';
	private $USERNAME = 'mchurch2';
	private $PASSWORD = 'sports11.';
	private $DATABASE = 'gmc_inventory';
	
	public function __construct()
	{
		//make sure only one instance of connection is established
	
		$this->connection= mysql_connect($this->SERVER,$this->USERNAME, $this->PASSWORD);
	

		
		if (mysqli_connect_errno($this->connection))
  		{
  			echo "(In Database Constructor) Failed to connect to MySQL: " . mysqli_connect_error();
  		}
		mysql_select_db($this->DATABASE,$this->connection);
	}
	
	//still need to check for connection errors
	public function queryForResult($query)
	{
		 if(!($result = mysql_query($query,$this->connection)))
		 {
			 die('Error: '.mysql_error());
		 }
		 if(mysql_num_rows($result)>0)
		 {
		 $attributeObject = mysql_fetch_assoc($result);
		 $attributes = array_keys($attributeObject);
		 $tupples = array();
		 mysql_data_seek($result,0);
		 for($i=0;$i<mysql_num_rows($result);$i++)
		 {
			 $row = mysql_fetch_row($result);
			 array_push($tupples,$row);
	     }
		 
		$returnTable = new DatabaseTable($attributes,$tupples);
		 }
		 else
		 { 
		 $attributes = array("Data");
		 
		 //need to make a two demensional array for output to work correctly
		 $tuples = array(array("None found"));
		 $returnTable = new DatabaseTable($attributes,$tuples,FALSE);
		 }
		 
		return $returnTable;
	}
			//still need to check for connection errors
	public function query($query)
	{
		
		 $escQuery = $query;
		 if(!mysql_query($escQuery,$this->connection))
		 {
			 die('Error: '. mysql_error());
		 }

	}
	
	public function __toString()
	{
		return "$this->SERVER $this->USERNAME $this->PASSWORD $this->DATABASE";
	}
	
	//gets a user from the database and returns type User or Admin (Admin sublcass of User)
	public function getUser($UserName, $Password)
	{
		
		$query = sprintf("SELECT isAdmin,fName,lName,email FROM users WHERE UserName='%s' AND password = '%s'",
										mysql_real_escape_string($UserName),mysql_real_escape_string($Password));
		$result = $this->queryForResult($query);
		if($result->hasData==FALSE)
		{
		return FALSE;
		}
		elseif($result->tuples[0][0]==TRUE)
		{
			//echo $result->tuples[0][0];
			//echo "made admin";
		$returnUser = new Admin($UserName,$Password,$result->tuples[0][1],$result->tuples[0][2],$result->tuples[0][3]);
		}
		elseif ($result->tuples[0][0]==FALSE)
		{
			//echo $result->tuples[0][0];
			//echo "made user";
		$returnUser = new User($UserName,$Password,$result->tuples[0][1],$result->tuples[0][2],$result->tuples[0][3]);
		}
		else echo "Wrong Database value for isAdmin: talk to database administrator";
		
		return $returnUser;
		
	}
	public function updateUser($username,$newPassword,$email)
	{
		$query = sprintf("UPDATE users SET password='%s' , email='%s' WHERE UserName='%s'",
		 
			mysql_real_escape_string($newPassword), 
			mysql_real_escape_string($email), 
			mysql_real_escape_string($username));
			$this->query($query);	
	}
	public function getAnnouncements()
	{
		$query = "SELECT Date, content AS Announcements FROM announcements ORDER BY Date DESC LIMIT 10";
		$table = $this->queryForResult($query);
		return $table;
	}
	
	public function searchInventory($invNumber='',$campus='',$dept='',$assignedTo='',$manufacturer='' ,$model='' ,$serialNum='',$lanMAC='',$wanMAC='')
	{
		$query = sprintf("
			SELECT * FROM inventory 
			WHERE ID LIKE '%%%s%%' 
			AND Campus LIKE '%%%s%%' 
			AND Department LIKE '%%%s%%' 
			AND  Assigned LIKE '%%%s%%'
			AND Manufacturer LIKE '%%%s%%'
			AND Model LIKE '%%%s%%'
			AND SerialNum LIKE '%%%s%%'
			AND LAN_MAC LIKE '%%%s%%'
			AND WLAN_MAC LIKE '%%%s%%'",
			mysql_real_escape_string($invNumber),
			mysql_real_escape_string($campus),
			mysql_real_escape_string($dept),
			mysql_real_escape_string($assignedTo ),
			mysql_real_escape_string($manufacturer), 
			mysql_real_escape_string($model),
			mysql_real_escape_string($serialNum),
			mysql_real_escape_string($lanMAC),
			mysql_real_escape_string($wanMAC));
			
			$result = $this->queryForResult($query);
			return $result;
	}
	
	public function getCampuses()
	{
		
		$query = "SELECT Name FROM campus";
		$result = $this->queryForResult($query);
		return $result;
	}
	
	public function getDepartments()
	{
		$query = "SELECT Name FROM department";
		$result = $this->queryForResult($query);
		return $result;
	}
	
	public function InsertInventory($assignedTo,$campus,$item,$dept,$manufacturer ,$model ,$serialNum,$lanMAC,$wanMAC,$status,$comment)
	{

		$query = sprintf("INSERT INTO inventory (Assigned, Department, Campus, Item,Manufacturer, Model, SerialNum, LAN_MAC, WLAN_MAC,Status,Comment) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		mysql_real_escape_string($assignedTo),
		mysql_real_escape_string($dept),
		mysql_real_escape_string($campus),
		mysql_real_escape_string($item),
		mysql_real_escape_string($manufacturer) ,
		mysql_real_escape_string($model) ,
		mysql_real_escape_string($serialNum),
		mysql_real_escape_string($lanMAC),
		mysql_real_escape_string($lanMAC),
		mysql_real_escape_string($status),
		mysql_real_escape_string($comment));
		
		$this->query($query);
	}
	
	public function addAnnouncement($announcement)
	{
		$query = sprintf("INSERT INTO announcements (Content) VALUES ('%s')", mysql_real_escape_string($announcement));
		$this->query($query);
	}
	public function adminAddUser($UserName, $Password, $IsAdmin,$fName,$lName, $email)
	{
		$query = sprintf("INSERT INTO users VALUES ('%s','%s',%s,'%s','%s','%s')",
			mysql_real_escape_string($UserName),
			 mysql_real_escape_string($Password),
			  mysql_real_escape_string($IsAdmin),
			  mysql_real_escape_string($fName),
			 mysql_real_escape_string($lName), 
			 mysql_real_escape_string( $email));			 
			 $this->query($query);
	}
	public function AddCampus($campus)
	{
		$query = sprintf("INSERT INTO campus (Name) VALUES ('%s')",  mysql_real_escape_string($campus));
		$this->query($query);
	}
		public function AddDepartment($department)
	{
		$query = sprintf("INSERT INTO department (Name) VALUES ('%s')",  mysql_real_escape_string($department));
		$this->query($query);
	}
	
	public function AdminRemoveDepartment($department)
	{
		$query = sprintf("DELETE FROM department WHERE Name = '%s'",
			mysql_real_escape_string($department));
		$this->query($query);
	}
	
	public function AdminChangePassword($username, $password)
	{
		$query = sprintf("UPDATE users SET password='%s' WHERE UserName='%s'",mysql_real_escape_string($password),mysql_real_escape_string($username));
		$this->query($query);
	}
	
	public function AdminChangeEmail($username, $email)
	{
		$query = sprintf("UPDATE users SET email='%s' WHERE UserName='%s'",
		mysql_real_escape_string($email),
		mysql_real_escape_string($username));	
		$this->query($query);
	}
	public function AdminRemoveUser($user)
	{
		$query = sprintf("DELETE FROM users WHERE UserName = '%s'",
			mysql_real_escape_string($user));
		$this->query($query);
	}
	
	public function getUsers($getAdmin=TRUE)
	{
		//echo '<option value="jsmith">jsmith</option>';
		$query = "SELECT UserName FROM users";
		if($getAdmin==FALSE)
		$query.=" WHERE UserName NOT LIKE 'root'";
		$result = $this->queryForResult($query);
		return $result;
	}
		public function UpdateInventory($assignedTo,$campus,$item,$dept,$manufacturer ,$model ,$serialNum,$lanMAC,$wanMAC,$Status,$Comment,$ID)
	{
	//	INSERT INTO inventory (AssignTo, Department, Campus, item,Manufacturer, Model, SerialNum, LAN_MAC, WLAN_MAC) VALUES ('Bill', '0', '0', 'A thing', 'Dell', 'Model2', '002', 'asdf', 'fdas');

		$query = sprintf("UPDATE inventory SET Assigned='%s', Campus='%s', Department='%s', Item='%s',Manufacturer='%s', Model='%s', SerialNum='%s', LAN_MAC='%s', WLAN_MAC='%s',Status='%s',Comment='%s' WHERE ID=%s",
		mysql_real_escape_string($assignedTo),
		mysql_real_escape_string($campus),
		mysql_real_escape_string($dept),
		mysql_real_escape_string($item),
		mysql_real_escape_string($manufacturer) ,
		mysql_real_escape_string($model) ,
		mysql_real_escape_string($serialNum),
		mysql_real_escape_string($lanMAC),
		mysql_real_escape_string($wanMAC),
		mysql_real_escape_string($Status),
		mysql_real_escape_string($Comment),
		mysql_real_escape_string($ID));
		
		$this->query($query);
	}
}


class DatabaseTable
{
	public $attributes;
	public $tuples;	
	public $hasData;
	public function __construct($att, $tup,$found=TRUE)
	{
		$this->attributes = $att;
		$this->tuples=$tup;
		$this->hasData=$found;
	}
	
	public function toTable()
	{
		echo '<table>';
		echo '<thead>';
		echo '<tr>';		
		for($i=0;$i<count($this->attributes);$i++)
		{
			echo '<th>';
			echo $this->attributes[$i];
			echo '</th>';
		}
		echo '</tr>';
		echo '</thead>';
		for($i=0;$i<count($this->tuples);$i++)
		{
			echo '<tr class="highlightable">';
			$row = $this->tuples[$i];
			for($j=0;$j<count($row);$j++)
			{
				echo '<td>'.$row[$j].'</td>';
			}
			
			echo '</tr>';
		}
		
		echo '</table>';
	}
	
	public function getOptionList($valueIndex=0,$outputIndex=0)
	{
		//echo '<option value="milledgeville">'.count($this->tuples).'</option>';
		$option='';
		for($i=0;$i<count($this->tuples);$i++)
		{
			
			$option .= sprintf("<option value='%s'>%s</option>",$this->tuples[$i][$valueIndex],$this->tuples[$i][$outputIndex]);
		}
		return $option;
	}
	

}



/*
$db = new Database();
$table = $db->queryForResult('SELECT * FROM users;');
$table->toTable();

$db->getUser('root','password');
*/

?>