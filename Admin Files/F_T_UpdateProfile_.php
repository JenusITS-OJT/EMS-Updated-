<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $jobtitle = $_GET['jobtitle'];
    $lastname= mysqli_real_escape_string($con, $_GET['lastname']);
    $firstname= mysqli_real_escape_string($con, $_GET['firstname']);
    $middlename= mysqli_real_escape_string($con, $_GET['middlename']);
    $extensionname= mysqli_real_escape_string($con, $_GET['extensionname']);
    $gender = mysqli_real_escape_string($con, $_GET['gender']);
    $st = mysqli_real_escape_string($con, $_GET['st']);
    $city = mysqli_real_escape_string($con, $_GET['city']);
    $state = mysqli_real_escape_string($con, $_GET['state']);
    $country = mysqli_real_escape_string($con, $_GET['country']);
    $zip = mysqli_real_escape_string($con, $_GET['zip']);
    $datepicker = mysqli_real_escape_string($con, $_GET['datepicker']);
    $civil = mysqli_real_escape_string($con, $_GET['civil']);
    $citizenship = mysqli_real_escape_string($con, $_GET['citizenship']);
    $contactno = mysqli_real_escape_string($con, $_GET['contactno']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $sss= mysqli_real_escape_string($con, $_GET['sss']);
    $tin= mysqli_real_escape_string($con, $_GET['tin']);
    $pagibig= mysqli_real_escape_string($con, $_GET['pagibig']);
    $philhealth= mysqli_real_escape_string($con, $_GET['philhealth']);

if(!empty($userid)){
        $msg = "Updated";
        $sql="UPDATE `employee`
                SET
                  `Last_Name` = '$lastname',
                  `First_Name` = '$firstname',
                  `Middle_Name` = '$middlename',
                  `Extension_Name` = '$extensionname',
                  `Street` = '$st',
                  `City` = '$city',
                  `State` = '$state',
                  `Country` = '$country',
                  `ZIPCode` = '$zip',
                  `Gender` = '$gender',
                  `Birthday` = '$datepicker',
                  `Civil_Status` = '$civil',
                  `Citizenship` = '$citizenship',
                  `Contact_No` = '$contactno',
                  `Email` = '$email',
                  `SSS` = '$sss',
                  `TIN` = '$tin',
                  `Pagibig` = '$pagibig',
                  `PhilHealth` = '$philhealth'
                WHERE `User_ID` = '$userid';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                /*if ($jobtitle=='Admin')
                header("Location: T_ViewProfile_.php?id=success&msg=$msg");
                else*/
                header("Location: T_ViewProfile_.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_ViewProfile_.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>