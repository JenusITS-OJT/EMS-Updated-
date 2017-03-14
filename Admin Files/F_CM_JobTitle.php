<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $jobtitle = mysqli_real_escape_string($con, $_GET['jobtitle']);
    $jobcode = mysqli_real_escape_string($con, $_GET['jobcode']);
    $description = mysqli_real_escape_string($con, $_GET['description']);
    $status = mysqli_real_escape_string($con, $_GET['status']);
    $dept = mysqli_real_escape_string($con, $_GET['dept']);
    

//Add

if(empty($id)){
  $sql1 = "SELECT `Job_Title` from `job` where `Job_Title` like '%$jobtitle%' or `Code` = '$jobcode';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_JobTitle4.php?id=failed&msg=$msg");
         }
         else
            {
    $msg = "Added";
    $sql="INSERT INTO `job`
            (
             `Job_Title`,
             `Code`,
             `Description`,
             `Status`,
             `Dept_ID`)
                VALUES (
                        '$jobtitle',
                        '$jobcode',
                        '$description',
                        '$status',
                        '$dept');";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
               }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `job`
                SET 
                  `Job_Title` = '$jobtitle',
                  `Code` = '$jobcode',
                  `Description` = '$description',
                  `Status` = '$status',
                  `Dept_ID` = '$dept'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_JobTitle3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_JobTitle4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>