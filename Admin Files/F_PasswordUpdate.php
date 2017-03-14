<?php
    require ('F_Connection.php');
    $id = $_POST['id'];
    $password = (mysqli_real_escape_string($con, $_POST['password1']));
    $repassword = (mysqli_real_escape_string($con, $_POST['password2']));

    $key = md5('australia');

    $salt = md5('australia');

    

if($password == $repassword) {
                    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $password, MCRYPT_MODE_ECB)));
                    $sql = "UPDATE `employee` set `password` = '$string' where `user_id` = '$id'";
                    $result = mysqli_query($con, $sql);
                    header("Location: S_Password_Success.php");
                }
        else
        {
            header("Location: S_Password_NotMatched.php?id=".$id);
        }

function check($cons, $val)
    {
        $checked = mysqli_real_escape_string($cons, $val);
        return $checked;
    }


mysqli_commit($con);
?>