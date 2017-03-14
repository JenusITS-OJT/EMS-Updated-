<!DOCTYPE html>
<html>
<?php require('F_Connection.php'); ?>
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


<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Employee Management System
          <small>| User Account</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-laptop"></i>User Account</a></li>
        </ol>
      </section>
      <br>
            <!-- BEGIN PAGE CONTENT-->
             <!--BEGIN FIRST FORM-->
 
 <section class="content">
        <!-- SELECT2 EXAMPLE -->

        <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Late Yesterday (<?php echo date('F d, Y',strtotime("-1 days"));?>)</h3>
              </div>

        <div class="box-body">
            <div class="table-responsive" style="overflow-x:auto;">
        <?php

            $yesterday = date('Y/m/d',strtotime("-1 days"));;

            $result = mysqli_query($con, "SELECT e.`user_id`,
                          e.`id`, 
                          CONCAT(e.`First_Name`,' ', e.`Last_Name`) AS name,
                          s.`Starting_Time`,
                          DATE_FORMAT(t.`Time_In`,'%r')
                          FROM `employee` AS e
                          INNER JOIN `schedule` AS s
                          ON e.`user_id` = s.`Emp_ID`
                          INNER JOIN `time` AS t
                          ON t.`User_ID` = e.`user_id`
                          WHERE s.`Date` = '$yesterday' and t.`Time_In` > s.`Starting_Time`
                          GROUP BY e.`user_id`
                          ORDER BY name
                        ");

              $yes = mysqli_num_rows($result);

              if($yes >= 1){     
        ?>

          <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Scheduled Time-In</th>
                    <th>Time-In</th>
                    <th>Interval</th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[3] - $row[2]/3600; ?></td>
                      </tr>
                      <?php } ?>
                </tbody>
                <tfoot></tfoot>
              </table>
                      <?php }

                      else
                      {
                        echo "<center><h3>No late employees yesterday!</h3></center>";
                      }

                       ?>

          </div>
        </div>
      </div>


      <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Absent Yesterday (<?php echo date('F d, Y',strtotime("-1 days"));?>)</h3>
              </div>

        <div class="box-body">
            <div class="table-responsive" style="overflow-x:auto;">
        <?php

            $yesterday = date('Y-m-d',strtotime("-1 days"));

            $result = mysqli_query($con, "SELECT
                          e.`id`, 
                          CONCAT(e.`First_Name`,' ', e.`Last_Name`) AS name,
                          s.`Starting_Time`
                          FROM `employee` AS e
                          INNER JOIN `schedule` AS s
                          ON e.`user_id` = s.`Emp_ID`
                          INNER JOIN `time` AS t
                          ON t.`User_ID` = e.`user_id`
                          WHERE s.`Date` = '$yesterday' and e.`User_ID` NOT IN (Select `User_ID` FROM `time` WHERE 
                          DATE_FORMAT(`Time_In`, '%Y-%M-%d') = '$yesterday')
                          GROUP BY e.`user_id`
                          ORDER BY name
                        ");

              $yes = mysqli_num_rows($result);

              if($yes >= 1){
        ?>

          <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Schedule Time-In</th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>  
                      </tr>
                      <?php } ?>
                </tbody>
                <tfoot></tfoot>
              </table>
                      <?php }

                      else
                      {
                        echo "<center><h3>No late employees yesterday!</h3></center>";
                      }

                       ?>

          </div>
        </div>
      </div>

      
             <!-- END BASIC TABLE -->

   </section>  
</div>

<?php require('S_Footer.php');?> 
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
