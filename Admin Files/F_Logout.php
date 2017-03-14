<?php
require('F_Connection.php');
session_start();
$userid=$_SESSION['session']['userid'];
$logid=$_SESSION['session']['logid'];
$sql="UPDATE `log` SET `Logout_Time` = Now() WHERE `User_ID` = '$userid' && `id` = '$logid'";
$stm = mysqli_query($con, $sql);
/*$row =  mysqli_fetch_assoc($result);*/
/*while ($row = $result->fetch_assoc()) {
    echo $row['classtype']."<br>";
}*/
session_destroy();  
//session_unregister();
//setrawcookie('koki','',time() -86400, "/");
header('Location: ../S_Login.php');
?>