<?php
include "Connection.php";
session_start();
error_reporting(0);
if(strlen($_SESSION['submit'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['delete_btn'])){

    $id = $_POST['delete_ID'];
    $query = "DELETE FROM student_info WHERE ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
    
        $_SESSION['success'] = "Data is deleted"; 
        header('location: all-students.php');
    }
    else{
    $_SESSION['status'] = "Data is not deleted";
    header('location: all-students.php');
    
    }
    }
}
?>