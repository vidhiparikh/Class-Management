<?php
	include_once("../../classes/Subject.php");
	if($_REQUEST['id']){
		$bid=$_REQUEST['id'];
		$subject = new Subject();
		$subject->deleteSubject($bid);
	}
//request can be post,get or cookie.
?>