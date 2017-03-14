<?php
 require('F_Connection.php');


?>

<html>
<head>
<title>
</title>


<style>
 @page 
    {
        size:  auto;   /* auto is the initial value */
        margin-top: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        margin: 10mm 10mm 10mm 10mm; /* margin you want for the content */
    }


	table {
	    width:100%;
	}
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	th, td {
	    padding: 5px;
	    text-align: left;
	}
	table#t01 tr:nth-child(even) {
	    background-color: #eee;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#fff;
	}
	table#t01 th {
	    background-color: #ffa31a;
	    color: black;
	}
</style>


</head>
<body>

	<center><img src = "logo.png" align="middle" style = "width:250px;height:90px;"/></center>
	<h2 style="text-align:center;">Tardiness/Late Summary</h2>
	<p style="text-align:center;">As of <?php echo date("F")?> <?php echo date("Y")?></p>
	<br/><br/>

	<!--Table-->
	<table id="t01">
  <tr>
    <th><center><h3>Jenus ID</h3></th>
    <th><center><h3>Employee Name</h3></th>
    <th><center><h3>No of Minutes/Hours Late</h3></th>
    <th><center><h3>Amount Dedcutions</h3></th>
  </tr>
  <?php $sql="
  ";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)){
                  ?>
  <tr>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php $sql2 = "SELECT `address` from `branch` where `id` = '$row[2]'";
                      $result2 = mysqli_query($con, $sql2);
                      $row2 = mysqli_fetch_array($result2);
                        echo $row2[0];?></td>
    <td><?php $sql3 = "SELECT `dept_name` from `department` where `id` = '$row[3]'";
                      $result3 = mysqli_query($con, $sql3);
                      $row3 = mysqli_fetch_array($result3);
                        echo $row3[0];?></td>
    <td><?php $sql4 = "SELECT `job_title` from `job` where `id` = '$row[4]'";
                      $result4 = mysqli_query($con, $sql4);
                      $row4 = mysqli_fetch_array($result4);
                        echo $row4[0];?></td>
    <td><?php echo $row[5]?></td>
    <td><?php $sql4 = "SELECT `status_name` from `status` where `id` = '$row[6]'";
                      $result4 = mysqli_query($con, $sql4);
                      $row4 = mysqli_fetch_array($result4);
                        echo $row4[0];?></td>
  </tr>
  <?php } ?>
</table>

                

	</center>
		
</body>
</html>