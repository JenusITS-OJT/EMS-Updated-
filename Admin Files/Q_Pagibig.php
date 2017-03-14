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
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Queries
          <small>| Premium Contribution Table </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pag-Ibig Table</li>
        </ol>
      </section>
      <br>
    <!-- Main content -->
      <section class="content">
        <!-- Info boxes --><!-- 
        <div class="row"> -->
        <div class="box box-warning">
            <div class="box-header">
              <h4 class="box-title"> *Employee share represents half of the total monthly premium while the other half is shouldered by the employer. </h4>
              <h4 class="box-title"> **For Kasambahay helper receiving a wage of less than five thousand pesos (Php 5,000.00) per month, the employer will shoulder both the employee and employer share based on the premium schedule.</h4>
             </div>

              <div class="box-body">
                <div id="logs" class="logs_wrapper form-inline dt-bootstrap">
                 <div class="row">
                 <div class="col-sm-12">
                <div class="table-responsive" style="overflow-x:auto;">


                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Salary Bracket</th>
                        <th>Salary Range</th>
                        <th>Salary Base</th>
                        <th>Total Monthly Premium</th>
                        <th>Employee Share*</th>
                        <th>Employer Share</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>  
                      <td>1</td>
                      <td>8,999.99** and below</td>  
                      <td>8,000.00</td>                 
                      <td>200.00</td>  
                      <td>100.00</td>  
                      <td>100.00</td>
                      </tr>
                      <tr>
                      <td>2</td>
                      <td>9,000.00 - 9,999.99</td>  
                      <td>9,000.00</td>                 
                      <td>225.00</td>  
                      <td>112.50</td>  
                      <td>112.50</td>
                      </tr>
                      <tr>
                      <td>3</td>
                      <td>10,000.00 - 10,999.99</td>  
                      <td>10,000.00</td>                  
                      <td>250.00</td>  
                      <td>125.00</td>  
                      <td>125.00</td> 
                      </tr>
                      <tr>
                      <td>4</td>
                      <td>11,000.00 - 11,999.99</td>  
                      <td>11,000.00</td>                  
                      <td>275.00</td>  
                      <td>137.50</td>  
                      <td>137.50</td> 
                      </tr>
                      <tr>
                      <td>5</td>
                      <td>12,000.00 - 12,999.99</td>  
                      <td>12,000.00</td>                  
                      <td>300.00</td>  
                      <td>150.00</td>  
                      <td>150.00</td> 
                      </tr>
                      <tr>
                      <td>6</td>
                      <td>13,000.00 - 13,999.99</td>  
                      <td>13,000.00</td>                  
                      <td>325.00</td>  
                      <td>162.50</td>  
                      <td>162.50</td> 
                      </tr>
                      <tr>
                      <td>7</td>
                      <td>14,000.00 - 14,999.99</td>  
                      <td>14,000.00</td>                  
                      <td>350.00</td>  
                      <td>175.00</td>  
                      <td>175.00</td> 
                      </tr>
                      <tr>
                      <td>8</td>
                      <td>15,000.00 - 15,999.99</td>  
                      <td>15,000.00</td>                  
                      <td>375.00</td>  
                      <td>187.50</td>  
                      <td>187.50</td> 
                      </tr>
                      <tr>
                      <td>9</td>
                      <td>16,000.00 - 16,999.99</td>  
                      <td>16,000.00</td>                  
                      <td>400.00</td>  
                      <td>200.00</td>  
                      <td>200.00</td> 
                      </tr>
                      <tr>
                      <td>10</td>
                      <td>17,000.00 - 17,999.99</td>  
                      <td>17,000.00</td>                  
                      <td>425.00</td>  
                      <td>212.50</td>  
                      <td>212.50</td> 
                      </tr>
                      <tr>
                      <td>11</td>
                      <td>18,000.00 - 18,999.99</td>  
                      <td>18,000.00</td>                  
                      <td>450.00</td>  
                      <td>225.00</td>  
                      <td>225.00</td> 
                      </tr>
                      <tr>
                      <td>12</td>
                      <td>19,000.00 - 19,999.99</td>  
                      <td>19,000.00</td>                  
                      <td>475.00</td>  
                      <td>225.00</td>  
                      <td>225.00</td> 
                      </tr>
                      <tr>
                      <td>13</td>
                      <td>20,000.00 - 20,999.99</td>  
                      <td>20,000.00</td>                  
                      <td>500.00</td>  
                      <td>250.00</td>  
                      <td>250.00</td> 
                      </tr>
                      <tr>
                      <td>14</td>
                      <td>21,000.00 - 21,999.99</td>  
                      <td>21,000.00</td>                  
                      <td>525.00</td>  
                      <td>262.50</td>  
                      <td>262.50</td> 
                      </tr>
                      <tr>
                      <td>15</td>
                      <td>22,000.00 - 22,999.99</td>  
                      <td>22,000.00</td>                  
                      <td>550.00</td>  
                      <td>275.00</td>  
                      <td>275.00</td> 
                      </tr>
                      <tr>
                      <td>16</td>
                      <td>23,000.00 - 23,999.99</td>  
                      <td>23,000.00</td>                  
                      <td>575.00</td>  
                      <td>287.50</td>  
                      <td>287.50</td> 
                      </tr>
                      <tr>
                      <td>17</td>
                      <td>24,000.00 - 24,999.99</td>  
                      <td>24,000.00</td>                  
                      <td>600.00</td>  
                      <td>300.00</td>  
                      <td>300.00</td> 
                      </tr>
                      <tr>
                      <td>18</td>
                      <td>25,000.00 - 25,999.99</td>  
                      <td>25,000.00</td>                  
                      <td>625.00</td>  
                      <td>312.50</td>  
                      <td>312.50</td> 
                      </tr>
                      <tr>
                      <td>19</td>
                      <td>26,000.00 - 26,999.99</td>  
                      <td>26,000.00</td>                  
                      <td>650.00</td>  
                      <td>325.00</td>  
                      <td>325.00</td> 
                      </tr>
                      <tr>
                      <td>20</td>
                      <td>27,000.00 - 27,999.99</td>  
                      <td>27,000.00</td>                  
                      <td>675.00</td>  
                      <td>337.50</td>  
                      <td>337.50</td> 
                      </tr>
                      <tr>
                      <td>21</td>
                      <td>28,000.00 - 28,999.99</td>  
                      <td>28,000.00</td>                  
                      <td>700.00</td>  
                      <td>350.00</td>  
                      <td>350.00</td> 
                      </tr>
                      <tr>
                      <td>22</td>
                      <td>29,000.00 - 29,999.99</td>  
                      <td>29,000.00</td>                  
                      <td>725.00</td>  
                      <td>362.50</td>  
                      <td>362.50</td> 
                      </tr>
                      <tr>
                      <td>23</td>
                      <td>30,000.00 - 30,999.99</td>  
                      <td>30,000.00</td>                  
                      <td>750.00</td>  
                      <td>375.00</td>  
                      <td>375.00</td> 
                      </tr>
                      <tr>
                      <td>24</td>
                      <td>31,000.00 - 31,999.99</td>  
                      <td>31,000.00</td>                  
                      <td>775.00</td>  
                      <td>387.50</td>  
                      <td>387.50</td> 
                      </tr>
                      <tr>
                      <td>25</td>
                      <td>32,000.00 - 32,999.99</td>  
                      <td>32,000.00</td>                  
                      <td>800.00</td>  
                      <td>400.00</td>  
                      <td>400.00</td> 
                      </tr>
                      <tr>
                      <td>26</td>
                      <td>33,000.00 - 33,999.99</td>  
                      <td>33,000.00</td>                  
                      <td>825.00</td>  
                      <td>412.50</td>  
                      <td>412.50</td> 
                      </tr>
                      <tr>
                      <td>27</td>
                      <td>34,000.00 - 34,999.99</td>  
                      <td>34,000.00</td>                  
                      <td>850.00</td>  
                      <td>425.00</td>  
                      <td>425.00</td> 
                      </tr>
                      <tr>
                      <td>28</td>
                      <td>35,000.00 - 35,999.99</td>  
                      <td>35,000.00</td>                  
                      <td>875.00</td>  
                      <td>437.50</td>  
                      <td>437.50</td> 
                      </tr>
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
