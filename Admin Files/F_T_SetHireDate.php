<?php

  

  require ("F_Connection.php");

    $id = mysqli_real_escape_string($con, $_POST['idnew']);
    $date = mysqli_real_escape_string($con, $_POST['datepicker1']);

     echo $date;

?>