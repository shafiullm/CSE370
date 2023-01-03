<?php

include "Connection.php";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <div class="main-page">
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Student information</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post">
                                                
                                                
                                                <?php 
                                                $connection = mysqli_connect("localhost","root","");
                                                $db = mysqli_select_db($connection, 'scholarship'); 
                                                $query = "SELECT * from student_info join user_info where id=2020";
                                                $query_run = mysqli_query($connection,$query);
                                                $row = mysqli_fetch_array($query_run)
                                                ?>  


                                                                                           
                                            <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Name:</label>
                                            <div class="col-sm-10">
                                            <label for="default" class="col-sm-2 control-label"> <?php echo $row['FullName'] ?> </label>
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">ID:</label>
                                            <div class="col-sm-10">
                                            <label for="default" class="col-sm-2 control-label"> <?php echo $row['ID'] ?> </label>    
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Major:</label>
                                            <div class="col-sm-10">
                                            <label for="default" class="col-sm-2 control-label"> <?php echo $row['Major'] ?> </label>
                                            </div>
                                            </div>


                                            <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Email: </label>
                                            <div class="col-sm-10">
                                            <input type="text" name="email" placeholder="Your Email">
                                            </div>
                                            </div>


                                            <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Contact: </label>
                                            <div class="col-sm-10">
                                            <input type="text" name="contact" placeholder="Your Phone number">
                                            </div>
                                            </div>

                                            <?php 
                                                $connection = mysqli_connect("localhost","root","");
                                                $db = mysqli_select_db($connection, 'scholarship');
                                            if(isset($_POST['submit']))
                                                {

                                                $query1 = "UPDATE student_info SET Email='$_POST[email]', Contact='$_POST[contact]' where ID=2020";
                                                $query_run = mysqli_query($connection,$query1);

                                                if($query_run){
                                                    echo '<script type="text/javascript"> alert("Data Updated") </script>';
                                                }
                                                else{
                                                    echo '<script type="text/javascript"> alert("Cannot Update Data") </script>';
                                                }

                                            }
                                            ?>


                                            <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                            <form action="myprofile.php">
                                            <button type="back" name="back" class="btn btn-primary"><a href="myprofile.php">Back</a></button>
                                            </form>
                                            </div>
                                            </div>
                                            </div>
                                                    
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>