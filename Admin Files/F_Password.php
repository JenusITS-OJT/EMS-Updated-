<?php
    require ('F_Connection.php');
    $firstname = check($con, $_POST['firstname']);
    $lastname = check($con, $_POST['lastname']);
    $jenusid = check($con, $_POST['jenusid']);
    $phone = check($con, $_POST['phone']);
    $msg = "";
    $name = "";

    $key = md5('australia');

    $salt = md5('australia');

if(isset($firstname) and isset($lastname) and isset($jenusid) and isset($phone)) {
        $sql = "SELECT Email, Password, user_id  FROM  `employee`
            WHERE (`First_Name` = '$firstname' AND `Last_Name` = '$lastname') AND (`Contact_No` = '$phone' and `id` = '$jenusid')";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $name = $row[0];
        $userid = $row[1];
        $id = $row[2];


        $new = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($userid), MCRYPT_MODE_ECB));

        $yes = mysqli_num_rows($result);
         if($yes == 1)
            {
                header("Location: S_Password_Success2.php?id=" . $id);
            }
        else
        {
                header("Location: S_Password_Error.php?id=wew&msg=Invalid&Credentials!");
        }
    }

function check($cons, $val){
        $checked = mysqli_real_escape_string($cons, $val);
        return $checked;
    }


mysqli_commit($con);
?>