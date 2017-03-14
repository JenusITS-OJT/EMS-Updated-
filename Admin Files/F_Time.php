<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];

    $result = mysqli_query($con, "SELECT `Time_In`, `Break_In`, `Break_Out`, `Time_Out` FROM `time` WHERE `User_ID` = '$userid' AND `ID` = '$id' AND DATE(`Time_In`) = CURDATE() ORDER BY `Time_In` DESC LIMIT 1");
    while($row = mysqli_fetch_array($result)){

    $timein = $row[0];
    $timeout = $row[3];
    $breakin = $row[1];
    $breakout = $row[2];
}

// Time-In
    if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `time`
            (
             `Time_In`,
             `User_ID`)
                VALUES (
                        NOW(), $userid
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg,$userid);
                 }

// Start Lunch Break
if(!empty($id) && $breakin == '0000-00-00 00:00:00'){
        $msg = "Updated";
        $sql="UPDATE `time`
                SET
                  `Break_In` = NOW()
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg,$userid);
    }

// End Lunch Break
if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00'){
        $msg = "Updated";
        $sql="UPDATE `time`
                SET
                  `Break_Out` = NOW()
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg,$userid);
    }

// Time-Out
if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout == '0000-00-00 00:00:00'){
        $msg = "Updated";
        $sql="UPDATE `time`
                SET
                  `Time_Out` = NOW()
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg,$userid);
    }

//Again
if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout != '0000-00-00 00:00:00'){
    $msg = "Added";
    $sql="INSERT INTO `time`
            (
             `Time_In`,
             `User_ID`)
                VALUES (
                        NOW(), $userid
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg,$userid);
                 }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: S_Dashboard.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: S_Dashboard.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>