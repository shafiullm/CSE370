<?php

include "Connection.php";
session_start();
error_reporting(0);
if(strlen($_SESSION['submit'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

?>
<?php
   if(isset($_SESSION['approve']) && $_SESSION['approve'] != '')
   { 
       echo '<h2 class="bg-primary">'.$_SESSION['approve'].'</h2>';
   unset($_SESSION['approve']);
   }
   if(isset($_SESSION['notApprove']) && $_SESSION['notApprove'] != ''){
echo '<h2 class="bg-danger">'.$_SESSION['notApprove']. '</h2>';
unset($_SESSION['notApprove']);

   }     
?>
<?php
   if(isset($_SESSION['success']) && $_SESSION['success'] != '')
   { 
       echo '<h2 class="bg-primary">'.$_SESSION['success'].'</h2>';
   unset($_SESSION['success']);
   }
   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
echo '<h2 class="bg-danger">'.$_SESSION['status']. '</h2>';
unset($_SESSION['status']);

   }     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Students</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

        </style>
<!-- niggascript -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">



    </head>
    <body class="top-navbar-fixed">


<!-- niggascript2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>









        <div class="main-wrapper">
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">  

                    <div class="main-page">
                        
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Pending Applications</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                            <?php
                                                       $connection = mysqli_connect("localhost","root","");
                                                       $db = mysqli_select_db($connection, 'scholarship');
                                                       
                                                       $query = "SELECT * FROM student_info";
                                                       $query_run = mysqli_query($connection, $query);
                                            ?>
                                                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Major</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Approval Status</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                       if($query_run)
                                                       {
                                                            foreach($query_run as $row)
                                                            {
                                                ?>
                                                <tbody>
                                                    <tr>
                                                    <td> <?php echo $row['ID']; ?> </td>
                                                    <td> <?php echo $row['FullName']; ?> </td>
                                                    <td> <?php echo $row['Major']; ?> </td>
                                                    <td> <?php echo $row['Email']; ?> </td>
                                                    <td> <?php echo $row['Contact']; ?> </td>
                                                    <td> <?php echo $row['Approved_Status']; ?> </td>
                                                   
                                                    <form action="code1.php" method="post">
                                                    <input type="hidden" name="approve_ID" value="<?php echo $row['ID']; ?>">
                                                    <td> <button type="submit" name = "approve_btn" class="btn btn-success approvebtn">Approve</button>
                                                    </form>
                                                     
                                                    <form action="code1.php" method="post">
                                                    <input type="hidden" name="delete_ID" value="<?php echo $row['ID']; ?>">
                                                    <button type="submit" name = "delete_btn" class="btn btn-danger deletebtn">Deny</button>
                                                    </form>           

                                                    </form>
                                                     </td>
                                                </tbody>
                                                <?php
                                                            }

                                                       }
                                                       else{
                                                           echo "No Data Found";
                                                       }
                                                ?>
                                                
                                                </table> 
                                                
                                                <form action="admin.php">
                                        <button type="submit" name="submit" class="btn btn-primary">Back</button>
                                        </form>

<!-- <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> Delete Nigga</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="deletecode.php" method="POST">
<div class='modal-body'>
<input type="hidden" name="update_id" id="update_id">
<h4> Do you want to Delete this data? </h4>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-scondary" data-dismiss="modal">No</button>
<button type="submit" name="updatedata" class="btn btn-primary">Ye Nigga</button>
</div>
</form> -->













                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } 

// if(isset($_POST['delete_btn'])){

// $id = $_POST['delete_ID'];
// $query = "DELETE  FROM student_info WHERE ID = '$id'";
// $query_run = mysqli_query($Connection, $query);

// if($query_run){

//     $_SESSION['success'] = "Data is deleted"; 
//     header('location: all-students.php');
// }
// else{
// $_SESSION['status'] = "Data is not deleted";
// header('location: all-students.php');

// }
// }



?>