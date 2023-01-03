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

$Schol_name = null;
$income = null;
$fre_name = null;
$relation = null;
$sibN = null;
$sibD = null;
$sibC = null;

$var1 = 'Y';
$var2 = 'N';


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
}

$sql1 = "SELECT scholarship.Schol_name,eligible.Schol_id,Credit,CGPA FROM eligible,scholarship where scholarship.Schol_id=eligible.Schol_id and eligible.Credit<=" . $credit . " and eligible.CGPA<=" . $cgpa . "";


//print_r($sql1);
if($result1 = $conn->query($sql1)){

while ($row = $result1->fetch_assoc()) {

  $output[] = $row;
}

}


if (isset($_POST["submit"])) {


  $status = 1;

  $Schol_name = $_POST['scholarship'];




  //echo $Schol_name;

  if ($Schol_name == 1) {


    echo "test";


    $income = $_POST['income'];
    $income = "Annual Income : " . $income;

    $N_fam = $_POST['N_fam'];
    $N_fam = "No. of family members:" . $N_fam;

    for ($i = 0; $i < 2; $i++) {

      $sql2 = "INSERT INTO questions (S_id, Schol_id, qa)
      VALUES ('" . $id . "', '" . $Schol_name . "', '" . $income . "' )";


      if ($conn->query($sql2) == TRUE) {

        // echo "Record Modified Successfully";

      }

      $income = $N_fam;
    }
  }

  if ($Schol_name == 2) {

   // echo "test1";


    $check = $_POST['opt'];
    $check = "Freedom Fighter:" . $check;
    // echo $check;
    $fre_name = $_POST['N_freedom'];
    $fre_name = "Freedom Fighter Name:" . $fre_name;
    //echo $fre_name;
    $relation = $_POST['relation'];
    $relation = "Freedom Fighter Relation:" . $relation;



    for ($i = 0; $i < 3; $i++) {


      
      if ($i == 1) {
        $check = $fre_name;
        //echo $check;
      }
      

      if ($i == 2) {
        $check = $relation;
      }

      $sql2 = "INSERT INTO questions (S_id, Schol_id, qa)
      VALUES ('" . $id . "', '" . $Schol_name . "', '" . $check . "' )";


      if ($conn->query($sql2) == TRUE) {

        // echo "Record Modified Successfully";

      }
    }
  }
  if($Schol_name == 3){
     
    $sql2 = "INSERT INTO questions (S_id, Schol_id, qa)
    VALUES ('" . $id . "', '" . $Schol_name . "', '' )";


    if ($conn->query($sql2) == TRUE) {

      // echo "Record Modified Successfully";

    }




  }
  if ($Schol_name == 4) {

    $sibN = $_POST['sib_name'];
    $sibN = "Sibling Name:" . $sibN;
    $sibD = $_POST['dept'];
    $sibD = "Sibling Dept:" . $sibD;
    $sibC = $_POST['credit'];
    $sibC = "Sibling Credit:" . $sibC;
// echo $sibC;
    for ($j = 0; $j < 3; $j++) {

     
     

      if ($j == 1) {
       
        $sibN = $sibD;
      }

      if ($j == 2) {

        
        $sibN = $sibC;
      }



      $sql2 = "INSERT INTO questions (S_id, Schol_id, qa)
      VALUES ('" . $id . "', '" . $Schol_name . "', '" . $sibN . "' )";


      if ($conn->query($sql2) == TRUE) {

        // echo "Record Modified Successfully";

      }
    }
  }

  if ($conn->query($sql) == TRUE) {

    // echo "Record Modified Successfully";

  }

  $sql3 = "INSERT INTO application (S_id, Schol_id) VALUES ('" . $id . "', '" . $Schol_name . "' )";

  //print_r($sql3);
  if ($conn->query($sql3) == TRUE) {

    // echo "Record Modified Successfully";

  }


  $sql4 = "UPDATE student_info set status=1 WHERE student_info.S_id = '" . $id . "'";

  if ($conn->query($sql4) == TRUE) {
  }

  header("Location: msg.php");
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
          <a href="#"><i class="fa fa-tachometer"></i><span style="margin-left: 10px;"></span>Check Result</a>
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
                <h2 class="text-center">Apply for Scholarship</h2>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <label for="schol">Eligible Scholarship Names:</label>
                  <select name="scholarship" id="scholarship">

                    <option value="0">Choose option</option>
                    <?php

                    for ($i = 0; $i < count($output); $i++) {

                    ?>

                      <option value="<?php echo $output[$i]["Schol_id"] ?>"><?php echo $output[$i]["Schol_name"] ?></option>

                    <?php
                    }
                    ?>
                  </select>
                  <br><br>

                  <div id="div1" style="width:70%">

                    <label for="income">Annual Income of Family</label>
                    <input type="text" id="income" name="income" value="<?php echo $income; ?>">

                    <label for="N_fam">Number of family members</label>
                    <input type="number" id="N_fam" name="N_fam" value="<?php echo $N_fam; ?>">

                    <!-- <label for="credit">Credit</label>
                  <input type="text" id="credit" name="credit" value=""> -->

                  </div>


                  <div id="div2" style="width:70%">


                    <label>Any Freedom Fighter in our family?</label>
                    <input type="radio" id="Yes" name="opt" value="<?php echo $var1; ?>">
                    <label for="yes">YES</label>
                    <input type="radio" id="No" name="opt" value="N">
                    <label for="no">NO</label><br>
                    <br>

                    <label for="N_freedom">Name</label>
                    <input type="text" id="N_freedom" name="N_freedom" value="<?php echo $fre_name; ?>">

                    <label for="relation">Relationship with you</label>
                    <input type="text" id="relation" name="relation" value="<?php echo $relation; ?>">

                  </div>




                  <div id="div3" style="width:70%">



                  </div>

                  <div id="div4" style="width:70%">

                    <label for="sib_name">Sibling's Name</label>
                    <input type="text" id="sib_name" name="sib_name" value="<?php echo $sibN; ?>">

                    <label for="dept">Department</label>
                    <input type="text" id="dept" name="dept" value="<?php echo $sibD; ?>">

                    <label for="credit">Credit</label>
                    <input type="text" id="credit" name="credit" value="<?php echo $sibC; ?>">

                  </div>

                  <input type="submit" name="submit" id="submit" value="Submit">
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