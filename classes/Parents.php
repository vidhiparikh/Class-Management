<?php
	include_once("Database.php");
	class Parents{
		private $connection;
		public function __construct(){
			global $database;
			$this->connection=$database->getConnection();
		}
		public function readAllParent(){
			$result_set = $this->connection->query("SELECT * FROM parents");
			return $result_set;
		}
		
		public function insertParentDetails($parent_first_name, $parent_number, $parent_email, $parent_gender){
			$query="INSERT INTO parents (parent_first_name, parent_number, parent_email, parent_gender, created_by, created_at, updated_at, updated_by, deleted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=$_SESSION['member_id'];
			$created_by=$_SESSION['member_id'];
			$deleted=0;
			$preparedStatement->bind_param("ssssissii",$parent_first_name, $parent_number, $parent_email, $parent_gender, $created_by, $current_date, $current_date, $updated_by, $deleted);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE INSERTING PARENT");
			}
		}
		public function updateParentDetails($pid, $parent_first_name, $parent_number, $parent_email){
			$query="UPDATE parents SET parent_first_name = ?, parent_number = ?, parent_email = ?, updated_at = ?, updated_by = ? WHERE pid = ?";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=1;
			$deleted=0;
			$preparedStatement->bind_param("ssssii",$parent_first_name, $parent_number, $parent_email, $current_date, $updated_by, $pid);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE UPDATING PARENT");
			}
		}

		public function getFatherDetails($sid){
			$sql="SELECT * FROM parents WHERE pid in (SELECT pid FROM guardian WHERE sid =$sid)";
			$result_set=$this->connection->query($sql);
			while($row=mysqli_fetch_assoc($result_set)){
				if($row['parent_gender'] == "Male"){
					return $row;
				}	
			}
		}
		
		public function getMotherDetails($sid){
			$sql="SELECT * FROM parents WHERE pid in (SELECT pid FROM guardian WHERE sid =$sid)";
			$result_set=$this->connection->query($sql);
			while($row=mysqli_fetch_assoc($result_set)){
				if($row['parent_gender'] == "Female"){
					return $row;
				}	
			}
		}
	}
?>