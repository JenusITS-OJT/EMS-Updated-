<!DOCTYPE html>
<html>
<?php require('F_Connection.php') ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='shortcut icon' type='image/x-icon' href='logo.png'/>
  <title>Jenus ITS</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Employee Management System
          <small>| Manage Attendance</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-tasks"></i>Transaction</a></li>
          <li class="active">Manage Attendance</li>
        </ol>
      </section>
      <br>

      <!-- Main content -->  
      <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-warning">

          <div class="box-header with-border">
            <h3 class="box-title">Manage Attendance,
              <?php echo date("l - F j, Y"); ?>
            </h3>
          </div>

          <div class="box-body" style="overflow-x:auto;">
              <?php $sql="SELECT
                  CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) as name,
                  DATE_FORMAT(s.`DATE`,'%b %d, %Y'), 
                  DATE_FORMAT(s.`DATE`,'%W'),
                  DATE_FORMAT(s.`Starting_Time`,'%h:%i %p'),
                  DATE_FORMAT(s.`Time_Out`,'%h:%i %p'),
                  DATE_FORMAT(t.`Time_In`,'%h:%i %p'),
                  DATE_FORMAT(t.`Time_Out`,'%h:%i %p'),  
                  TIMEDIFF( t.`Break_Out`, t.`Break_In`) AS break,
                  TIMEDIFF( t.`Time_Out`, t.`Time_In`) AS hour,
                  e.`User_ID`
                    FROM `schedule` AS s
                    INNER JOIN `employee` AS e
                    ON s.`Emp_ID` = e.`User_ID` 
                    LEFT JOIN `time` AS t
                    ON s.`Emp_ID` = t.`User_ID` AND DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(t.`Time_In`,'%M %d, %Y')
                    WHERE DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(NOW(),'%M %d, %Y')
                    AND s.`ID` NOT IN (SELECT `Schedule_ID` FROM `attendance`)
                    AND s.`Status` = 1
                    ORDER BY hour DESC"
                     ;  
                    $result = mysqli_query($con, $sql);
                    ?>
              <?php
                    $yes = mysqli_num_rows($result);
                    if($yes >= 1)
                    { 
                  ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Shift</th>
                    <th>Time-In</th>
                    <th>Time-Out</th>
                    <th>Hours</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                    while($row = mysqli_fetch_array($result)){
                      ?>
                  <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?> - <?php echo $row[4] ?></td>
                    <td><?php
                          if($row[5] != '')
                          {
                            echo $row[5];
                          }
                          else
                          {
                            echo "Not Yet Logged In.";
                          }                        
                         ?>
                    </td>
                    <td><?php
                          if($row[6] != '12:00 AM')
                          {
                            echo $row[6];
                          }
                          else
                          {
                            echo "Currently Logged In.";
                          }
                          if($row[6] == '')
                          {
                            echo "Not Yet Logged In.";
                          }                         
                         ?>
                    </td>
                    <td><?php
                          $break =  $row[7];                      
                          $hour =  $row[8];                      
                          if($hour != '-838:59:59')
                          {
                            if($hour == '')
                            {
                              echo "--";
                            }
                            else
                            {
                              $breaks = strtotime($break);
                              $totalhours = strtotime($hour);
                              $time_diff = $totalhours - $breaks;

                              $hours = floor($time_diff / 3600);
                              $mins = floor($time_diff / 60 % 60);
                              $secs = floor($time_diff % 60);

                              $rec = $hours . ":" . $mins . ":" . $secs;                              
                              echo $rec;
                            }
                          }
                          else
                          {
                            echo "--";
                          }                                                   
                         ?>
                    </td>
                    <td>
                      <form action="T_ManageAttendance1.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row[9]; ?>">
                        <button type="submit" class="btn btn-success btn-flat btn-sm"  value="Update">
                          <i class="fa fa-edit"></i>
                          Manage
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php }
                  }
                  else
                  {
                    echo '<center><h1>No Attendance to Manage yet!</h1></center><br>';
                  }
                   ?>
                </tbody>
              </table>
            </div>       

        </div>
      </section>
    <!-- /.box -->
    </div>
  <!-- ./wrapper -->
            
<?php require('S_Footer.php');?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
