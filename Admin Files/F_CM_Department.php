<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id']; 
    $department = mysqli_real_escape_string($con, $_GET['department']);
    $description = mysqli_real_escape_string($con, $_GET['description']);
    $status = mysqli_real_escape_string($con, $_GET['status']);

//Add

if(empty($id)){
    $sql1 = "SELECT `Dept_Name` from `department` where `Dept_Name` like '%$department%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_Department4.php?id=failed&msg=$msg");
         }
         else
            {
    $msg = "Added";
    $sql="INSERT INTO `department`
            (
             `Dept_Name`,
             `Functions`,
             `Status`)
                VALUES (
                        '$department',
                        '$description',
                        '$status');";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `department`
                SET 
                  `Dept_Name` = '$department',
                  `Functions` = '$description',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Department3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Department4.php?id=success&msg=$msg");
            }  
}

mysqli_commit($con); 
?>