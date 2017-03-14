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
          <small>| Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <br>
    <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">

          <!-- Employee Count -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Employees</span>
                <span class="info-box-number">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM employee 
                          WHERE `date_hired` is not null or `date_hired` != '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>
                    Employees</span>
                  <small>As of <?php echo date("F Y")?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- System Log Count -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Online</span>
                <span class="info-box-number">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM log 
                          WHERE DATE_FORMAT(`Login_Time`,'%m-%d-%Y') = DATE_FORMAT(NOW(),'%m-%d-%Y') AND `Logout_Time` = '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>
                    Online</span>
                  <small>As of <?php echo date("F d, Y")?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- Attendance Count -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Time-In</span>
                <span class="info-box-number">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM `time` 
                          WHERE DATE_FORMAT(`Time_In`,'%m-%d-%Y') = DATE_FORMAT(NOW(),'%m-%d-%Y') AND `Time_Out` = '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>
                    Present</span>
                  <small>As of <?php echo date("F d, Y")?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- On Break Count -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Break</span>
                <span class="info-box-number">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM `time` 
                          WHERE DATE_FORMAT(`Break_In`,'%m-%d-%Y') = DATE_FORMAT(NOW(),'%m-%d-%Y') AND `Break_Out` = '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>
                    On Break</span>
                  <small>As of <?php echo date("F d, Y")?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
        
        <div class="row">

          <!-- timein -->
          <div class="col-md-12">
            <script>
              var d = new Date(<?php echo time() * 1000 ?>);

              function updateClock() {
                // Increment the date
                d.setTime(d.getTime() + 1000);

                // Translate time to pieces
                var currentHours = d.getHours();
                var currentMinutes = d.getMinutes();
                var currentSeconds = d.getSeconds();

                // Add the beginning zero to minutes and seconds if needed
                currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
                currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

                // Determine the meridian
                var meridian = (currentHours < 12) ? "AM" : "PM";

                // Convert the hours out of 24-hour time
                currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
                currentHours = (currentHours == 0) ? 12 : currentHours;

                // Generate the display string
                var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + meridian;

                // Update the time
                document.getElementById("clock").firstChild.nodeValue = currentTimeString;
              }

              window.onload = function() {
                updateClock();
                setInterval('updateClock()', 1000);
              }
            </script>
            <h1 align="center"><div id="clock">&nbsp;</div></h1>
          
            <h3 align="center">            
              <?php $today = date("l, F j, Y");
              echo $today;

              $status = 0;
              $timein = null;
              $timeout = null;
              $breakin = null;
              $breakout = null;

              $result = mysqli_query($con, "SELECT `Time_In`, `Break_In`, `Break_Out`, `Time_Out`, `ID` FROM `time` WHERE `User_ID` = '$userid' AND DATE(`Time_In`) = CURDATE() ORDER BY `Time_In` DESC LIMIT 1");

              $yes = mysqli_num_rows($result);
              if($yes >= 1){            
                while($row = mysqli_fetch_array($result)){
                    $timein = $row[0];
                    $breakin = $row[1];
                    $breakout = $row[2];
                    $timeout = $row[3];
                    $id = $row[4];
                  }
                }

                  if(empty($id) && $timein == '0000-00-00 00:00:00')
                    $stat = 'Time-In';

                  else if(!empty($id) && $breakin == '0000-00-00 00:00:00')
                    $stat = 'Start Lunch Break';

                  else if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00')
                    $stat = 'End Lunch Break';

                  else if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout != '0000-00-00 00:00:00')
                    $stat = 'Time-In';
                
              else
              {
                $stat = 'Time-In';
                /*$id = 0;*/
              }


              ?>            
            </h3>

            <center>
              <form action="F_Time_.php?userid=<?php echo $_GET['userid'];?>&id=<?php echo $_GET['id'];?>" method="get">
              
                <button type="submit" name="b1" id="b1" class="btn btn-success btn-flat"  value="Start-Lunch" 
                  <?php 
                          if(is_null($timeout))
                          {
                            ?> enabled <?php
                          }

                         if(!empty($id) && $breakin == '0000-00-00 00:00:00' && $timeout == '0000-00-00 00:00:00'){
                              $stat = 'Start Lunch Break';
                            ?> enabled <?php
                            }
                         
                         if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00'  && $timeout == '0000-00-00 00:00:00'){
                            $stat = 'End Lunch Break';
                          }

                        if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00'  && $timeout == '0000-00-00 00:00:00')
                        {
                            ?> disabled <?php
                        }

                          ?> >
                  <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $stat ; ?>
                </button>

                &nbsp;
                 <button type="submit" class="btn btn-danger btn-flat" name ="b2" id ="b2"
                         value="Time-Out" 
                         <?php 
                         if(!empty($id) && is_null($breakin) && $timeout == '0000-00-00 00:00:00')
                            {?>enabled
                          <?php }

                          if(!empty($id) && $breakin != null && $timeout == '0000-00-00 00:00:00')
                            {?>enabled
                          <?php }
                          else
                          {
                            ?>
                            disabled<?php
                          }

                          ?> >
                  <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $stat = 'Time-Out'; ?>
                </button>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
              </form>
            </center>          
            <br><br>

          </div>
          
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Your Time Record, <b><?php $today = date("l F j, Y");
              echo $today; ?></h3>                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive" style="overflow-x:auto;">
                    <?php
                        $result = mysqli_query($con, "SELECT DATE_FORMAT(`Time_In`,'%r'),
                          DATE_FORMAT(`Break_In`,'%r'),
                          DATE_FORMAT(`Break_Out`,'%r'),
                          DATE_FORMAT(`Time_Out`,'%r'),
                          `ID`,
                          DATE_FORMAT(`Break_In`, '%Y-%M-%d'),
                          DATE_FORMAT(`Break_Out`, '%Y-%M-%d')
                          FROM `time` 
                          WHERE `User_ID` = '$userid' AND DATE(`Time_In`) = CURDATE() 
                          ORDER BY `Time_In` DESC");
                        $yes = mysqli_num_rows($result);
                      ?>
                    <table id = "myTable"class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Time-In</th>
                        <th>Break-In</th>
                        <th>Break-Out</th>
                        <th>Time-Out</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                        <?php

                          if($yes >= 1){
                          while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>                        
                          <td>
                            <?php

                              $timeid = $row[4];

                              if($row[0] != '12:00:00 AM')
                              {
                                echo $row[0];
                              }
                              else
                              {
                                echo "...";
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if($row[1] != '12:00:00 AM' && $row[1] != '11:11:11 AM')
                              {
                                echo $row[1];
                              }
                              else if($row[5] == '1111-11-11')
                              {
                                echo "Half-Day";
                              }
                              else
                              {
                                echo "...";
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if($row[2] != '12:00:00 AM' && $row[2] != '11:11:11 AM')
                              {
                                echo $row[2];
                              }
                              else if($row[6] == '1111-11-11')
                              {
                                echo "Half-Day";
                              }
                              else
                              {
                                echo "...";
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if($row[3] != '12:00:00 AM')
                              {
                                echo $row[3];
                              }
                              else
                              {
                                echo "...";
                              }
                            }?>
                          </td>
                        </tr>
                      <?php
                  }
                  else
                  {
                    echo '<center><h1>Please Time In First.</h1>';
                  }
                   ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->              
            </div>
          </div>
          <!-- ./ end of div col-->

          <!-- time logs -->
          <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Time Logs for today, <b><?php $today = date("l F j, Y");
              echo $today; ?></b></h3>
                <!-- <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT e.`user_id`,
                          e.`id`, 
                          CONCAT(e.`First_Name`,' ', e.`Last_Name`) AS name,
                          DATE_FORMAT(t.`Time_In`,'%r'),
                          DATE_FORMAT(t.`Break_In`,'%r'),
                          DATE_FORMAT(t.`Break_Out`,'%r'),
                          DATE_FORMAT(t.`Time_Out`,'%r')
                          FROM `employee` AS e
                          INNER JOIN `time` AS t
                          ON e.`user_id` = t.`User_ID`
                          WHERE DATE(`Time_In`) = CURDATE()
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
                        <th>Time-In</th>
                        <th>Break-In</th>
                        <th>Break-Out</th>
                        <th>Time-Out</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td>
                          <?php 

                          if($row[1] != '12:00:00 AM')
                              {
                                echo $row[1];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>
                        <td>
                          <?php 

                          if($row[2] != '12:00:00 AM')
                              {
                                echo $row[2];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>
                        <td>
                          <?php 

                          if($row[3] != '12:00:00 AM')
                              {
                                echo $row[3];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>
                        <td>
                          <?php 

                          if($row[4] != '12:00:00 AM')
                              {
                                echo $row[4];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>
                        <td>
                          <?php 

                          if($row[5] != '12:00:00 AM')
                              {
                                echo $row[5];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>
                        <td>
                          <?php 

                          if($row[6] != '12:00:00 AM')
                              {
                                echo $row[6];
                              }
                              else
                              {
                                echo "...";
                              }
                          ?>                                
                        </td>                       
                      </tr>
                    <?php }
                    }
                    else
                    {
                      echo '<center><h1>No Time In yet!</h1></center><br>';
                    }
                 ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="right">
                <a href="Q_Log.php" class="btn btn-default">View All Time Log</a>
              </div>
            </div>
          </div>

     

          <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Latest Registrations</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT `user_id`,
                          CONCAT(`First_Name`,' ', `Last_Name`), `contact_no`, `email` FROM employee 
                          WHERE (`date_hired` = '0000-00-00' or `date_hired` is null)");
                      $yes = mysqli_num_rows($result);
                       if($yes >= 1){
                    ?>
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Registration ID</th>
                      <th>Employee Name</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th>Status</th>
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
                        <td><?php echo $row[3] ?></td>
                        <td><span class="label label-warning"> Pending</span></td>
                      </tr>
                    <?php }
                    }
                    else
                    {
                      echo '<center><h1>No Latest Registration yet!</h1></center><br>';
                    }
                 ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="right">
                <a href="T_SetCredential.php" class="btn btn-default">View All New Registrations</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">System Logs</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>

              <!-- /.box-header -->
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
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="right">
                <a href="Q_SystemLog.php" class="btn btn-default">View All Time Logs</a>
              </div>
            </div>
          </div>
            


        </div>
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
