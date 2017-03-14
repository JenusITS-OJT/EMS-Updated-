<?php
require ("_Connection.php");

    // $userid = $_GET['id'];   
    // $userid = $_GET['userid'];

    $userid = mysqli_real_escape_string($con, $_GET['id']);
    $username = mysqli_real_escape_string($con, $_GET['username']);
    $npw = mysqli_real_escape_string($con, $_GET['npw']);
    $rnpw = mysqli_real_escape_string($con, $_GET['rnpw']);

    $key = md5('australia');
    $salt = md5('australia');


if($npw == $rnpw){
                 $pass1 = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $npw, MCRYPT_MODE_ECB)));
                 $sql= "UPDATE `employee` SET `username` = '$username', `password` = '$pass1' WHERE `user_id` = '$userid'";
                    $result = mysqli_query($con, $sql);
                   
                    header("Location: Employee_User_Account1.php?id=".$userid);
              }

         else
         {
                        header("Location: User_Account_Error.php");
              }
        
 

function check($cons, $val)
    {
        $checked = mysqli_real_escape_string($cons, $val);
        return $checked;
    }


mysqli_commit($con); 
?>