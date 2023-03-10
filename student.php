<?php

include "Connection.php";

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- Custom styles for this template -->
   <link rel="stylesheet" href="style.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
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
        <li>
          <a href="#"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Apply for Scholarship</a>
        </li>
        <li>
          <a href="check_result.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Check Result</a>
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
        <button class="btn btn-collapse" id="menu-toggle" style="background-color: #52616b00;"><span
            style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776;
          </span></button>
        <!-- <h2 class="pl-5">Contract</h2> -->
      </nav>

      <!-- <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
          <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card-5">
              <div class="card-heading">
                <h2 class="text-center">Contract Information</h2>
              </div>
              <div class="card-body">
                <form action="" method="post">
                 

                  <label for="project-id">Project</label>
                  <input type="text" id="prjct-id" name="prjct-id">

                  <label for="est-cost">Package</label>
                  <input type="text" id="est-cost" name="est-cost">

                  <label for="sofc">Supplier</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Price</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Value</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Currency </label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Type</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Issue Date</label>
                  <input type="date" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Refference No.</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Security Expiry Date</label>
                  <input type="date" id="sofc" name="sofc">

                  <label for="sofc">Bank</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Branch</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Type</label>
                  <input type="text" id="sofc" name="sofc">

                  <label for="sofc">Contract Date</label>
                  <input type="date" id="sofc" name="sofc">

                  <label for="sofc">Contract Expiry Date</label>
                  <input type="date" id="sofc" name="sofc">

                  <div class="row mt-3">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <input type="submit" value="SAVE">
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
        </div>
      </div>
    </div> -->

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#menu-toggle').on('click', function () {
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