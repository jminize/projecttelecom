<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
 <?php
include "../connect.php";
session_start();
include "./check_status_login.php";
//เบอร์พนักงานที่ใช้งาน
$sql=$mysqli->query("SELECT count(DISTINCT tel) as usedtel
                    FROM emp_tel
                    ");
$result=$sql->num_rows;
while($row=$sql->fetch_assoc()){
    $usedtel_emp=$row['usedtel'];
}
//เบอร์หอพักที่ใช้งาน
$sql=$mysqli->query("SELECT count(DISTINCT tel) as usedtel
                    FROM hotel_tel
                    ");
$result=$sql->num_rows;
while($row=$sql->fetch_assoc()){
    $usedtel_hotel=$row['usedtel'];
}
//เบอร์ประจำชั้นที่ใช้งาน
$sql=$mysqli->query("SELECT count(DISTINCT tel) as usedtel
                    FROM private_tel
                    ");
$result=$sql->num_rows;
while($row=$sql->fetch_assoc()){
    $usedtel_private=$row['usedtel'];
}

//เบอร์ทั้งหมด
$sql=$mysqli->query("SELECT count(DISTINCT tel) as alltel
                    FROM terminal
                    WHERE eq_id='AB001F01A001' AND t_id LIKE 'pt%'
                    ");
$result=$sql->num_rows;
while($row=$sql->fetch_assoc()){
    $alltel=$row['alltel'];
}
//พนักงานทั้งหมด
$sql=$mysqli->query("SELECT count(DISTINCT emp_id) as allemp
                    FROM employee
                    ");
$result=$sql->num_rows;
while($row=$sql->fetch_assoc()){
    $allemp=$row['allemp'];
}
?>
<?php
    $page='indexuser';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/TOT.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      TOT
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--    icons     -->
  <link rel="stylesheet" href="./assets/vendor/font-awesome/css/font-awesome.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css"
        rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <!--style custom-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />

    <!-- pagination data table -->
    <link rel="stylesheet" type="text/css"
        href="./assets/css/bootstrap/bootstrap.css" />
</head>

<body class="">
  <div class="wrapper ">
    <?php
        include 'header.php';
    ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php
      include './navbar.php';
      ?>
      <!-- End Navbar -->
      <div class="content">
      <div class="container-fluid">
        <div class="row">
        <h3>ยินดีต้อนรับเข้าสู่ระบบวงจรข่ายสายโทรศัพท์ภายในสถาบันวิชาการทีโอที</h3>
        </div>
        <br>
      <div class="row">
        <!-- card -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">เบอร์โทรพนักงาน</p>
                  <h3 class="card-title"><?=$usedtel_emp;?>/<?=$alltel;?><br>
                    <small>เบอร์</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;&nbsp;<a href="./SearchTel.php">ค้นหาเบอร์</a>
                  </div>
                </div>
              </div>
            </div>
        <!-- end card -->
        <!-- card -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">พนักงานทั้งหมด</p>
                  <h3 class="card-title"><?=$allemp;?><br>
                    <small>คน</small>
                  </h3>  
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;&nbsp;<a href="./structure.php">ค้นหาพนักงาน</a>
                  </div>
                </div>
              </div>
            </div>
        <!-- end card -->   
        <!-- card -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-building" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">เบอร์โทรหอพัก</p>
                  <h3 class="card-title"><?=$usedtel_hotel;?>/<?=$alltel;?><br>
                    <small>เบอร์</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;&nbsp;<a href="./SearchTel_hotel.php">ค้นหาเบอร์</a>
                  </div>
                </div>
              </div>
            </div>
        <!-- end card -->
        <!-- card -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-university" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">เบอร์ประจำชั้น</p>
                  <h3 class="card-title"><?=$usedtel_private;?>/<?=$alltel;?><br>
                    <small>เบอร์</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;&nbsp;<a href="./SearchTel_private.php">ค้นหาเบอร์</a>
                  </div>
                </div>
              </div>
            </div>
        <!-- end card -->  
          </div>
      </div>
      </div>
      <!--====================================================footer====================================================-->
      <?php
      include './footer.php';
      ?>
      <!--====================================================footer====================================================-->
    </div>
  </div>

 <!--======================================= Modal logout ===============================================-->
    
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                     <div class="modal-body">
                         คลิกปุ่ม Logout เพื่อออกจากระบบ
                </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>  Close</button>
                     <a class="btn btn-facebook" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
             </div>
          </div>
        </div>                  
        <!--=================================== End Modal logout =============================================-->




  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.js"
        type="text/javascript"></script>


    <script type="text/javascript">
    
    </script>
</body>

</html>
