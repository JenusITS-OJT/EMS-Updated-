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
          <small>| Job Title</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-gear"></i>Configuration Management</a></li>
          <li>Job Title</li>
        </ol>
      </section>
      <br>

      <!-- Main content -->  
      <section class="content">
      <!-- SELECT2 EXAMPLE -->
          <div class="box box-warning">

            <div class="box-header">
              <h3 class="box-title">Add Job Title</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <form action="F_CM_JobTitle.php" method="get">
              <div class="box-body">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Code</label>
                    <input type="text" class="form-control" id="jobcode" name="jobcode" placeholder="Job Code" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Job Description" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <select class="form-control" id="dept" name="dept" placeholder="Department" required>
                      <?php $sql="SELECT
                                    d.`ID`, 
                                    d.`Dept_Name`
                                    FROM `department` as d
                                    WHERE d.`Status` = 1 order by d.`Dept_Name`;";
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                  ?>
                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" id="status" name="status" placeholder="Status" required>
                            <?php $sql="SELECT
                              s.`ID`, s.`Status_Name`
                            FROM `status` as s where s.`id` = '1' or s.`id` = '8'";
                              $result = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_array($result)){
                            ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="box-footer" align="right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <button type="reset" class="btn btn-default">Clear Fields</button>
                </div>

              </div>
            </form>

          </div>

          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Job Title</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body" style="overflow-x:auto;">
              <table id="job_title" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Job Title</th>
                    <th>Job Code</th>
                    <th>Job Description</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql="SELECT 
                            j.`id`,
                            j.`Job_Title`,
                            j.`Code`,
                            j.`Description`,
                            d.`Dept_Name`,
                            j.`status`
                            FROM `job` as j
                            INNER JOIN `department` AS d
                            ON d.`ID` = j.`Dept_ID`
                            where j.`status` = '1'";
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($result)){
                          ?> 
                  <tr>
                    <?php $id=$row[0]; ?>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php
                          $status = $row[5];
                          if($status == '1')
                          {
                            echo 'Active';
                          }
                          else
                          {
                            echo 'Inactive';
                          }
                        ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="CM_JobTitle1.php?id=<?php echo $id;?>">
                          <button type="button" class="btn btn-success btn-flat btn-sm"  value="Update">
                            <i class="fa fa-pencil"></i>
                            Update
                          </button>
                          <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
                        </a>
                          &nbsp;
                        <a href="CM_JobTitle2.php?id=<?php echo $id;?>">
                          <button type="button" class="btn btn-danger btn-flat btn-sm"  value="Delete">
                            <i class="fa fa-trash"></i>
                            Delete
                          </button>
                          <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
                        </a>

                     </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
