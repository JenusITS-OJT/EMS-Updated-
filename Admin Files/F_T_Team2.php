<?php
require ("_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $deptid = $_GET['Dept_ID'];

//Delete

if(!empty($id)){
    $msg = "Deleted";
        $sql="DELETE 
        from `team` 
         WHERE  `id` = '$id'";
        $result = mysqli_query($con, $sql);
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: HR_Team3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: HR_Team4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>