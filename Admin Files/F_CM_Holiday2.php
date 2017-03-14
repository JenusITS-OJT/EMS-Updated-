<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
//Delete

if(!empty($id)){
    $msg = "Deleted";
        $sql="DELETE 
        from `holidays` 
         WHERE  `id` = '$id'";
        $result = mysqli_query($con, $sql);
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Holiday3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Holiday4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>