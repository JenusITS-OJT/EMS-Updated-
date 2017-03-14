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
          <small>| SSS Contribution Table 2014</small>
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
              <h4 class="box-title"> The additional 0.6% in the contribution rate shall be shouldered equally by the employer (ER) and employee (EE) who shall pay at 7.37% and 3.63%, respectively. Self-Employed (SE), Voluntary Members (VM) and OFW's shall pay at the total rate of 11%. The maximum salary credit (MSC) has increased to Php16,000.</h4>
             </div>

              <div class="box-body">
                <div id="logs" class="logs_wrapper form-inline dt-bootstrap">

                 <div class="row">
                 <div class="col-sm-12">
                 <div class="table-responsive" style="overflow-x:auto;">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <div align="center">
                      <tr>
                        <th rowspan="3" width="15%">Range of Compensation</th>
                        <th rowspan="3">Monthly Salary Credit*</th>
                        <th colspan="7">EMPLOYER-EMPLOYEE</th>
                        <th rowspan="2">SE/VM/OFW</th>
                      </tr>
                      </div>
                    </thead>
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th colspan="3">Social Security</th>
                        <th rowspan="2">EC</th>
                        <th colspan="3">Total Contribution</th>
                      </tr>
                    </thead>
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>ER</th>
                        <th>EE</th>
                        <th>TOTAL</th>
                        <th></th>
                        <th>ER</th>
                        <th>EE</th>
                        <th>TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>  
                      <td>1,000 - 1,249.99</td>
                      <td>1,000</td>
                      <td>73.70</td>
                      <td>36.30</td>
                      <td>110.00</td>
                      <td>10.00</td>
                      <td>83.70</td>
                      <td>36.30</td>
                      <td>120.00</td>
                      <td>110.00</td>
                      </tr>
                      <tr>  
                      <td>1,250 - 1,749.99</td>
                      <td>1,500</td>
                      <td>110.50</td>
                      <td>54.50</td>
                      <td>165.00</td>
                      <td>10.00</td>
                      <td>120.50</td>
                      <td>54.50</td>
                      <td>175.00</td>
                      <td>165.00</td>
                      </tr>
                      <tr>  
                      <td>1,750 - 2,249.99</td>
                      <td>2,000</td>
                      <td>147.30</td>
                      <td>72.70</td>
                      <td>220.00</td>
                      <td>10.00</td>
                      <td>157.30</td>
                      <td>72.70</td>
                      <td>230.00</td>
                      <td>220.00</td>
                      </tr>
                      <tr>  
                      <td>2,250 - 2,749.99</td>
                      <td>2,500</td>
                      <td>184.20</td>
                      <td>90.80</td>
                      <td>275.00</td>
                      <td>10.00</td>
                      <td>194.20</td>
                      <td>90.80</td>
                      <td>285.00</td>
                      <td>275.00</td>
                      </tr>
                      <tr>  
                      <td>2,750 - 3,249.99</td>
                      <td>3,000</td>
                      <td>221.00</td>
                      <td>109.00</td>
                      <td>330.00</td>
                      <td>10.00</td>
                      <td>231.00</td>
                      <td>109.00</td>
                      <td>340.00</td>
                      <td>330.00</td>
                      </tr>
                      <tr>  
                      <td>3,250 - 3,749.99</td>
                      <td>3,500</td>
                      <td>257.80</td>
                      <td>127.20</td>
                      <td>385.00</td>
                      <td>10.00</td>
                      <td>267.80</td>
                      <td>127.20</td>
                      <td>395.00</td>
                      <td>385.00</td>
                      </tr>
                      <tr>  
                      <td>3,750 - 4,249.99</td>
                      <td>4,000</td>
                      <td>294.70</td>
                      <td>145.30</td>
                      <td>440.00</td>
                      <td>10.00</td>
                      <td>304.70</td>
                      <td>145.30</td>
                      <td>450.00</td>                    
                      <td>440.00</td>
                      </tr>
                      <tr>  
                      <td>4,250 - 4,749.99</td>
                      <td>4,500</td>
                      <td>331.50</td>
                      <td>163.50</td>
                      <td>495.00</td>
                      <td>10.00</td>
                      <td>341.50</td>
                      <td>163.50</td>
                      <td>505.00</td>
                      <td>495.00</td>
                      </tr>
                      <tr>  
                      <td>4,750 - 5,249.99</td>
                      <td>5,000</td>
                      <td>368.30</td>
                      <td>181.70</td>
                      <td>550.00</td>
                      <td>10.00</td>
                      <td>378.30</td>
                      <td>181.70</td>
                      <td>560.00</td>
                      <td>550.00</td>
                      </tr>
                      <tr>  
                      <td>5,250 - 5,749.99</td>
                      <td>5,500</td>
                      <td>405.20</td>
                      <td>199.80</td>
                      <td>605.00</td>
                      <td>10.00</td>
                      <td>415.20</td>
                      <td>199.80</td>
                      <td>615.00</td>
                      <td>605.00</td>
                      </tr>
                      <tr>  
                      <td>5,750 - 6,249.99</td>
                      <td>6,000</td>
                      <td>442.00</td>
                      <td>218.00</td>
                      <td>660.00</td>
                      <td>10.00</td>
                      <td>452.00</td>
                      <td>218.00</td>
                      <td>670.00</td>
                      <td>660.00</td>
                      </tr>
                      <tr>  
                      <td>6,250 - 6,749.99</td>
                      <td>6,500</td>
                      <td>478.80</td>
                      <td>236.20</td>
                      <td>715.00</td>
                      <td>10.00</td>
                      <td>488.80</td>
                      <td>236.20</td>
                      <td>725.00</td>
                      <td>715.00</td>
                      </tr>
                      <tr>  
                      <td>6,750 - 7,249.99</td>
                      <td>7,000</td>
                      <td>515.70</td>
                      <td>254.30</td>
                      <td>770.00</td>
                      <td>10.00</td>
                      <td>525.70</td>
                      <td>254.30</td>
                      <td>780.00</td>
                      <td>770.00</td>
                      </tr>
                      <tr>  
                      <td>7,250 - 7,749.99</td>
                      <td>7,500</td>
                      <td>552.50</td>
                      <td>272.50</td>
                      <td>825.00</td>
                      <td>10.00</td>
                      <td>562.50</td>
                      <td>272.50</td>
                      <td>835.00</td>
                      <td>825.00</td>
                      </tr>
                      <tr>  
                      <td>7,750 - 8,249.99</td>
                      <td>8,000</td>
                      <td>589.30</td>
                      <td>290.70</td>
                      <td>880.00</td>
                      <td>10.00</td>
                      <td>599.30</td>
                      <td>290.70</td>
                      <td>890.00</td>
                      <td>880.00</td>
                      </tr>
                      <tr>  
                      <td>8,250 - 8,749.99</td>
                      <td>8,500</td>
                      <td>626.20</td>
                      <td>308.80</td>
                      <td>935.00</td>
                      <td>10.00</td>
                      <td>636.20</td>
                      <td>308.80</td>
                      <td>945.00</td>
                      <td>935.00</td>
                      </tr>
                      <tr>  
                      <td>8,750 - 9,249.99</td>
                      <td>9,000</td>
                      <td>663.00</td>
                      <td>327.00</td>
                      <td>990.00</td>
                      <td>10.00</td>
                      <td>673.00</td>
                      <td>327.00</td>
                      <td>1,000.00</td>
                      <td>990.00</td>
                      </tr>
                      <tr>  
                      <td>9,250 - 9,749.99</td>
                      <td>9,500</td>
                      <td>699.80</td>
                      <td>345.20</td>
                      <td>1,045.00</td>
                      <td>10.00</td>
                      <td>709.80</td>
                      <td>345.20</td>
                      <td>1,055.00</td>
                      <td>1,045.00</td>
                      </tr>
                      <tr>  
                      <td>9,750 - 10,249.99</td>
                      <td>10,000</td>
                      <td>736.70</td>
                      <td>363.30</td>
                      <td>1,100.00</td>
                      <td>10.00</td>
                      <td>746.70</td>
                      <td>363.30</td>
                      <td>1,110.00</td>
                      <td>1,100.00</td>
                      </tr>
                      <tr>  
                      <td>10,250 - 10,749.99</td>
                      <td>10,500</td>
                      <td>773.50</td>
                      <td>381.50</td>
                      <td>1,155.00</td>
                      <td>10.00</td>
                      <td>783.50</td>
                      <td>381.50</td>
                      <td>1,165.00</td>
                      <td>1,155.00</td>
                      </tr>
                      <tr>  
                      <td>10,750 - 11,249.99</td>
                      <td>11,000</td>
                      <td>810.30</td>
                      <td>399.70</td>
                      <td>1,210.00</td>
                      <td>10.00</td>
                      <td>820.30</td>
                      <td>399.70</td>
                      <td>1,220.00</td>
                      <td>1,210.00</td>
                      </tr>
                      <tr>  
                      <td>11,250 - 11,749.99</td>
                      <td>11,500</td>
                      <td>847.20</td>
                      <td>417.80</td>
                      <td>1,265.00</td>
                      <td>10.00</td>
                      <td>857.20</td>
                      <td>417.80</td>
                      <td>1,275.00</td>
                      <td>1,265.00</td>
                      </tr>
                      <tr>  
                      <td>11,750 - 12,249.99</td>
                      <td>12,000</td>
                      <td>884.00</td>
                      <td>436.00</td>
                      <td>1,320.00</td>
                      <td>10.00</td>
                      <td>894.00</td>
                      <td>436.00</td>
                      <td>1,330.00</td>
                      <td>1,320.00</td>
                      </tr>
                      <tr>  
                      <td>12,250 - 12,749.99</td>
                      <td>12,500</td>
                      <td>920.80</td>
                      <td>454.20</td>
                      <td>1,375.00</td>
                      <td>10.00</td>
                      <td>930.80</td>
                      <td>454.20</td>
                      <td>1,385.00</td>
                      <td>1,375.00</td>
                      </tr>
                      <tr>  
                      <td>12,750 - 13,249.99</td>
                      <td>13,000</td>
                      <td>957.70</td>
                      <td>472.30</td>
                      <td>1,430.00</td>
                      <td>10.00</td>
                      <td>967.70</td>
                      <td>472.30</td>
                      <td>1,440.00</td>
                      <td>1,430.00</td>
                      </tr>
                      <tr>  
                      <td>13,250 - 13,749.99</td>
                      <td>13,500</td>
                      <td>994.50</td>
                      <td>490.50</td>
                      <td>1,485.00</td>
                      <td>10.00</td>
                      <td>1,004.50</td>
                      <td>490.50</td>
                      <td>1,495.00</td>
                      <td>1,485.00</td>
                      </tr>
                      <tr>  
                      <td>13,750 - 14,249.99</td>
                      <td>14,000</td>
                      <td>1,031.30</td>
                      <td>508.70</td>
                      <td>1,540.00</td>
                      <td>10.00</td>
                      <td>1,041.30</td>
                      <td>508.70</td>
                      <td>1,550.00</td>
                      <td>1,540.00</td>
                      </tr>
                      <tr>  
                      <td>14,250 - 14,749.99</td>
                      <td>14,500</td>
                      <td>1,068.20</td>
                      <td>526.80</td>
                      <td>1,595.00</td>
                      <td>10.00</td>
                      <td>1,078.20</td>
                      <td>526.80</td>
                      <td>1,605.00</td>
                      <td>1,595.00</td>
                      </tr>
                      <tr>  
                      <td>14,750 - 15,249.99</td>
                      <td>15,000</td>
                      <td>1,105.00</td>
                      <td>545.00</td>
                      <td>1,650.00</td>
                      <td>30.00</td>
                      <td>1,135.00</td>
                      <td>545.00</td>
                      <td>1,680.00</td>
                      <td>1,650.00</td>
                      </tr>
                      <tr>  
                      <td>15,250 - 15,749.99</td>
                      <td>15,500</td>
                      <td>1,141.80</td>
                      <td>563.20</td>
                      <td>1,705.00</td>
                      <td>30.00</td>
                      <td>1,171.80</td>
                      <td>563.20</td>
                      <td>1,735.00</td>
                      <td>1,705.00</td>
                      </tr>
                      <tr>  
                      <td>15,750 - over</td>
                      <td>16,000</td>
                      <td>1,171.80</td>
                      <td>581.30</td>
                      <td>1,760.00</td>
                      <td>30.00</td>
                      <td>1,208.70</td>
                      <td>581.30</td>
                      <td>1,790.00</td>
                      <td>1,760.00</td>
                      </tr>


                    </tbody>
                  </table>
                  </div>
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
