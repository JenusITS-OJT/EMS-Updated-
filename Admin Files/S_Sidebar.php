<?php
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
$sql="SELECT e.`Profile_Pic`
     FROM  employee as e
     WHERE e.`User_ID` = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$profile_pic = $row[0];
require ('F_Connection.php');
?>
  <!-- BEGIN SIDEBAR -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">        
          <p class="text-yellow"><?php echo $name?></p>
          <small class="text-yellow"><?php echo $jobtitle?></small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="S_Dashboard.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview">
         <a href="#">
            <i class="fa fa-gear "></i>
            <span>Configuration Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-info "></i>Profiling</a></li>
            <li><a href="CM_Branch.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Branch</a></li>
            <li><a href="CM_Department.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Department</a></li>
            <li><a href="CM_JobTitle.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Job Title</a></li>
            <li><a href="CM_Team.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Team</a></li>

            <li><a href="#"><i class="fa fa-reorder"></i>Attendance/Leave</a></li>
            <li><a href="CM_Holiday.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Holiday</a></li>

            <li><a href="#"><i class="fa fa-money"></i>Payroll</a></li>
            <li><a href="CM_Allowance.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Allowance</a></li>  
          </ul>
          
        </li>

        <li class="treeview">
         <a href="#">
            <i class="fa fa-tasks"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>      

          <ul class="treeview-menu">
            <li><a href="T_SetCredential.php"><i class="fa fa-circle-o"></i>Set Credential</a></li>
            <li><a href="T_ManageAttendance.php"><i class="fa fa-circle-o"></i>Manage Attendance</a></li>
            <li><a href="T_SetSchedule.php"><i class="fa fa-circle-o"></i>Set Schedule</a></li>
            <li><a href="T_UpdateSchedule.php"><i class="fa fa-circle-o"></i>Update Schedule</a></li>
            <li><a href="T_GeneratePayroll.php"><i class="fa fa-circle-o"></i>Generate Payroll</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-search"></i>
            <span>Queries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="Q_Attendance.php"><i class="fa fa-circle-o"></i>Attendance</a></li>
            <li><a href="Q_Schedule.php"><i class="fa fa-circle-o"></i>Schedule</a></li>
            <li><a href="Q_Log.php"><i class="fa fa-circle-o"></i>System Log</a></li>
            <li><a href="Q_EmployeeList.php"><i class="fa fa-circle-o"></i>Employee List</a></li>
            <li><a href="Q_PagIbig.php"><i class="fa fa-circle-o"></i>PAG-IBIG Table</a></li>
            <li><a href="Q_PhilHealth.php"><i class="fa fa-circle-o"></i>PhilHealth Advisory</a></li>
            <li><a href="Q_SSS.php"><i class="fa fa-circle-o"></i>SSS Contribution Schedule</a></li>
            <li><a href="Q_Tax.php"><i class="fa fa-circle-o"></i>Withholding Tax Table</a></li>  
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>

          </a>

          <ul class="treeview-menu">
            <li><a href="R_Attendance.php"><i class="fa fa-circle-o"></i>Attendance Summary</a></li>
            <li><a href="R_EmployeeMasterlist.php"><i class="fa fa-circle-o"></i>Employee Masterlist</a></li>
            <li><a href="R_Payslip.php"><i class="fa fa-circle-o"></i>Payslip</a></li>
            <li><a href="R_PayrollSummary.php"><i class="fa fa-circle-o"></i>Payroll Summary</a></li>
            <li><a href="R_SSS.php"><i class="fa fa-circle-o"></i>SSS Contribution Summary</a></li>
            <li><a href="R_TardinessLate.php"><i class="fa fa-circle-o"></i>Tardiness/Late Summary</a></li>  
            <li><a href="R_SalarySummary.php"><i class="fa fa-circle-o"></i>Team's Salary Summary</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>