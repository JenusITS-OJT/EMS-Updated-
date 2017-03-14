<?php require('F_Connection.php');
  $id = $_GET['id'];
?>

<html>
<head>
<title>
</title>


</head>

    <script type ="text/javascript" src = "others/jquery.js"></script>
    <script type ="text/javascript" src = "others/export/jquery.js"></script>
    <script type ="text/javascript" src = "others/export/tableExport.js"></script>
    <script type ="text/javascript" src = "others/export/jquery.base64.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/jspdf.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/libs/sprintf.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/libs/base64.js"></script>
    <script src="others/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>


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

    .button {
      display: inline-block;
      border-radius: 4px;
      border: none;
      color: #fff;
      text-align: center;
      font-size: 14px;
      padding: 10px;
      width: 200px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        page-break-inside:auto;
    }

    th, td {
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2
      page-break-inside:avoid; page-break-after:auto;}

    th {
        background-color: #ffa31a;
        color: black;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
       background-color:#fff;
    }
    tr:hover{background-color:#f5f5f5}
</style>


<script type ="text/javascript">
  $(document).ready(function(e) {

      $("#word").click(function(e) {
        $("#myTable1").tableExport({
          type: 'doc',
          escape: 'false',
        });
      });

      $("#excel1").click(function(e) {
        $("#myTable").tableExport({
          type: 'excel',
          escape: 'false',
        });
      });

  });
</script>
<body>

<div class="wrapper">
	<center><img src = "../logo.png" align="middle" style = "width:250px;height:90px;"/>
	<h2 style="text-align:center;">Employee Management System</h2>
	<p style="text-align:center;">As of <?php echo date("F")?> <?php echo date("Y")?></p>
	<br/><br/>

	<!--Table-->
	<table id="myTable" border="1" >
  <tr>
    <th><center><h3>Jenus ID</h3></center></th>
    <th><center><h3>Employee Name</h3></center></th>
    <th><center><h3>Workplace Address</h3></center></th>
    <th><center><h3>Department</h3></center></th>
    <th><center><h3>Job Title</h3></center></th>
    <th><center><h3>Date Hired</h3></center></th>
    <th><center><h3>Status</h3></center></th>
  </tr>
  <?php $sql="SELECT e.`ID`,
                  CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) as name, 
                  b.`Address`, d.`Dept_name`, j.`Job_Title`, DATE_FORMAT(e.`Date_Hired`,'%M %d, %Y'), e.`Status_ID` 
                  FROM Employee as e INNER JOIN Team as t on e.`Team_ID` = t.`ID` 
                  INNER JOIN department AS d ON t.`Dept_ID` = d.`id`
                  INNER JOIN job AS j ON j.`id` = e.`JobTitle_ID`
                  INNER JOIN branch as b ON b.`id` = e.`Branch_ID`
                  WHERE e.`Date_Hired` is not null and d.`id` = '$id'
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
</div>

<br/><br/><br/>
    <center>
      <button id = "print_button1" name="print_button1" class = "button" style="vertical-align:middle; 
      background-color: #f4511e;"><span>Export as PDF</span></button>
      <button id = "word" name="word" class = "button" style="vertical-align:middle; 
      background-color: #3c7ead;"><span>Export as Document</span></button>
      <button id = "excel1" name="excel1" class = "button" style="vertical-align:middle; 
      background-color: #3ca354;"><span>Export as Excel</span></button>
    </center>


	</center>

    <br/><br/><br/>

      <script>
    $(document).ready(function(){
        $("#print_button1").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.wrapper").printArea( options );
        });
    });

  </script>
</body>
</html>