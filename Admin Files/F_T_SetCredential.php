<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];

    $name= mysqli_real_escape_string($con, $_GET['name']);
    $email= mysqli_real_escape_string($con, $_GET['email']);
    $contact= mysqli_real_escape_string($con, $_GET['contact']);
    $empid= mysqli_real_escape_string($con, $_GET['empid']);
    $account= mysqli_real_escape_string($con, $_GET['account']);
    $basicpay= mysqli_real_escape_string($con, $_GET['basicpay']);
    $pos = mysqli_real_escape_string($con, $_GET['pos']);
    $team= mysqli_real_escape_string($con, $_GET['team']);
    $des= mysqli_real_escape_string($con, $_GET['des']);
    $date = mysqli_real_escape_string($con, $_GET['datepicker']);
    $paytype = mysqli_real_escape_string($con, $_GET['paytype']);
    $emptype = mysqli_real_escape_string($con, $_GET['emptype']);

    //Employee ID Code
    $sql = "SELECT `id`,
              `code`
              FROM `job` where `id` = '$pos'";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              $yes = $row[1];
              $newid = "JITS" . "$yes" . "$empid";

    //Search for duplicate employee ID
    $sql2 = "SELECT `id` 
              FROM `employee` where `id` = '$newid'";
              $result2 = mysqli_query($con, $sql2);
              $row2 = mysqli_fetch_array($result2);
              $yes2 = mysqli_num_rows($result2);

      if($yes2 == 0)
      {

//Add

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `employee`
                SET 
                  `ID` = '$newid',
                  `Bank_Account` = '$account',
                  `Basic_Pay` = '$basicpay',
                  `JobTitle_ID` = '$pos',
                  `Team_ID` = '$team',
                  `Branch_ID` = '$des',
                  `Date_Hired` = '$date',
                  `Payment_Type` = '$paytype',
                  `Employment_Type` = '$emptype'
                WHERE `User_ID` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }
  }
  else
  {
        header("Location: T_SetCredential4.php?id=failed&msg=$msg");
  }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_SetCredential3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_SetCredential4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>