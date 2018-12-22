<script>
<?php
$notification_for="";
    if(isset($_GET['op'])){
        $op=$_GET['op'];
        $page=$_GET['page'];
        $p=$_GET['p'];
        switch($page){
            case "student":
                $notification_for="Student";
                break;
            case "branch":
                $notification_for="Branch";
                break;
            case "subject":
                $notification_for="Subject";
                break;
            case "semester":
                $notification_for="Semester";
                break;
        }
        if($op=="ins" && $p=="success"){
    ?>
    toastr.success('<?php echo $notification_for;?> Successfully Inserted','Record Inserted');

<?php
        }elseif($op=="edit" && $p=="update"){
        ?>
        toastr.info('<?php echo $notification_for;?> Successfully Updated','Record Updated');
		
<?php
        }elseif($op=="delete" && $p=="delete"){
        ?>
        toastr.error('<?php echo $notification_for;?> Successfully Deleted','Record Deleted');
<?php
        }
        }
        ?>
</script>

