<?php

include "Connection.php";
error_reporting(0);



$sql = "SELECT application.S_id, student_info.FullName,student_info.CGPA,student_info.Credit, student_info.major,student_info.MailAddress,student_info.MobileNumber, scholarship.Schol_name,questions.qa 
FROM application, student_info, scholarship, questions 
WHERE application.S_id=student_info.S_id AND application.Schol_id=scholarship.Schol_id 
AND application.S_id=questions.S_id AND application.Schol_id=questions.Schol_id
AND application.S_id='" . $_GET['id'] . "'";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    $id = $row['S_id'];
    
    $f_name = $row['FullName'];
    $cgpa = $row['CGPA'];
    $credit = $row['Credit'];
    $major = $row['major'];
    $mail = $row['MailAddress'];
    $mobile = $row['MobileNumber'];
    $schol = $row['Schol_name'];
    $QA[] = $row['qa'];

    
}
 


if (isset($_POST['approve'])) {

    $sql = "UPDATE application set status='a' WHERE S_id = '" . $id . "'";

    if ($conn->query($sql) == TRUE) {

        // echo "Record Modified Successfully";

    }
    header("Location: admin.php");
}

if (isset($_POST['deny'])) {

    $sql = "DELETE FROM application where S_id = '" . $id . "'";

    if ($conn->query($sql) == TRUE) {

        // echo "Record Modified Successfully";

    }
    header("Location: admin.php");
}
//   var_dump($QA);


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
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="card-5">

                            <div class="card-body">


                                <label for="student_id">Student ID :</label>
                                <span id="id" name="id" value=""><?php echo $id; ?></span><br>

                                <label for="full_name">Full Name : </label>
                                <span type="text" id="fname" name="fname" value=""><?php echo $f_name; ?></span><br>

                                <label for="full_name">Major : </label>
                                <span type="text" id="fname" name="fname" value=""><?php echo $major; ?></span><br>

                                <label for="full_name">CGPA : </label>
                                <span type="text" id="fname" name="fname" value=""><?php echo $cgpa; ?></span><br>

                                <label for="full_name">Credit : </label>
                                <span type="text" id="fname" name="fname" value=""><?php echo $credit; ?></span><br>

                                <label for="mail">Mail Address : </label>
                                <span type="email" id="mail" name="mail" value=""><?php echo $mail; ?></span><br>

                                <label for="mobile">Mobile Number : </label>
                                <span type="number" id="mobile" name="mobile" value=""><?php echo $mobile; ?></span><br>

                                <label for="mail">Applied For : </label>
                                <span type="email" id="mail" name="mail" value=""><?php echo $schol; ?></span><br>

                                <label for="mail">Informations : </label><br>

                                <?php
                                for ($i = 0; $i < count($QA); $i++) {
                                ?>

                                    <span type="email" id="mail" name="mail" value=""><?php echo $QA[$i] ?></span><br>

                                <?php
                                }

                                ?>


                                <form action="" method="post">
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                            <input type="submit" name="approve" id="approve" value="Approve">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                            <input type="submit" name="deny" id="deny" value="Deny">
                                        </div>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
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