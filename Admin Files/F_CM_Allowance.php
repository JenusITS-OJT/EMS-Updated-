<?php
require ("F_Connection.php");

    $msg="";
    
    $id = $_GET['id'];
    $allowance= mysqli_real_escape_string($con, $_GET['allowance']);
    $amount= mysqli_real_escape_string($con, $_GET['amount']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

if(empty($id)){
    $sql1 = "SELECT `Allowance` from `Allowance` where `Allowance` like '%$allowance%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_Allowance4.php?id=failed&msg=$msg");
         }
         else
            {
        $msg = "Added";
         $sql="INSERT INTO `Allowance`
            (
             `Allowance`,
             `Amount`,
             `Status`)
                VALUES (
                        '$allowance',
                        '$amount',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `Allowance`
                SET
                  `Allowance` = '$allowance',
                  `Amount` = '$amount',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Allowance3.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Allowance4.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>