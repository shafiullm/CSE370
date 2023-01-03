<?php
include "Connection.php";
session_start();
error_reporting(0);
if(strlen($_SESSION['submit'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

        if(isset($_POST['approve_btn'])){

            $aid = $_POST['approve_ID'];
            $query = "INSERT into scholarship_info(ID, Fullname) SELECT student_info.ID, student_info.FullName from student_info WHERE ID = '$aid'";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run){
                $query1 = "UPDATE student_info SET Approved_Status = 'Yes' WHERE id = '$aid'";
                $query_run = mysqli_query($conn, $query1);
                $_SESSION['approve'] = "Approved"; 
                header('location: pending-applications.php');
            }
            else{
            $_SESSION['notApprove'] = "Data is not approved";
            header('location: pending-applications.php');
            
            }
            }
if(isset($_POST['delete_btn'])){

    $id = $_POST['delete_ID'];
    $query = "DELETE FROM student_info WHERE ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
    
        $_SESSION['success'] = "Data is deleted"; 
        header('location: pending-applications.php');
    }
    else{
    $_SESSION['status'] = "Data is not deleted";
    header('location: pending-applications.php');
    
    }
    }
}
?>