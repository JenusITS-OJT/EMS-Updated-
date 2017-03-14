<?php
require ("_Connection.php");

    $msg="";
    
    $id = $_GET['id'];
    $teamname= mysqli_real_escape_string($con, $_GET['teamname']);
    $shift= mysqli_real_escape_string($con, $_GET['shift']);
    $status= mysqli_real_escape_string($con, $_GET['status']);
    $dept = mysqli_real_escape_string($con, $_GET['department']);

if(empty($id)){
    $sql1 = "SELECT `Team_Name` from `team` where `Team_Name` like '%$teamname%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: HR_Team4.php?id=failed&msg=$msg");
         }
         else
            {
        $msg = "Added";
         $sql="INSERT INTO `team`
            (
             `Team_Name`,
             `Shift`,
             `Status`,
             `Dept_ID`)
                VALUES (
                        '$teamname',
                        '$shift',
                        '$status',
                        '$dept'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "";
        $sql="UPDATE `team`
                SET
                  `Team_Name` = '$teamname',
                  `Shift` = '$shift',
                  `Dept_ID` = '$dept',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: HR_Team3.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: HR_Team4.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>