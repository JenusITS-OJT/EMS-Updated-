<?php
    require('F_Connection.php');

    $msg="";
    
    $empid= mysqli_real_escape_string($con, $_GET['empid']);
    $datepicker= mysqli_real_escape_string($con, $_GET['datepicker2']);
    $timein= mysqli_real_escape_string($con, $_GET['timein']);
    $timeout= mysqli_real_escape_string($con, $_GET['timeout']);
    $sid= mysqli_real_escape_string($con, $_GET['sid']);

if(empty($id)){
         $msg = "Updated";
         $sql="UPDATE `schedule`
         SET
             `Date` = '$datepicker',
             `Starting_Time` = '$timein',
             `Time_Out` = '$timeout'
              where `ID` = '$sid';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg, $datepicker);
                 }

function myResponse($stm, $msg, $datepicker){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_UpdateSchedule3.php?id=success&msg=$msg&datepicker=$datepicker");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_UpdateSchedule4.php?id=failed&msg=$msg&datepicker=$datepicker");
            }  
}

mysqli_commit($con); 
?>