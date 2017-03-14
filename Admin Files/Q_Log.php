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
          Queries
          <small>| Log </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="s_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Log Queries</li>
        </ol>
      </section>
      <br>
    <!-- Main content -->
      <section class="content">
        <!-- Info boxes --><!-- 
        <div class="row"> -->
        <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"> Log List </h3>
             </div>

              <div class="box-body">
                <div id="logs" class="logs_wrapper form-inline dt-bootstrap">
                  <div class="row">
                  <div class="col-sm-6">
                  <div class="dataTables_Length" id="logsort">
                  <label>
                    Show            
                      <select name="loglist" aria-controls="log" class="form-control input-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      </select>
                    entries
                  </label>
                  </div><!--datatable-->
                  </div><!--col sm 6-->
                  </div><!--row-->

                  <br>

                 <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                    <?php
                        $sql = "SELECT l.`user_id`,
                                e.`ID`, 
                                CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) AS name,
                                l.`Login_Time`, 
                                l.`Logout_Time`
                                FROM `log` as l 
                                INNER JOIN `employee` AS e 
                                ON e.`user_ID` = l.`user_id`
                                GROUP BY e.`user_ID`
                                ORDER BY l.`Login_Time` DESC
                                LIMIT 10";
                        $result = mysqli_query($con, $sql);
                      ?>
                  <table id = "myTable"class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Jenus ID</th>
                        <th>Name</th>
                        <th>Time of Log-In</th>
                        <th>Time of Log-Out</th>
                      </tr>
                    </thead>                    

                    <tbody>
                        <?php
                          while($row = mysqli_fetch_array($result)){
                        ?>
                      <tr>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td>
                          <?php
                          if($row[4] != '0000-00-00 00:00:00')
                          {
                            echo $row[4];
                          }
                          else
                          {
                            echo "Currently Logged In.";
                          }                        
                         ?>                        
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                  </div><!--row-->
                  </div>
                  <!--div id table-->
              </div>
              <!--div box-body-->
<!-- 
                  
                    <div class="box box-footer ">
                    <div class="col-md-12 pull-right">
                    <div class="dataTables_Paginate paging_simple_numbers" id="logpaginate">
                      <ul class="pagination">
                        <li class="pagiinate_button previous disable" id="previous">
                          <a href="#" data-dt-idx="0" tab-index="0">Previous</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="1">
                          <a href="#" data-dt-idx="0" tab-index="1">1</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="2">
                          <a href="#" data-dt-idx="0" tab-index="2">2</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="3">
                          <a href="#" data-dt-idx="0" tab-index="3">3</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="next">
                          <a href="#" data-dt-idx="0" tab-index="4">Next</a>
                        </li>

                      </ul>
                    </div>
                    </div>
                    </div> -->
        </div>
        <!-- div box -->
        <!-- </div> -->
        <!--div row-->
      </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
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
</body>
</html>
