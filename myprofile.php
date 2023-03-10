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
  $id = $row['S_id'];
  $u_name = $row['username'];
  $f_name = $row['FullName'];
  $cgpa = $row['CGPA'];
  $credit = $row['Credit'];
  $major = $row['major'];
  $mail = $row['MailAddress'];
  $mobile = $row['MobileNumber'];
  $status = $row['status'];

  if (isset($_POST["submit"])) {

    $id = $_POST['id'];
    $u_name = $_POST['username'];
    $f_name = $_POST['fname'];
    $cgpa = $_POST['cgpa'];
    $credit = $_POST['credit'];
    $major = $_POST['major'];
    $mail = $_POST['mail'];
    $mobile = $_POST['mobile'];



    $sql = "UPDATE student_info set FullName ='$f_name',CGPA = '$cgpa',Credit = '$credit',Major = '$major', MailAddress ='$mail', MobileNumber ='$mobile' WHERE S_id = '$id' and username ='$u_name'";

    //print_r($sql);


    if ($conn->query($sql) == TRUE) {

      // echo "Record Modified Successfully";

    }
    header("Location: viewProfile.php");
  }
}

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
          <a href="viewProfile.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>My Profile</a>
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
              <div class="card-heading">
                <h2 class="text-center">MY PROFILE</h2>
              </div>
              <div class="card-body">
                <form action="" method="post">

                  <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input class="form-inline" type="text" readonly id="id" name="id" value="<?php echo $id; ?>">
                  </div>
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" value="<?php echo $u_name; ?>">

                  <label for="full_name">Full Name</label>
                  <input type="text" id="fname" name="fname" value="<?php echo $f_name; ?>">

                  <label for="full_name">Major</label>
                  <input type="text" id="major" name="major" value="<?php echo $major; ?>">

                  <label for="full_name">CGPA</label>
                  <input type="text" id="cgpa" name="cgpa" value="<?php echo $cgpa; ?>">

                  <label for="full_name">Credit</label>
                  <input type="text" id="credit" name="credit" value="<?php echo $credit; ?>">

                  <label for="mail">Mail Address</label>
                  <input type="email" id="mail" name="mail" value="<?php echo $mail; ?>">

                  <label for="mobile">Mobile Number</label>
                  <input type="number" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                  <div class="row mt-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <input type="submit" name="submit" id="submit" value="SAVE">
                    </div>
                  </div>
                </form>
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


  <!-- Chosen JS File -->


  <script src="chosen/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="chosen/js/chosen.jquery.js" type="text/javascript"></script>
  <script>
    $(".chooseDate").chosen();
  </script>


  <!-- Chosen JS File -->


</body>

</html>