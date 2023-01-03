<?php


session_start();

include "Connection.php";

$name =  $_SESSION["u_name"];

$id = null;
$u_name = null;
$f_name = null;
$cgpa = null;
$credit = null;
$major = null;
$mail = null;
$mobile = null;

$sql = "SELECT * FROM student_info WHERE username='" . $name . "'";

// print_r($sql);

$result = $conn->query($sql);




while ($row = $result->fetch_assoc()) {
  $status = $row['status'];
  $id = $row['S_id'];
  $u_name = $row['username'];
  $f_name = $row['FullName'];
  $cgpa = $row['CGPA'];
  $credit = $row['Credit'];
  $major = $row['major'];
  $mail = $row['MailAddress'];
  $mobile = $row['MobileNumber'];
}

$sql1 = "SELECT scholarship.Schol_name,eligible.Schol_id,Credit,CGPA FROM eligible,scholarship where scholarship.Schol_id=eligible.Schol_id and eligible.Credit<=" . $credit . " and eligible.CGPA<=" . $cgpa . "";


//print_r($sql1);
$result1 = $conn->query($sql1);

while ($row = $result1->fetch_assoc()) {

  $output[] = $row;
}

// var_dump($output);



$conn->close();
?>



<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Scholarship Project</title>

  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="style.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Chosen CSS File -->

  <!-- <link rel="stylesheet" href="chosen/css/chosen.css"> -->

  <!-- Chosen CSS File -->

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header text-center pt-5">
        <h2>STUDENT PANEL</h2>
        <h5 class="sidebar-logo-text pt-2">University Scholarship Management System</h5>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="myprofile.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>My Profile</a>
        </li>
        <?php
        if ($status == '0') {
        ?>
          <li>
            <a href="applySchol.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Apply for Scholarship</a>
          </li>
        <?php
        }
        ?>
        <li>
          <a href="check.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Check Result</a>
        </li>
        <li>
          <a href="index.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Logout</a>
        </li>
      </ul>

    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light cstm-bg-navbar">
        <!-- <button class="btn btn-collapse" id="menu-toggle" style="background-color: #52616b00;"><span
            style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776;
          </span></button> -->
        <h2 class="pl-5">Hi <?php echo $u_name; ?>!</h2>
      </nav>

      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
          <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card-5">
              <!-- <div class="card-heading">
                <h2 class="text-center">Apply for Scholarship</h2>
              </div> -->
              <div class="card-body">

                <h2 class="text-center">Successfully Applied for the Scholarship!!!</h2>
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
        </div>
      </div>
    </div>


    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {


      $("#div1").hide();
      $("#div2").hide();
      $("#div3").hide();
      $("#div4").hide();


      $("#scholarship").change(function() {

        var x = $("#scholarship").val();

        console.log(x);

        if (x == '0') {
          $("#div1").hide();
          $("#div2").hide();

          $("#div3").hide();
          $("#div4").hide();
        }

        if (x == '1') {

          $("#div1").show();
          $("#div2").hide();

          $("#div3").hide();
          $("#div4").hide();
        }

        if (x == '2') {


          $("#div1").hide();
          $("#div2").show();
          $("#div3").hide();
          $("#div4").hide();
        }

        if (x == '3') {
          $("#div1").hide();
          $("#div2").hide();
          $("#div3").show();
          $("#div4").hide();
        }

        if (x == '4') {

          $("#div3").hide();
          $("#div4").show();
        }



      });

    });
  </script>








  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#menu-toggle').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>







</body>

</html>