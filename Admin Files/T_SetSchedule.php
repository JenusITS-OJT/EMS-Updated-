<!DOCTYPE html>
<?php 
    require('F_Connection.php');
    if (isset($_GET['datepicker'])){
    $datepicker = $_GET['datepicker'];
  }
  else
    $datepicker = date("Y-m-d");
  ?>
<html>
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
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
        Employee Management System
          <small>| Set Schedule</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-tasks"></i>Transaction</a></li>
          <li class="active">Set Schedule</li>
        </ol>
      </section>
      <br>

      <section class="content">

      <div class="box box-warning">
          <div class="box-header">
            <b><h1 class="box-title">Set Schedule</h1></b>
          </div>

          <form action="" method="get">
          <center>
          <div class="box-body" style="overflow-x:auto;">
            <table>
              <tbody>
                <tr>
                  <td>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        Check Date: 
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control pull-right" id="datepicker" name="datepicker" value="<?php echo $datepicker ?>" required></input>
                    </div>
                    <!-- /.input group -->
                  </td>
                  <td>
                      &nbsp; &nbsp;<button type="submit" class="btn btn-primary">Load Table</button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
          <br>
        </center>
      </form>
      </div>


        <div class="box box-warning">
          <div class="box-header">
            <b><h1 class="box-title">Employee List</h1></b>
          </div>

          <div class="box-body" style="overflow-x:auto;">
            <table id="employeelist" class="table table-bordered table-striped">

          <?php
                  $sql="SELECT e.`ID`,
                    CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) AS name, 
                    j.`job_title`, 
                    d.`dept_name`, 
                    e.`User_ID`
                    FROM `employee` AS e 
                    INNER JOIN `job` AS j 
                    ON e.`JobTitle_ID` = j.`ID` 
                    INNER JOIN `team` AS t 
                    ON e.`Team_ID` = t.`ID`
                    INNER JOIN `department` AS d 
                    ON t.`Dept_ID` = d.`ID` 
                    LEFT OUTER JOIN `schedule` AS s
                    ON e.`user_id` = s.`Emp_ID`
                    WHERE e.`User_ID` NOT IN (SELECT `Emp_ID` FROM `schedule` WHERE `Date` = '$datepicker')
                    and e.`Date_Hired` is not null
                    GROUP BY e.`ID`";
                    $result = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($result);
                    ?>

              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Department</th>
                  <th>Job Title</th>
                  <th>Action</th>
                </tr>
              </thead>

              </thead>
                <tbody>
                  <?php
                      while($row = mysqli_fetch_array($result)){
                  ?>
                  <tr>
                    <?php $userid=$row[4] ?>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td>
                      <div class="btn-group">
                          <a href="T_SetSchedule1.php?id=<?php echo $userid;?>&datepicker=<?php echo $datepicker;?>"><button type="submit" class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                            Set Schedule
                          </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php }
                   ?>                    
                </tbody>
              </tfoot>
            </tfoot>
          </table>
        </div>
      </div>
      </section>
    </div>

<?php require("S_Footer.php");?>

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
  