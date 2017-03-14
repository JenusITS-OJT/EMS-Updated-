<?php
session_start();
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
$logid=$_SESSION['session']['logid'];
$sql="SELECT e.`Profile_Pic`
     FROM  employee as e
     WHERE e.`User_ID` = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$profile_pic = $row[0];
if(!isset($name))
  {
    header('Location: S_Login_NoAccess.php?id=failed&msg=Please insert valid credential!');
  }
require ('F_Connection.php');
?>

  <header class="main-header" >
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="logo.png" alt="Jenus ITS" height="20" width="50"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../dist/img/logo.png" alt="Jenus ITS" height="55" width="200"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $profile_pic; ?>" class="user-image" alt="User Image">
              <span class="username text-yellow" style="font-size: 12pt;"><?php echo $name?></span>              
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                <p class="text-yellow">
                  <?php echo $name; ?>
                  <br>
                  <?php echo $jobtitle; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="T_ViewProfile_.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="User_Account.php" class="btn btn-default btn-flat">Account</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="F_Logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </div>
                <!-- /.row -->
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>