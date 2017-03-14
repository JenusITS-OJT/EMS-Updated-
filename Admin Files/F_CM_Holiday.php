<?php
require ("F_Connection.php");

    $msg="";
    
    $id = $_GET['id'];
    $holiday= mysqli_real_escape_string($con, $_GET['holiday']);
    $holidate= mysqli_real_escape_string($con, $_GET['datepicker']);
    $holitype= mysqli_real_escape_string($con, $_GET['holitype']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

if(empty($id)){
    $sql1 = "SELECT `Name` from `holidays` where `Name` like '%$holiday%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_Holiday4.php?id=failed&msg=$msg");
         }
         else
            {
        $msg = "Added";
         $sql="INSERT INTO `holidays`
            (
             `Name`,
             `Holiday_date`,
             `Holiday_type`,
             `Status`)
                VALUES (
                        '$holiday',
                        '$holidate',
                        '$holitype',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "";
        $sql="UPDATE `holidays`
                SET
                  `Name` = '$holiday',
                  `Holiday_date` = '$holidate',
                  `Holiday_type` = '$holitype',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Holiday3.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Holiday4.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>