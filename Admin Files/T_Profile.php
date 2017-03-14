<!DOCTYPE html>
<html>
<?php require('_Connection.php');
?>
<?php require('_Header.php');?>
<?php require('_Sidebar_.php');?>
<?php
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='shortcut icon' type='image/x-icon' href='logo.png'/>
  <title>Jenus ITS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <style type="text/css">
    .bs-example{
      margin: 20px;
    }
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 1000px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 950px; /* New width for large modal */
        }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Employee Management System
          <small>| Profile</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="Dashboard_.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="T_ViewProfile.php"><i class="fa fa-user"></i>Profile</a></li>
        </ol>
      </section>
      <br>

    <!-- Main content --> 
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->

          <!-- Profile Image -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-orange" style="background: url('../dist/img/photo1.png') center center;">
              <h3 class="widget-user-username"><?php echo $name?></h3>
              <h5 class="widget-user-desc"><?php echo $jobtitle?></h5>
            </div>

            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/avatar2.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <form action="#" method="get">
                      <button type="submit" class="btn form-control btn-success"  value="Update">
                        <i class="fa fa-picture-o"> Upload Picture</i>
                        <input type="hidden" name="id" value="<?php echo $userid; ?>"/>
                      </button>
                    </form>
                    <br>
                    <form action="T_Profile.php?userid=<?php echo $_GET['userid'];?>" method="get">
                      <button type="submit" class="btn form-control btn-info"  value="Update">
                        <i class="fa fa-edit"> View Profile</i>
                        <input type="hidden" name="id" value="<?php echo $userid; ?>"/>
                      </button>
                    </form>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          
            <!-- About Me Box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
                <div class="box-tools pull-right">
                  <form action="T_UpdateProfile.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-edit"> Update Profile</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>                
              </div>
              <!-- /.box-header -->

               <?php $sql="SELECT 
                        emp.`User_ID`, 
                        emp.`ID`, 
                        CONCAT(emp.`First_Name`,' ',emp.`Middle_Name`,' ',emp.`Last_Name`,' ',emp.`Extension_Name`) as name,
                        emp.`Gender`, 
                        DATE_FORMAT(emp.`Birthday`,'%M %d, %Y'), 
                        emp.`Civil_Status`, 
                        CONCAT(emp.`Street`,' ',emp.`City`,' ',emp.`State`,' ',emp.`Country`,' ',emp.`ZIPCode`) AS address, 
                        emp.`Contact_No`, 
                        emp.`Email`, 
                        emp.`Citizenship`, 
                        DATE_FORMAT(emp.`Date_Hired`,'%M %d, %Y'),
                        emp.`SSS`, 
                        emp.`GSIS`, 
                        emp.`TIN`, 
                        emp.`Pagibig`, 
                        emp.`PhilHealth`
                        FROM `employee` AS emp                      
                        where emp.`User_ID` = '$userid'";
                         $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($result)){
                ?>
              
              <div class="box-body">

                <strong>
                  <i class="text- center"></i>
                  Name: &nbsp;
                </strong>
                <i class="text-muted" >
                  <?php echo $row[2];?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Gender: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php
                    $gender= $row[3];
                    if ($gender == 1)
                      { echo 'Female';}
                    else 
                      { echo 'Male';}
                  ?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                    Birthdate: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[4]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Civil Status: &nbsp;
                </strong>
                <i class="text-muted">
                 <?php echo $row[5]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Complete Address: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[6]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Contact Number:  &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[7]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Email Address:  &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[8]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Citizenship:  &nbsp;
                </strong>
                <i class="text-muted">
                 <?php echo $row[9]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Job Title in Jenus:  &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $jobtitle?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  Date Hired:  &nbsp;
                </strong>
                <i class="text-muted">
                   <?php echo $row[10]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  SSS Number: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[11]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  GSIS Number: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[12]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  TIN Number: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[13]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  PAG-IBIG Number: &nbsp;
                </strong>
                <i class="text-muted">
                  <?php echo $row[14]?>
                </i>
                <br>
                <br>

                <strong>
                  <i class="text- center"></i>
                  PhilHealth Number: &nbsp;
                </strong>
                <i class="text-muted">     
                  <?php echo $row[15]?>
                </i>
             
              </div>
              <?php } ?>
            </div>

        </div>

        <div class="col-md-8">

            <!-- Educational Background Box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Educational Background</h3>
                <div class="box-tools pull-right">
                  <form action="T_Education.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-edit"> Update Educational Background</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>
              </div>

              <table id="education" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Education Level</th>
                    <th>School</th>
                    <th>Address</th>
                    <th>Year</th>
                  </tr>
                </thead>
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
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <tbody>
                  <tr>
                    <?php $id=$row[0] ?>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[5] ?></td>
                  </tr>
                  <?php } ?>                    
                </tbody>
              </table>
              
            </div>

            <!-- Family Background Box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Family Background</h3>
                <div class="box-tools pull-right">
                  <form action="T_Family.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-edit"> Update Family Background</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>
              </div>

              <table id="family" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>Occupation</th>
                  </tr>
                </thead>
                <?php $sql="SELECT 
                  f.`ID`,
                  f.`Name`,
                  f.`Relation`,
                  f.`Occupation`
                    FROM `emp_familybg` AS f
                    WHERE f.`User_ID` = $userid
                    ORDER BY f.`Relation` ASC";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <tbody>
                  <tr>
                    <?php $id=$row[0] ?>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                  </tr>
                  <?php } ?>                    
                </tbody>
              </table>

            </div>

            <!-- Work Background Box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Work Background</h3>
                <div class="box-tools pull-right">
                  <form action="T_Work.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-edit"> Update Work Background</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>
              </div>

              <table id="work" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Job Title</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <?php $sql="SELECT 
                  w.`ID`,
                  w.`Company_Name`,
                  w.`Job_Title`,
                  CONCAT(DATE_FORMAT(w.`From_Year`,'%Y'),'-', DATE_FORMAT(w.`To_Year`,'%Y')) as Year
                    FROM `emp_workbg` AS w
                    WHERE w.`User_ID` = $userid
                    ORDER BY w.`To_Year` ASC";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <tbody>
                  <tr>
                    <?php $id=$row[0] ?>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                  </tr>
                  <?php } ?>                    
                </tbody>
              </table>

            </div>

            <!-- Contact Box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Contact In Case of Emergency</h3>
                <div class="box-tools pull-right">
                  <form action="T_Contact.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-edit"> Update Contact</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>
              </div>

              <table id="work" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <?php $sql="SELECT 
                  e.`ID`,
                  e.`Contact_Person`,
                  e.`Relation`,
                  e.`Contact_No`,
                  e.`Address`                  
                    FROM `emp_emergency` AS e
                    WHERE e.`User_ID` = $userid";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <tbody>
                  <tr>
                    <?php $id=$row[0] ?>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                  </tr>
                  <?php } ?>                    
                </tbody>
              </table>

            </div>

        </div>
      </div>
    </section>
    
    <!-- /.box -->
  </div> 
  <!-- ./wrapper -->
<?php require("_Footer.php");?>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>


<script>
  $(function () {
      //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  
  $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
  