<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $empid = mysqli_real_escape_string($con, $_GET['empid']);
    $pos = mysqli_real_escape_string($con, $_GET['pos']);
    $date = mysqli_real_escape_string($con, $_GET['datepicker']);
    $address = mysqli_real_escape_string($con, $_GET['des']);

    

            $sql = "SELECT `id`,
              `code`
              FROM `job` where `id` = '$pos'";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              $yes = $row[1];

              $newid = "JITS" . "$yes" . "$empid";

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
                  `date_hired` = '$date',
                  `id` = CONCAT('JITS', '$yes', '$empid'),
                  `jobtitle_id` = '$pos',
                  `branch_id` = '$address'

                WHERE `user_id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }
  }
  else
  {
        header("Location: T_SetHireDate4.php?id=failed&msg=$msg");
  }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_SetHireDate3.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_SetHireDate4.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>