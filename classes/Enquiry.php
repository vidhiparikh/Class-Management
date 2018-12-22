 <?php
	include_once("Database.php");
	class Enquiry{
		private $connection;
		public function __construct(){
			global $database;
			$this->connection=$database->getConnection();
		}
		public function readEnquiry(){
			$result_set = $this->connection->query("SELECT * FROM Enquiry");
			return $result_set;
		}	
		public function insertEnquiry($student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream, $reference, $date_of_enquiry, $comments, $handeled_by, $college_name){
			$query = "INSERT INTO enquiry (student_first_name, student_last_name, student_email, student_number, student_branch, student_sem, stream, reference, date_of_enquiry, comments, handeled_by, college_name, created_at, updated_at, updated_by, deleted, admitted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=1;
			$deleted=0;
			$admitted=1;
			$preparedStatement->bind_param("ssssiiisssisssiii", $student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream, $reference, $date_of_enquiry, $comments, $handeled_by, $college_name, $current_date, $current_date, $updated_by, $deleted, $admitted);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE INSERTING ENQUIRY ".$this->connection->error);
			}
			
		}
		
		public function getAllDetailsOfAnEnquiry($id){
			$sql="Select * from enquiry where id=$id";
			$result_set=$this->connection->query($sql);
			if($this->connection->error){
				echo $this->connection->error;
			}
			else
				return $result_set;
		}
		
		public function updateEnquiry($id,$student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream, $reference, $date_of_enquiry, $comments, $handeled_by, $college_name){
			$query = "UPDATE enquiry SET student_first_name = ?, student_last_name =?, student_email =?, student_number = ?, student_branch = ?, student_sem = ?, stream = ?, reference = ?, date_of_enquiry = ?, comments = ?, handeled_by = ?, college_name = ?, updated_at = ?, updated_by = ?,  admitted = ? WHERE id = ?";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=1;
			$deleted=0;
			$admitted=1;
			$preparedStatement->bind_param("ssssiiisssissiii",$student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream, $reference, $date_of_enquiry, $comments, $handeled_by, $college_name, $current_date, $updated_by, $admitted,$id);
			if($preparedStatement->execute()){
				return $this->connection->update_id;
			}
			else{
				die("ERROR WHILE UPDATING ENQUIRY ".$this->connection->error);
			}
			
		}
	}
?>																		