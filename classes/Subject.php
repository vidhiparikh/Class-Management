<?php
	include_once("Database.php");
    require_once("Session.php");
	include_once("GeneralFunctions.php");
	class Subject extends GeneralFunctions{
		private $connection;
		public $recordsPerPage;
		private $tableName;
		public function __construct(){
			//this is used to explicitly call the base class constructor
			//because php khudse parent class constructor ko call nai karta
			//unlike java or c++
			parent::__construct();
			global $database;
			$this->connection=$database->getConnection();
			$this->recordsPerPage=2;
			$this->tableName="subjects";
            if(!isset($_SESSION['login'])){
                session_start();
            }
		}
		public function readSubject(){
			$result_set = $this->connection->query("SELECT * FROM Subject");
			return $result_set;
		}
		public function insert($subject_fees, $subject_name, $semester_id, $branch_id){
			$query = "INSERT INTO $this->tableName (subject_name, subject_fees, semester_id, branch_id, created_by, created_at) VALUES(?, ?, ?, ?, ?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$created_by=$_SESSION['member_id'];
			$deleted=0;
			$preparedStatement->bind_param("ssiiis", $subject_name, $subject_fees, $semester_id, $branch_id, $created_by, $current_date);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE INSERTING Subject ".$this->connection->error);
			}
			
		}
		public function getSubjectDetailsById($id){
			return($this->getAllDetailsById($this->tableName, $id));
		}
		
		public function update($id,$subject_fees, $subject_name){
			$query = "UPDATE $this->tableName SET subject_fees = ?, subject_name = ?, updated_at = ?, updated_by = ? WHERE id=?";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$current_date=date("Y-m-d h:i:sa");
			$updated_by=$_SESSION['member_id'];
			$deleted=0;
			$preparedStatement->bind_param("ssssi", $subject_fees, $subject_name, $current_date, $updated_by, $id);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE UPDATING BRANCH ".$this->connection->error);
			}
			
		}
		
		public function deleteSubject($bid){
			$current_date = date("Y-m-d h:i:sa");
			$deleted=1;
			$deleted_by=$_SESSION['member_id'];
			$sql="UPDATE subjects SET deleted = $deleted, deleted_at= '$current_date', deleted_by=$deleted_by WHERE id=$bid";
			$this->connection->query($sql);
		}
		
		
		public function displayRecordsWithPagination($records_per_page){
			echo "<table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Subject Fees</th>
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
                                $limit_start = ($page * $records_per_page) - $records_per_page;
                            }
							$condition="";
							if(isset($_POST['key'])){
								$key=$_POST['key'];
								$condition="AND (subject_name like '%$key%' or subject_fees like '%$key%') ";
							}
                            $total_records = $this->getTotalRecordsCountWithCondition($this->tableName, $condition);
                            $num_of_pages = ceil($total_records/$records_per_page);
							$condition=$condition." LIMIT $limit_start, $records_per_page";
                            $result_set = $this->readAllRecordsWithCondition($this->tableName, $condition);

                            $sr_no = $records_per_page * $page - $records_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                                $id = $row['id'];
								?>
                                <tr>
									<th scope="row"><?php echo $sr_no; ?></th>
                                    <td><?php echo $row['subject_name']; ?></td>
                                    <td class="subject_fees"><?php echo $row['subject_fees']; ?></td>
                                    <td>
                                        <div class="button-list">
                                            <a type="button" class="btn btn-icon waves-effect waves-light btn-purple"
                                               data-toggle="tooltip" title="Edit Subject!"
                                               href="subject.php?q=edit&id=<?php echo $id; ?>"> <i
                                                    class="fa fa-pencil"></i> </a>
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger delete-record"
                                               data-toggle="tooltip" title="Delete Subject!"
                                               data-record-id="<?php echo $id; ?>"> <i class="fa fa-remove"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $sr_no++;
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
                            echo "<li class='$li_class'><a href='subject.php?page=$page_num' class='$a_class'onclick='paginationLinkClicked($page_num)'>&lt;&lt;</a></li>";
                            for($i=1; $i<=$num_of_pages; $i++) {
                                if($i==$page)
                                    echo "<li class='$li_active_class'><a class='$a_class' onclick='paginationLinkClicked($i)' >$i</a></li>";
                                else
                                    echo "<li class='$li_class'><a class='$a_class' onclick='paginationLinkClicked($i)'>$i</a></li>";
                            }
                            $page_num = $page==$num_of_pages?$num_of_pages:$page+1;
                            echo "<li class='$li_class'><a class='$a_class'onclick='paginationLinkClicked($page_num)'>&gt;&gt;</a></li>";
                            ?>


                        </ul>
        <?php
 
		}
        public function getRelatedSubjects($semester_id, $branch_id){
            $result = $this->connection->query("SELECT * FROM subjects where semester_id=$semester_id or branch_id=$branch_id and deleted=0");
            $options="";
            while($row = mysqli_fetch_assoc($result)){
                extract($row);
                $options .= "<option value= '$id'>$subject_name</option>";
            }
            echo $options;
        }
		
	}
	?>
	
