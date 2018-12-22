<?php
	include_once("../../classes/Branch.php");
	if($_REQUEST['id']){
		$bid=$_REQUEST['id'];
		$branch = new Branch();
		$branch->deleteBranch($bid);
	}
//request can be post,get or cookie.
?>