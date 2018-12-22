<?php
	$manage=$_POST['manage'];
	if($manage=="student"){
	require_once("../classes/Student.php");
	$student= new Student();
	if(isset($_POST['rows'])){
		$numRows=$_POST['rows'];
		if($numRows==0){
			$numRows=$student->studentPerPage;
		}
	}
	$student->displayStudentWithPagination($numRows);
}
else if($manage=="branch"){
	require_once("../classes/Branch.php");
$branch= new Branch();
if(isset($_POST['rows'])){
	$numRows=$_POST['rows'];
	if($numRows==0){
		$numRows=$branch->recordsPerPage;
	}
}
$branch->displayRecordsWithPagination($numRows);

}
else if($manage=="subject"){
	require_once("../classes/Subject.php");
$subject= new Subject();
if(isset($_POST['rows'])){
	$numRows=$_POST['rows'];
	if($numRows==0){
		$numRows=$subject->recordsPerPage;
	}
}
$subject->displayRecordsWithPagination($numRows);

}
else if($manage=="semester"){
    require_once("../classes/Semester.php");
    $semester= new Semester();
    if(isset($_POST['rows'])){
        $numRows=$_POST['rows'];
        if($numRows==0){
            $numRows=$semester->recordsPerPage;
        }
    }
    $semester->displayRecordsWithPagination($numRows);
}
else if($manage=="addBatch") {
    if(isset($_POST['data'])){
        $data = $_POST['data'];
        if ($data == "branch") {
            require_once("../classes/Branch.php");
            $branch = new Branch();
            $options = "<option value='select'>Select Branch</option>";
            echo $options;
            return ($branch->populateBranches());
        } else if ($data == "semester") {
            require_once("../classes/Semester.php");
            $semester = new Semester();
            $options = "<option value='select'>Select Semester</option>";
            echo $options;
            return ($semester->populateSemesters());
        }
    }
}
?>