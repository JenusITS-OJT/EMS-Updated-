<?php
require ("_Connection.php");

    $msg="";
    $deptid = $_GET['deptid'];
    $id = $_GET['id'];
    $teamname= mysqli_real_escape_string($con, $_GET['teamname']);
    $shift= mysqli_real_escape_string($con, $_GET['shift']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `team`
            (
             `Team_Name`,
             `Shift`,
             `Status`,
             `dept_ID`)
                VALUES (
                        '$teamname',
                        '$shift',
                        '$status',
                        '$deptid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "";
        $sql="UPDATE `team`
                SET
                  `Team_Name` = '$teamname',
                  `Shift` = '$shift',
                  `Status` = '$status'
                WHERE `dept_ID` = '$deptid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: HR_Team.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: HR_Team.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>