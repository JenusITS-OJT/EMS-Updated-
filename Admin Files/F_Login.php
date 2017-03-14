<?php
    require ('F_Connection.php');
    $username = check($con, $_POST['username']);
    $password = check($con, $_POST['password']);
    $msg = "";
    $name = "";
    $pass = "";
    $jobtitle = "";
    $logid = "";

    $key = md5('australia');
    $salt = md5('australia');

    
if(isset($username) and isset($password)) {
        $sql = "SELECT
        CONCAT(e.`First_Name`,' ', e.`Last_Name`), 
        e.`User_ID`, e.`password`, j.`Job_Title`
            FROM  employee as e
            INNER JOIN job as j
            ON e.`JobTitle_ID` = j.`id`
            WHERE (`username` = '$username' OR `email` = '$username')";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $name = $row[0];
        $userid = $row[1];
        $pass = $row[2];
        $jobtitle = $row[3];

        $yes = mysqli_num_rows($result);
         if($yes == 1)
            {
                 $new = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($pass), MCRYPT_MODE_ECB));

                if ($new == $password) {

                    //Insert login time in table `log`
                    $sql = "INSERT INTO `log` (`Login_Time`, `User_ID`) VALUES (NOW(), $userid)";
                    $stm = mysqli_query($con, $sql);

                    //Get log id of the log session
                    $sql1 = "SELECT `id` FROM `log`
                    WHERE `User_ID` = $userid
                    ORDER BY `Login_Time` DESC
                    LIMIT 1;";
                    $result = mysqli_query($con, $sql1);
                    $row = mysqli_fetch_array($result);
                    $logid = $row[0];

                    if ($jobtitle == 'Admin'){                        
                        header("Location: Admin/S_Dashboard.php?id=$userid&logid=$logid");
                        startSession($name, $userid, $jobtitle, $logid);
                    }
                    else
                    {    
                        header("Location: Emp/S_Dashboard_.php?id=$userid&logid=$logid");
                        startSession($name, $userid, $jobtitle, $logid);
                    }

                }
                else
                {
                    header("Location: S_Login_Error.php");
                }
            }
        else{
                header("Location: S_Login_Error.php");
            }
    }
function startSession($name, $userid, $jobtitle, $logid){
    session_start();
    $_SESSION['session'] = array();
    $_SESSION['session'] = array('name'=>$name, 'userid'=>$userid, 'jobtitle'=>$jobtitle, 'logid'=>$logid);
}   
function check($cons, $val){
        $checked = mysqli_real_escape_string($cons, $val);
        return $checked;
    }

mysqli_commit($con);
?>