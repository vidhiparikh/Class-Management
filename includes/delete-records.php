<?php
$manage=$_POST['manage'];
if($manage=="student"){
	include_once("../classes/Student.php");
	if($_REQUEST['sid']){
		$sid=$_REQUEST['sid'];
		$student = new Student();
		$student->deleteStudent($sid);
	}
}
else if($manage=="branch"){
	include_once("../classes/Branch.php");
	if($_REQUEST['id']){
		$bid=$_REQUEST['id'];
		$branch = new Branch();
		$branch->deleteBranch($bid);
	}
}
else if($manage=="subject"){
	include_once("../classes/Subject.php");
	if($_REQUEST['id']){
		$bid=$_REQUEST['id'];
		$subject = new Subject();
		$subject->deleteSubject($bid);
	}
}else if($manage=="semester"){
    include_once("../classes/Semester.php");
    if($_REQUEST['id']){
        $bid=$_REQUEST['id'];
        $semester = new Semester();
        $semester->delete($bid);
    }
}

//request can be post,get or cookie.
?>