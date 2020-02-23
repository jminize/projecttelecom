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
    $sql=$mysqli->query("SELECT center_id,div_code
                    FROM center
                    ");
    $result=$sql->num_rows;
    $center=array();
    for($i=0;$i<$result;$i++){
      $row=$sql->fetch_assoc();
      array_push($center,$row);
    }
    unset($result);
    unset($sql);
    $page='addtel_emp';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/TOT.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    TOT
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="./assets/vendor/font-awesome/css/font-awesome.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!--select bootstrap-->
  
  <link rel="stylesheet" href="./assets/css/bootstrap-select.css">

  <link rel="stylesheet" href="./assets/css/style.css">

  <!--css datatables-->
  <link rel="stylesheet" href="./assets/css/datatables/datatables.css">
  <!-- pagination data table -->
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap/responsive.bootstrap4.min.css" />
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
          <div class="row justify-content-center">
            <div class="col-12">
              <!--=========================== card 1 ===========================-->
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">เพิ่มเบอร์โทรศัพท์พนักงาน
                </div>
                <div class="card-body">
                  <!--=========================== Block 1 ==================================-->
                  <div class="col-12">
                        <div class="form-group">
                          <div class="row justify-content-center">
                            <h3>เพิ่ม/พ่วงเบอร์โทรศัพท์พนักงาน</h3>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row justify-content-center">
                              <div class="col-12">
                                <table id="emp_all" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                      <tr>
                                      <th>รหัสพนักงาน</th>
                                      <th>ชื่อ-สกุล</th>
                                      <th>อีเมลล์</th>
                                      <th>ส่วนงานที่สังกัด</th>
                                      <th>รายละเอียดโซนที่นั่ง</th>
                                      <th>เพิ่มเบอร์</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $sql=$mysqli->query("SELECT employee.emp_id,employee.emp_name,employee.emp_email,center.div_code,employee.location
                                                      FROM employee
                                                      INNER JOIN center
                                                      ON employee.center_id=center.center_id
                                                      ORDER BY center.center_id ASC
                                                      ");
                                  while($row = $sql->fetch_assoc())
                                  {
                                  ?>
                                  <tr>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["emp_name"]; ?></td>
                                    <td><?php echo $row["emp_email"]; ?></td>
                                    <td><?php echo $row["div_code"]; ?></td>
                                    <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal_location" onclick="showlocation('<?=$row['location'];?>');">
                                          <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a></td>
                                    <td><a href="addtel_process.php?emp_id=<?php echo $row["emp_id"];?>" 
                                        class="btn btn-success">เพิ่ม</a></td> 
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>

                              </div>
                          </div>
                      </div>
                    </div>
                  <!--=========================== Block 1 ===========================-->
                </div>
              </div>
              <!--=========================== card 1 ===========================-->
            </div>
          </div>
        </div>
        <?php
        include './footer.php';
        ?>
    </div>
  </div>
  
  <!--modal location detail-->
  <div class="modal fade" id="modal_location" tabindex="1" role="dialog" aria-labelledby="Modalterminal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">สถานที่นั่ง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="row">
          <div class="col-12">
          รายละเอียดโซนที่นั่ง : 
            <span id="show_location"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--modal location detail-->
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
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js" type="text/javascript"></script>

   <!--validate-->
   <script src="./assets/vendor/validate/jquery.validate.js"></script>

    <!--data table js-->
    <script src="./assets/js/jquery.dataTables.min.js" ></script>
    <script src="./assets/js/dataTables.bootstrap4.min.js" ></script>
    <script src="./assets/js/dataTables.responsive.min.js" ></script>
    <script src="./assets/js/dataTables.bootstrap4.min.js" ></script>


    <script type="text/javascript">
    $(document).ready(function() {
            $('#emp_all').DataTable({
              "bSort":false
            });
        } );  

    selfloor_hotel=(b_eq_id)=>{
      $.ajax({
        type:"POST",
        url:"ajaxhotelfloor.php",
        data:"b_eq_id="+b_eq_id,
        success:function(result){
          $("#showfloor").html(result);
        }
      });
    }

    showlocation=(location,memo)=>{
          $("#show_location").text(location);
        }
    </script>
</body>

</html>
