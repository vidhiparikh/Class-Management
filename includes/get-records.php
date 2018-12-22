<?php
$manage=$_POST['manage'];
if($manage=="subject"){
    include_once("../classes/Subject.php");
    if($_REQUEST['sid']){
        $sid=$_REQUEST['sid'];
        $semester_id=$_REQUEST['semester_id'];
        $branch_id=$_REQUEST['branch_id'];
        $subject = new Subjectt();
        $subject->getRelatedSubjects($semester_id, $branch_id);
    }
}