<?php

include "Connection.php";


if (isset($_POST["submit"])) {

    $name = $_POST["username"];

    // echo $name;
    // echo "<br>";

    $pass = $_POST["pass"];

    // echo  $pass;
    // echo "<br>";

    $id = $_POST["id"];

    // echo $id;

    $sql = "INSERT into user_info (username, password, user_id) values('" . $name . "', " . $pass . " , 2)";

    //    print_r($sql);


    $sql1 = "INSERT into student_info(S_id, username) values ('" . $id . "', '" . $name . "');";

    //    print_r($sql1);

    if ($conn->query($sql) === TRUE) {
        echo "Registration successfully";
        echo "<br>";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($sql1) === TRUE) {
       // echo "Registration successfully1";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Scholarship Management System</title>
    <link rel="icon" href="./image/logo_BCSWN.jpg" type="image/ico">

    <link rel="icon" href="./image/logo1.ico" type="image/ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
        body {
            overflow-y: hidden;
        }

        .box {
            height: 100vh;
            width: 100%;
            background: linear-gradient(210deg, rgba(0, 24, 36, 1) 12%, rgba(26, 125, 145, 1) 36%, rgba(0, 212, 255, 1) 80%);

        }

        .box1 {
            height: 15vh;
            width: 100%;
            /* background-color: black; */
        }

        .box2 {
            height: 75vh;
            width: 100%;
            /* background-color: blue; */
        }


        .box13 {
            width: auto;
            height: auto;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #192a56;
            text-align: center;

        }


        .box13 h1 {
            color: #e84118;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box13 input[type="text"],
        .box13 input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #718093;
            padding: 14px 10px;
            width: 200px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;


        }


        .box13 input[type="text"]:focus,
        .box13 input[type="password"]:focus {
            width: 230px;
            border-color: #e84118;
        }


        .box13 input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 0 auto;
            text-align: center;
            border: 2px solid #e84118;
            padding: 8px 30px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
        }


        .box13 input[type="submit"]:hover {
            background: #e84118;
        }

        .box13 a {
            color: #fff;
            text-decoration: none;



        }

        .box1 a:hover {
            background: #e84118;

        }






        .box3 {
            height: 10vh;
            width: 100%;
            /* background-color: white; */
        }



        .footer {
            position: absolute;
            left: 0;
            /* bottom: 0; */
            width: 100%;
            /* background-color: red; */
            color: white;
            text-align: center;
            padding-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="box1">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-white text-center" style=" margin:0 auto; padding-top: 3%; margin-bottom: 5vh; font-size: 35px"><b> University Scholarship Management System </b></h1>
                </div>
            </div>
        </div>



        <div class="box2">

            <form class="box13  mt-2" method="post">
                <h1>SIGN UP</h1>

                <input type="text" name="id" id="id" placeholder="Student ID">
                <!-- <label for="">Username</label> -->
                <input type="text" name="username" placeholder="Username">

                <!-- <label for="">Password</label> -->
                <input type="password" name="pass" placeholder="Password">

                <input type="submit" name="submit" value="SIGN UP">

                <div style="margin-bottom: 6px;">
                    <!-- <a href="#">Lost Your Password</a></br> -->
                    <h5>Already have an acoount?</h5>
                </div>
                <a href="./index.php" class="btn btn-outline-warning">
                    <b>LOGIN</b>
                </a>

            </form>

        </div>
        <div class="box3">
            <div class="row">
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>