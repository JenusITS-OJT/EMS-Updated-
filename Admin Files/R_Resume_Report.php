<?php require ('F_Connection.php');

  $userid =  $_GET['id'];

  $sql = "SELECT e.`ID`,
    CONCAT(e.`Last_Name` ,' ', e.`Extension_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) AS Name,
    CONCAT(e.`Street`,' ', e.`City`, ' ', e.`State`, ' ', e.`Country`, ' ', e.`ZIPCode`) AS Address,
    e.`Contact_No`,
    e.`Email`, 
    j.`Job_Title`,
    DATE_FORMAT(e.`Date_Hired`,'%M %d, %Y'),
    b.`Address`,
    d.`Dept_Name`,     
    e.`Gender`,
    DATE_FORMAT(e.`Birthday`, '%M %d, %Y'),     
    e.`Citizenship`,
    e.`SSS`,
    e.`TIN`,
    e.`Pagibig`, 
    e.`PhilHealth`,
    e.`Civil_Status`,
    e.`Profile_Pic`
    FROM EMPLOYEE AS e 
    INNER JOIN `job` AS j
    ON e.`JobTitle_ID` = j.`ID`
    INNER JOIN `branch` AS b
    ON e.`Branch_ID` = b.`ID`
    INNER JOIN `department` AS d
    ON j.`Dept_ID` = d.`ID`
    where e.`User_ID` = '$userid'";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result)){

  //Personal Information
    $ID = $row[0];
    $Name = $row[1];
    $Address = $row[2];
    $Contact = $row[3];
    $Email = $row[4];
    $Profile_Pic = $row[17];  
  //Basic Information
    $jobtitle = $row[5];
    $date_hired = $row[6];
    
    $birthdate = $row[10];
    $civil = $row[16];
    $citizenship = $row[11];
    $SSS = $row[12];
    $TIN = $row[13];
    $Pagibig = $row[14];
    $PhilHealth = $row[15];

    if ($row[9] == 1)
      $gender = 'Female';
    else
      $gender = 'Male';

/*  //Educational Background
    $educlevel = $row[20];
    $school_name = $row[21];
    $from_year = $row[22];
    $to_year = $row[23];
  //Family Background
    $family_name = $row[24];
    $relation = $row[25];
    $occupation = $row[26];
  //Work Background
    $company_name = $row[27];
    $jobtitle = $row[28];
    $year = $row[29];
  //Contact In Case of Emergency
    $contact_name = $row[30];
    $relation = $row[31];
    $contact_no = $row[32];
    $contact_address = $row[33];*/
  
  }
?>

<html>
  <head>
    <title>
    </title>

    <script type ="text/javascript" src = "others/jquery.js"></script>
    <script type ="text/javascript" src = "others/export/jquery.js"></script>
    <script type ="text/javascript" src = "others/export/tableExport.js"></script>
    <script type ="text/javascript" src = "others/export/jquery.base64.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/jspdf.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/libs/sprintf.js"></script>
    <script type ="text/javascript" src = "others/export/jspdf/libs/base64.js"></script>
    <script src = "others/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
      
    <style type="text/css">
            tab1 { padding-left: 1em; }
            tab2 { padding-left: 2em; }
            tab3 { padding-left: 3em; }
            tab4 { padding-left: 4em; }
            tab5 { padding-left: 5em; }
            tab6 { padding-left: 6em; }
            tab7 { padding-left: 7em; }
            tab8 { padding-left: 8em; }
            tab9 { padding-left: 9em; }
            tab10 { padding-left: 10em; }
    </style>

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
      page-break-inside:auto;
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

  <div id = "wrapper">
<br/>
  <center><img src = "logo.png" align="middle" style = "width:250px;height:90px;"/></center>
  <br/>
  <br/>
  <br/>
  <img src="<?php echo $Profile_Pic; ?>" alt="<?php echo $Name;?>" align="right" style="width:192px;height:192px;">
  <style="text-align:justify;"/><b></b><tab1/>&nbsp;<p>
  <style="text-align:justify;"/><b>EMPLOYEE NO.:</b><tab1/>&nbsp;<?php echo $ID;?><p/>
  <style="text-align:justify;"/><b>NAME:</b><tab5/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Name;?><p/>
  <style="text-align:justify;"/><b>ADDRESS LINE:</b><tab1/>&nbsp;&nbsp;&nbsp;<?php echo $Address;?><p/>
  <style="text-align:justify;"/><b>CONTACT NO.:</b><tab2/>&nbsp;<?php echo $Contact;?><p></p>
  <style="text-align:justify;"/><b>E-MAIL ADDRESS:</b><tab1/><?php echo $Email;?><br/>
  <br/>


<br/>
<hr/>
  <h2 style="text-align:center;"><b>BASIC INFORMATION</b></h2>
<hr/>
<br/>
  <style="text-align:justify;"/><b>JOB TITLE:</b><tab4/><?php echo $jobtitle;?><p>
  <style="text-align:justify;"/><b>DATE HIRED:</b><tab3/><?php echo $date_hired;?><p>
  <style="text-align:justify;"/><b>GENDER:</b><tab4/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gender;?><p>
  <style="text-align:justify;"/><b>BIRTHDATE:</b><tab3/>&nbsp;<?php echo $birthdate;?><p>
  <style="text-align:justify;"/><b>CIVIL STATUS:</b><tab2/>&nbsp;<?php echo $civil;?><p>
  <style="text-align:justify;"/><b>CITIZENSHIP:</b><tab2/>&nbsp;&nbsp;<?php echo $citizenship;?><p>
  <style="text-align:justify;"/><b>SSS No.:</b><tab5/>&nbsp;&nbsp;&nbsp;<?php echo $SSS;?><p>
  <style="text-align:justify;"/><b>TIN No.:</b><tab5/>&nbsp;&nbsp;<?php echo $TIN;?><p>
  <style="text-align:justify;"/><b>PAG-IBIG No.:</b><tab2/>&nbsp;&nbsp;&nbsp;<?php echo $Pagibig;?><p>
  <style="text-align:justify;"/><b>PHILHEALTH NO.:</b>&nbsp;&nbsp;<?php echo $PhilHealth;?></b>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>


<!-- SQL Query -->
<?php $sql="SELECT 
                  e.`ID`,
                  l.`ID`,
                  l.`Educational_Level_Name`, 
                  e.`School`, 
                  e.`Address`,
                  CONCAT(DATE_FORMAT(e.`From_Year`,'%Y'),'-', DATE_FORMAT(e.`To_Year`,'%Y')) as Year
                    FROM `emp_educbg` AS e
                    INNER JOIN `educational_level` AS l
                    ON l.`ID` = e.`Level_ID`
                    WHERE e.`User_ID` = $userid
                    ORDER BY l.`ID` ASC";
                      $result = mysqli_query($con, $sql);
                        ?>

<table id = "t01">
<hr/>
  <h2 style="text-align:center;"><b>EDUCATIONAL BACKGROUND</b></h2>
  <tr>
    <th><center/><h3>EDUCATIONAL ATTAINMENT</h3></th>
    <th><center/><h3>SCHOOL NAME</h3></th>
    <th><center/><h3>SCHOOL ADDRESS</h3></th>
    <th><center/><h3>YEARS ATTENDED</h3></th>
  </tr>
  <?php  if(mysqli_num_rows($result) == null || mysqli_num_rows($result) == 0)
    {
      echo "<td colspan ='4'><b>Not Set!</h3><b>";
    }
    else
    {  while($row = mysqli_fetch_array($result)){ ?>
  <tr>
  <td><?php echo $row[2]; ?></td>
  <td><?php echo $row[3]; ?></td>
  <td><?php echo $row[4]; ?></td>
  <td><?php echo $row[5]; ?></td>
  </tr>
  <?php }}?>
</table>




<?php $sql="SELECT 
                  f.`ID`,
                  f.`Name`,
                  f.`Relation`,
                  f.`Occupation`
                    FROM `emp_familybg` AS f
                    WHERE f.`User_ID` = $userid
                    ORDER BY f.`Relation` ASC";
                      $result = mysqli_query($con, $sql);

                    ?>

<table id = "t01"><br/> <br/>
<hr/>
  <h2 style="text-align:center;"><b>FAMILY BACKGROUND</b></h2>
  <tr>
    <th><center/><h3>NAME</h3></th>
    <th><center/><h3>RELATION</h3></th>
    <th><center/><h3>OCCUPATION</h3></th>
  </tr>

  <?php
    if(mysqli_num_rows($result) == null || mysqli_num_rows($result) == 0)
    {
      echo "<td colspan ='3'><b>Not Set!</h3><b>";
    }
    else
    {

   while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
  </tr>
  <?php }
  } ?>
</table>


<?php $sql="SELECT 
                  w.`ID`,
                  w.`Company_Name`,
                  w.`Job_Title`,
                  CONCAT(DATE_FORMAT(w.`From_Year`,'%Y'),'-', DATE_FORMAT(w.`To_Year`,'%Y')) as Year
                    FROM `emp_workbg` AS w
                    WHERE w.`User_ID` = $userid
                    ORDER BY w.`To_Year` ASC";
                      $result = mysqli_query($con, $sql);
                    ?>

<table id = "t01"><br/> <br/>
<hr/>
  <h2 style="text-align:center;"><b>WORK BACKGROUND</b></h2>
  <tr>
    <style="text-align:justify;"/><th><center/><h3>COMPANY NAME</h3></th>
    <style="text-align:justify;"/><th><center/><h3>JOB TITLE</h3></th>
    <style="text-align:justify;"/><th><center/><h3>YEAR</h3></th>
  </tr>
    <?php if(mysqli_num_rows($result) == null || mysqli_num_rows($result) == 0)
    {
      echo "<td colspan ='3'><b>Not Set!</h3><b>";
    }
    else
    { while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
  </tr>
  <?php }} ?>
</table>
<br/>

<?php $sql="SELECT 
                  e.`ID`,
                  e.`Contact_Person`,
                  e.`Relation`,
                  e.`Contact_No`,
                  e.`Address`                  
                    FROM `emp_emergency` AS e
                    WHERE e.`User_ID` = $userid";
                      $result = mysqli_query($con, $sql);
                    ?>
<table id = "t01"><br/> <br/>
<hr/>
  <h2 style="text-align:center;"><b>CONTACT IN CASE OF EMERGENCY</b></h2>
  <tr>
    <th><center><h3>NAME</h3></th>
    <th><center><h3>RELATION</h3></th>
    <th><center><h3>CONTACT NO.</h3></th>
    <th><center><h3>ADDRESS</h3></th>
  </tr>
      <?php if(mysqli_num_rows($result) == null || mysqli_num_rows($result) == 0)
    {
      echo "<td colspan ='4'><b>Not Set!</h3><b>";
    }
    else
    { while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td><?php echo $row[4]; ?></td>
  </tr>
  <?php } }?>
</table>
</div>
<br/><br/>
    <center>
      <button id = "print_button1" name="print_button1"  onclick="printDiv('wrapper');" class = "button" style="vertical-align:middle; 
      background-color: #f4511e;"><span>Export as PDF</span></button>
    </center>

  <script>
  function printDiv(wrapper) {
     var printContents = document.getElementById(wrapper).innerHTML;     
     var originalContents = document.body.innerHTML;       
     document.body.innerHTML = printContents;      
     window.print();      
     document.body.innerHTML = originalContents;
     }
  </script>
</body>
</html> 