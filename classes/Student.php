<?php
	include_once("Database.php");
	require_once("Session.php");

	/*SCHEMA OF STUDENT TABLE
	`sid`, `student_first_name`, `student_last_name`, `student_email`, `student_number`, `student_address`, `student_branch`, `student_dob`, `student_college`, `student_gender`, `stream_id`, `created_at`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`*/
	class Student{
		private $connection;
		public $studentPerPage;
		public function __construct(){
			global $database;
			$this->connection=$database->getConnection();
			$this->studentPerPage=2;
			if(!isset($_SESSION['login'])){
			    session_start();
            }

		}
		public function readStudents(){
			$result_set = $this->connection->query("SELECT * FROM Student WHERE deleted =0");
			return $result_set;
		}	
		public function insertStudent($student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id){
			$query = "INSERT INTO student (student_first_name, student_last_name, student_email, student_number, student_address, student_branch, student_dob, student_college, student_gender, stream_id, created_by, created_at, updated_at, updated_by, deleted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=$_SESSION['member_id'];
			$created_by=$_SESSION['member_id'];
			$deleted=0;
			$preparedStatement->bind_param("sssssisssiissii", $student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id, $created_by, $current_date, $current_date, $updated_by, $deleted);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE INSERTING STUDENT ".$this->connection->error);
			}
			
		}
		
		
		public function updateStudent($sid,$student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id){
			$query = "UPDATE student SET student_first_name = ?, student_last_name = ?, student_email = ?, student_number = ?, student_address = ?, student_branch =?, student_dob = ?, student_college = ?, student_gender = ?, stream_id = ?, updated_at = ?, updated_by = ? WHERE sid = ?";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=$_SESSION['member_id'];
			$deleted=0;
			$preparedStatement->bind_param("sssssisssisii", $student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id, $current_date, $updated_by, $sid);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE UPDATING STUDENT ".$this->connection->error);
			}
			
		}
		public function linkWithGuardian($sid,$pid){
			$query="INSERT INTO Guardian (sid,pid) VALUES(?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$preparedStatement->bind_param("ii",$sid,$pid);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE LINKING WITH GUARDIAN ".$this->connection->error);
			}
		}
		
		public function getAllDetailsOfAStudent($sid){
			$sql="Select * FROM student where sid=$sid";
			$result_set=$this->connection->query($sql);
			if($this->connection->error){
				echo $this->connection->error;
			}
			return($result_set);
		}
		
		public function deleteStudent($sid){
			$current_date = date("Y-m-d h:i:sa");
			$deleted=1;
			$deleted_by=$_SESSION['member_id'];
			$sql="UPDATE student SET deleted = $deleted, deleted_at= '$current_date', deleted_by=$deleted_by WHERE sid=$sid";
			$this->connection->query($sql);
			$sql="UPDATE parents SET deleted=$deleted, deleted_at='$current_date', deleted_by=$deleted_by WHERE pid in (SELECT pid FROM guardian WHERE sid=$sid)";
			$this->connection->query($sql);
		}
		
		public function getTotalStudentCount(){
				$sql = "SELECT count(*) AS total_count from student WHERE deleted=0";
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of students");
				}
		}
		
		public function getTotalStudentCountWithCondition($condition){
				$sql = "SELECT count(*) AS total_count from student WHERE deleted=0 ".$condition;
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of students");
				}
		}
		public function readAllStudentsWithCondition($condition)
    	{
        	$result_set = $this->connection->query("SELECT * FROM student WHERE deleted = 0 ".$condition);
        	return $result_set;
		}
	
		public function displayStudentWithPagination($student_per_page){
			echo "<table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Phone Number</th>
                                <th>Batch</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>";
                            if(isset($_POST['page'])){
                                $page = $_POST['page'];
                            }else{
                                $page=1;
                            }
                            if($page=="" || $page == 1){
                                $limit_start = 0;
                            }else{
                                $limit_start = ($page * $student_per_page) - $student_per_page;
                            }
							$condition="";
							if(isset($_POST['key'])){
								$key=$_POST['key'];
								$condition="AND (student_first_name like '%$key%' or student_last_name like '%$key%' or student_number like '%$key%') ";
							}
                            $total_student = $this->getTotalStudentCountWithCondition($condition);
                            $num_of_pages = ceil($total_student/$student_per_page);
							$condition=$condition." LIMIT $limit_start, $student_per_page";
                            $result_set = $this->readAllStudentsWithCondition($condition);

                            $id = $student_per_page * $page - $student_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                                $sid = $row['sid'];
								?>
                                <tr>
									<th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $row['student_first_name'] . " " . $row['student_last_name']; ?></td>
                                    <td><?php echo $row['student_number']; ?></td>
                                    <td>Vacation Batch</td>
                                    <td>
                                        <div class="button-list">
                                            <a type="button" class="btn btn-icon waves-effect btn-light"
                                               data-toggle="tooltip" title="View Student!"
                                               href="student.php?q=view&sid=<?php echo $sid; ?>"> <i
                                                    class="fa fa-eye"></i> </a>
                                            <a type="button" class="btn btn-icon waves-effect waves-light btn-purple"
                                               data-toggle="tooltip" title="Edit Student!"
                                               href="student.php?q=edit&sid=<?php echo $sid; ?>"> <i
                                                    class="fa fa-pencil"></i> </a>
                                            <a type="button" class="btn btn-icon waves-effect waves-light btn-pink"
                                               data-toggle="tooltip" title="Update Course Details!"> <i
                                                    class="fa fa-file"></i> </a>
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger delete-student"
                                               data-toggle="tooltip" title="Delete Student!"
                                               data-student-id="<?php echo $sid; ?>"> <i class="fa fa-remove"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $id++;
                            }//end of while
                            ?>
                            </tbody>
                        </table>
                        <hr>
                        <ul class="pagination justify-content-end pagination-split mt-0">
                            <?php
                            $li_class= "page-item";
                            $a_class = "page-link";
                            $li_active_class = $li_class." active";
                            $page_num = $page==1?1:$page-1;
                            echo "<li class='$li_class'><a href='student.php?page=$page_num' class='$a_class'onclick='studentPaginationLinkClicked($page_num)'>&lt;&lt;</a></li>";
                            for($i=1; $i<=$num_of_pages; $i++) {
                                if($i==$page)
                                    echo "<li class='$li_active_class'><a class='$a_class' onclick='studentPaginationLinkClicked($i)' >$i</a></li>";
                                else
                                    echo "<li class='$li_class'><a class='$a_class' onclick='studentPaginationLinkClicked($i)'>$i</a></li>";
                            }
                            $page_num = $page==$num_of_pages?$num_of_pages:$page+1;
                            echo "<li class='$li_class'><a class='$a_class'onclick='studentPaginationLinkClicked($page_num)'>&gt;&gt;</a></li>";
                            ?>


                        </ul>
        <?php
 
		}
		
	}
	?>