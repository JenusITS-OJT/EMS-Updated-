<?php
    require('F_Connection.php');

    $msg="";
    
    $empid= mysqli_real_escape_string($con, $_GET['empid']);
    $from= mysqli_real_escape_string($con, $_GET['datepicker1']);
    $to= mysqli_real_escape_string($con, $_GET['datepicker2']);
    $timein= mysqli_real_escape_string($con, $_GET['timein']);
    $timeout= mysqli_real_escape_string($con, $_GET['timeout']);

    $begin = strtotime($from);
    $end = strtotime($to);
    $day = 86400;

    // Loop between timestamps, 24 hours at a time
    for ( $i = $begin; $i <= $end; $i = $i + $day ) {
    $date = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
    $sql="SELECT s.`Emp_ID`,
                s.`Date`
                FROM `schedule` AS s
                WHERE s.`Emp_ID` = '$empid' AND s.`Date` = '$date'";
                $result = mysqli_query($con, $sql);
                $yes = mysqli_num_rows($result);
                if($yes != 1)
                {   
                    $msg = "Added";
                    $sql="INSERT INTO `schedule`
                    (
                     `Date`,
                     `Starting_Time`,
                     `Time_Out`,
                     `Status`,
                     `Emp_ID`)
                        VALUES (
                                '$date',
                                '$timein',
                                '$timeout',
                                1,
                                '$empid'
                                );";
                    $stm = mysqli_query($con, $sql);
                    myResponse($stm,$msg);
                }
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_SetSchedule3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_SetSchedule4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>