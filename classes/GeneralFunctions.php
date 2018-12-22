<?php
		include_once("Database.php");
class GeneralFunctions{
		private $connection;
		public function __construct(){
			global $database;
			$this->connection=$database->getConnection();
		}
			public function getTotalRecordCount($tableName){
				$sql = "SELECT count(*) AS total_count from $tableName WHERE deleted=0";
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of students");
				}
		}
		
		public function getTotalRecordsCountWithCondition($tableName,$condition){
				$sql = "SELECT count(*) AS total_count from $tableName WHERE deleted=0 ".$condition;
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of records");
				}
		}
		public function readRecords($tableName){
			$result_set = $this->connection->query("SELECT * FROM $tableName WHERE deleted =0");
			return $result_set;
		}	
		public function readAllRecordsWithCondition($tableName,$condition)
    	{
        	$result_set = $this->connection->query("SELECT * FROM $tableName WHERE deleted = 0 ".$condition);
        	return $result_set;
		}
		public function getAllDetailsById($tableName, $id){
			$sql="Select * FROM $tableName where id=$id";
			$result_set=$this->connection->query($sql);
			if($this->connection->error){
				echo $this->connection->error;
			}
			return($result_set);
		}

}
?>