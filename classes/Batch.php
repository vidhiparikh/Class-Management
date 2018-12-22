<?php
include_once("Database.php");
include_once("GeneralFunctions.php");
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 3/4/2018
 * Time: 4:41 PM
 */
class Batch extends GeneralFunctions
{
    private $connection;
    public $recordsPerPage;
    private $tableName;
    public function __construct()
    {
        parent::__construct(); //call to base class constructor
        //Note in C++ or Java whenever we create objectof child class
        //constructor for base class is automatically called.
        //but in PHP it is the responisility of programmer to expilcitly
        //call base class constructor with the help of 'parent' keyword and scope
        //resolution operator
        global $database;
        $this->connection = $database->getConnection();
        $this->recordsPerPage = 2;
        $this->tableName = "batch";
    }
    public function insert($sem)
    {

        $query = "INSERT INTO $this->tableName (sem, created_by,
created_at, updated_at, updated_by, deleted) VALUES (?, ?, ?, ?, ?, ?)";

        $current_date = date("Y-m-d h:i:sa");
        $created_by = $_SESSION['member_id'];
        $updated_by = 1;
        $deleted = 0;

        $preparedStatement = $this->connection->prepare($query);
        $preparedStatement->bind_param("sissii", $sem, $created_by, $current_date, $current_date, $updated_by, $deleted);
        if ($preparedStatement->execute()) {
            return $this->connection->insert_id;
        } else {
            die("error while inserting record in $this->tableName");
        }
    }

    public function delete($id)
    {
        $current_date = date("Y-m-d h:i:sa");
        $deleted = 1;
        $deleted_by = $_SESSION['member_id'];
        $query = "UPDATE $this->tableName SET deleted = $deleted, deleted_at = '$current_date', deleted_by = '$deleted_by' WHERE id = $id";
        $this->connection->query($query);
    }


    public function getDetailsByID($id){
        return($this->getAllDetailsByID($this->tableName, $id));
    }

    public function update($id, $sem)
    {

        $query = "UPDATE $this->tableName SET sem = ?,
updated_at = ?, updated_by = ? WHERE id = ?";
        $current_date = date("Y-m-d h:i:sa");
        $updated_by = 1;

        $preparedStatement = $this->connection->prepare($query);
        $preparedStatement->bind_param("ssii", $sem,
            $current_date, $updated_by, $id);

        if ($preparedStatement->execute()) {
            return true;
        } else {
            die("ERROR WHILE UPDATING Batch");
        }
    }
    public function displayRecordsWithPagination($records_per_page){

        echo "<table class='table'>
                <thead class='thead-light'>
                <tr>
                    <th>#</th>
                    <th>Batch Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>";
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }
        if ($page == "" || $page == 1) {
            $limit_start = 0;
        } else {
            $limit_start = ($page * $records_per_page) - $records_per_page;
        }

        $condition = "";
        if(isset($_POST['key'])){
            $key = $_POST['key'];
            $condition = "AND (sem like '%$key%') ";
        }

        $total_records = $this->getTotalRecordsCountWithCondition($this->tableName, $condition);
        $num_of_pages = ceil($total_records / $records_per_page);

        $condition = $condition . "LIMIT $limit_start, $records_per_page";
        $result_set = $this->readAllRecordsWithCondition($this->tableName, $condition);

        $sr_no = $records_per_page * $page - $records_per_page + 1;
        while ($row = mysqli_fetch_assoc($result_set)) {
            $id = $row['id'];
            ?>
            <tr>
                <th scope="row"><?php echo $sr_no; ?></th>
                <td><?php echo $row['sem']; ?></td>
                <td>
                    <div class="button-list">
                        <a type="button" class="btn btn-icon waves-effect waves-light btn-purple"
                           data-toggle="tooltip" title="Edit Batch!"
                           href="batch.php?q=edit&id=<?php echo $id; ?>"> <i
                                class="fa fa-pencil"></i> </a>
                        <a type="button"
                           class="btn btn-icon waves-effect waves-light btn-danger delete-record"
                           data-toggle="tooltip" title="Delete Batch!"
                           data-record-id="<?php echo $id; ?>"> <i class="fa fa-remove"></i> </a>
                    </div>
                </td>
            </tr>
            <?php
            $sr_no++;
        } //end of while
        ?>
        </tbody>
        </table>
        <hr>
        <ul class="pagination justify-content-end pagination-split mt-0">
            <?php
            $li_class = "page-item";
            $a_class = "page-link";
            $li_active_class = $li_class . " active";
            $page_num = $page == 1 ? 1 : $page - 1;
            echo "<li class='$li_class'><a class='$a_class' onclick='paginationLinkClicked($page_num)'>&lt;&lt;</a></li>";
            for ($i = 1; $i <= $num_of_pages; $i++) {
                if ($i == $page)
                    echo "<li class='$li_active_class'><a class='$a_class' onclick='paginationLinkClicked($i)'>$i</a></li>";
                else
                    echo "<li class='$li_class'><a  class='$a_class' onclick='paginationLinkClicked($i)'>$i</a></li>";
            }
            $page_num = $page == $num_of_pages ? $num_of_pages : $page + 1;
            echo "<li class='$li_class'><a class='$a_class' onclick='paginationLinkClicked($page_num)'>&gt;&gt;</a></li>";
            ?>


        </ul>
        <?php
    }//end of function
    public function populateBatches(){
        $result=$this->readRecords($this->tableName);
        $options="";
        while($row = mysqli_fetch_assoc($result)){
            extract($row);
            $options .= "<option value= '$id'>$batch_name</option>";
        }
        echo $options;
    }
}//end of class