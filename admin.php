<?php

include "Connection.php";

error_reporting(0);

$sql = "SELECT application.S_id, student_info.FullName, student_info.major, scholarship.Schol_name FROM application, student_info, scholarship WHERE application.S_id=student_info.S_id and application.Schol_id=scholarship.Schol_id and application.status='p'";


$result = $conn->query($sql);
//var_dump($result);


while ($row = $result->fetch_assoc()) {

  $output[] = $row;

  //var_dump($row);

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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">


</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header text-center pt-5">
        <h2>ADMIN PANEL</h2>
        <h5 class="sidebar-logo-text pt-2">University Scholarship Management System</h5>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="dashboard.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Dashboard</a>
        </li>
        <li>
          <a href="admin.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Pending Applications</a>
        </li>
        <li>
          <a href="selected.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Selected Students</a>
        </li>
        <li>
          <a href="allStudent.php"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>All Student</a>
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
        <button class="btn btn-collapse" id="menu-toggle" style="background-color: #52616b00;"><span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776;
          </span></button>
        <!-- <h2 class="pl-5">Contract</h2> -->
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

                <div class="container-data-table">
                  <table id="custom-data-table" class="style-custom-data-table table-hover">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>

                        <th>Major</th>


                        <th>Scholarship</th>
                        <th></th>


                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      for ($i = 0; $i < count($output); $i++) {



                      ?>

                        <tr>

                          <td> <?php echo $output[$i]['S_id'] ?> </td>
                          <td> <?php echo $output[$i]['FullName'] ?> </td>
                          <td> <?php echo $output[$i]['major'] ?> </td>
                          <td> <?php echo $output[$i]['Schol_name'] ?> </td>
                          <td><button type="button" class="btn btn-cstmu"><a href="./pending.php?id=<?php echo $output[$i]['S_id'] ?>&s_id=<?php echo $output[$i]['S_id'] ?> ">Details</a></button></td>


                        </tr>


                      <?php

                      }


                      ?>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
        </div>
      </div>
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready(function() {
        $('#custom-data-table').DataTable();
      });
    </script>

    <!-- Chosen JS File -->


</body>

</html>