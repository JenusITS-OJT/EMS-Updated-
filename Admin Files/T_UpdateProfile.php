<!DOCTYPE html>
<?php require('F_Connection.php');
if (isset($_GET['userid']))
{
  $userid = $_GET['userid'];   
/*  $jobtitle = $_GET['jobtitle']; */  
}
else
   header("Location: T_ViewProfile.php");
?>
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
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

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
        Employee Management System
          <small>| Update Profile</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard_.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="T_ViewProfile.php"><i class="fa fa-user"></i>Profile</a></li>
        </ol>
      </section>
      <br>

      <!-- Main content -->
      <section class="content">

        <form action="F_T_UpdateProfile.php" method="get">

          <!--Personal Information-->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
              <?php $sql="SELECT 
                          emp.`User_ID`, 
                          emp.`ID`, 
                          emp.`First_Name`,
                          emp.`Middle_Name`,
                          emp.`Last_Name`,
                          emp.`Extension_Name`, 
                          emp.`Gender`, 
                          emp.`Birthday`, 
                          emp.`Civil_Status`, 
                          emp.`Street`,
                          emp.`City`,
                          emp.`State`,
                          emp.`Country`,
                          emp.`ZIPCode`, 
                          emp.`Contact_No`, 
                          emp.`Email`, 
                          emp.`Citizenship`,
                          emp.`Date_Hired`, 
                          emp.`SSS`, 
                          emp.`GSIS`, 
                          emp.`TIN`, 
                          emp.`Pagibig`, 
                          emp.`PhilHealth`
                          FROM `employee` AS emp
                          where emp.`User_ID` = '$userid'";          
                          $result = mysqli_query($con, $sql);
                          while($row = mysqli_fetch_array($result)){
                            
                            $userid = $row[0];
                            $id = $row[1];
                            $fname = $row[2];
                            $mname = $row[3];
                            $lname = $row[4];
                            $ename = $row[5];
                            $gender = $row[6];
                            $bday = $row[7];
                            $civil = $row[8];
                            $st = $row[9];
                            $city = $row[10];
                            $state = $row[11];
                            $country = $row[12];
                            $zip = $row[13];
                            $contactno = $row[14];
                            $email = $row[15];
                            $citizenship = $row[16];
                            $datehired = $row[17];
                            $sss = $row[18];
                            $gsis = $row[19];
                            $tin = $row[20];
                            $pagibig = $row[21];
                            $philhealth = $row[22];
                            /*$datehired = $row[23];*/
              ?>

              <div class="box-body">
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $lname; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $fname; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Middle Name</label>
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?php echo $mname; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Suffix Name</label>
                      <input type="text" class="form-control" id="extensionname" name="extensionname" placeholder="Suffix Name" value="<?php echo $ename; ?>">
                    </div>
                  </div>

                </div>

                <div class="row bg-warning">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Addressline</label>
                      <input type="text" class="form-control" id="st" name="st" placeholder="Street" value="<?php echo $st; ?>">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city; ?>">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">State</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $state; ?>">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $country; ?>">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ZIP</label>
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" value="<?php echo $zip; ?>">
                    </div>
                  </div>

                </div>

                <div class="row">
                          
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <?php
                        if ($row[6]==1)
                          $gender = 'Female';
                        else
                          $gender = 'Male';
                      ?>
                      <select class="form-control" id="gender" name="gender" placeholder="Gender" value="<?php echo $gender; ?>" required>
                        <option value=0>Male</option>
                        <option value=1>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="birthday">Birthdate:</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" id="datepicker" name="datepicker" value="<?php echo $bday; ?>" required></input>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="civilstatus">Civil Status</label>
                      <select class="form-control" id="civil" name="civil" placeholder="Civil Status" value="<?php echo $civil; ?>" required>                    
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widow">Widow</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="civilstatus">Citizenship</label>
                      <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" value="<?php echo $citizenship; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="civilstatus">Contact Number</label>
                      <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $contactno; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="civilstatus">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                    </div>
                  </div>

                </div>

                <div class="row bg-warning">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="SSS">SSS Number</label>
                      <input type="text" class="form-control" id="sss" name="sss" placeholder="SSS Number" maxlength="16" value="<?php echo $sss; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="TIN">TIN Number</label>
                      <input type="text" class="form-control" id="tin" name="tin" placeholder="TIN Number" maxlength="16" value="<?php echo $tin; ?>" required></input>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="Pagibig">PAGIBIG Number</label>
                      <input type="text" class="form-control" id="pagibig" name="pagibig" placeholder="PAGIBIG Number" maxlength="16" value="<?php echo $pagibig; ?>" required></input>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="PhilHealth">PhilHealth Number</label>
                      <input type="text" class="form-control" id="philhealth" name="philhealth" placeholder="PhilHealth Number" maxlength="16" value="<?php echo $philhealth; ?>" required></input>
                    </div>
                  </div>

                </div>
              </div>

              <div class="box-footer" align="right">
                <button type="submit" class="btn btn-primary">Save</button>
                  &nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-default">Clear Fields</button>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                <input type="hidden" name="jobtitle" value="<?php echo $jobtitle; ?>"/>
              </div>
              <?php }?>
          </div>
        </form>

      </section>
    </div>
  </div>
</body>

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
  