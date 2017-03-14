<?php
require ("F_Connection.php");

    $msg="";
    $id= mysqli_real_escape_string($con, $_GET['id']);
    $rec= mysqli_real_escape_string($con, $_GET['rec']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

    /*$id = $_GET['id'];
    $status= $_GET['status'];*/

    $sql="SELECT
                  s.`DATE`, 
                  DATE_FORMAT(s.`DATE`,'%W'),
                  s.`ID` as schedid,
                  t. `ID` as timeid
                    FROM `schedule` AS s
                    LEFT JOIN `time` AS t
                    ON s.`Emp_ID` = t.`User_ID` AND DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(t.`Time_In`,'%M %d, %Y')
                    WHERE DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(NOW(),'%M %d, %Y') AND s.`Emp_ID` = '$id'";
                    $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              $date = $row[0];
              $day = $row[1];
              $schedid = $row[2];
              $timeid = $row[3];    

//Add

if(!empty($id)){  
    $msg = "Added";
    $sql="INSERT INTO `attendance`
            (
             `Date`,
             `Day`,
             `Hours`,
             `Status`,
             `Emp_ID`,
             `Schedule_ID`,
             `Time_ID`
             )
                VALUES (
                        '$date',
                        '$day',
                        '$rec',
                        '$status',
                        '$id',
                        '$schedid',
                        '$timeid');";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_ManageAttendance3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_ManageAttendance4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>