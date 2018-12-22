<?php
	include_once("../classes/Student.php");
	if($_REQUEST['sid']){
		$sid=$_REQUEST['sid'];
		$student = new Student();
		$student->deleteStudent($sid);
	}
//request can be post,get or cookie.
?>