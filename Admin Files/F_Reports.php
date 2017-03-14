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

	<center><img src = "../logo.png" align="middle" style = "width:250px;height:90px;"/></center>
	<h2 style="text-align:center;">Employee Management System</h2>
	<p style="text-align:center;">As of <?php echo date("F")?> <?php echo date("Y")?></p>
	<br/><br/>

	<!--Table-->
	<table id="t01">
  <tr>
    <th><center><h3>Jenus ID</h3></th>
    <th><center><h3>Employee Name</h3></th>
    <th><center><h3>Workplace Address</h3></th>
    <th><center><h3>Department</h3></th>
    <th><center><h3>Job Title</h3></th>
    <th><center><h3>Date Hired</h3></th>
    <th><center><h3>Status</h3></th>
  </tr>
  <?php $sql="SELECT e.`ID`,
                  CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) as name, 
                  b.`Address`, d.`Dept_name`, j.`Job_Title`, DATE_FORMAT(e.`Date_Hired`,'%M %d, %Y'), e.`Status_ID` 
                  FROM Employee as e INNER JOIN Team as t on e.`Team_ID` = t.`ID` 
                  INNER JOIN department AS d ON t.`Dept_ID` = d.`id`
                  INNER JOIN job AS j ON j.`id` = e.`JobTitle_ID`
                  INNER JOIN branch as b ON b.`id` = e.`Branch_ID`
                  WHERE e.`Date_Hired` is not null
                  ORDER BY name and d.`id`";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)){
                  ?>
  <tr>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[2];?></td>
    <td><?php echo $row[3];?></td>
    <td><?php echo $row[4];?></td>
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