<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password , $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restaurant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="background-color: antiquewhite; height: 100%;" >
                   <div class="container-fluid" style="margin-top: 11rem; margin-bottom: 11rem;">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="card" style="width: 100%; border-radius: 20px;">
                                    <form action="Login.php" method="post">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-3">

                                                </div>
                                                <div class="col-sm-3">
                                                    <img class="mt-3" src="Image/login.png" style="width: 170px; height: 170px; ">
                                                </div>
                                                <div class="col-sm-3">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 mt-3">
                                            <label for="Email" class="form-label">Email</label>
                                            <input class="form-control" id="Email" name="Email" placeholder="กรอกอีเมลล์ของคุณ....">
                                        </div>
                                        <div class="mb-3 mt-3 ">
                                            <label for="Password" class="form-label">Password</label>
                                            <input class="form-control" id="Password" name="Password" placeholder="กรอกรหัสของคุณ....">
                                        </div>

                                        <button class="btn btn-primary mb-3" type="submit" name="login" style=" width: 140px;">Login</button>

                                    
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>

                            <?php
                            if(isset($_POST['login'])){
                                $username = $_POST['Email'];
                                $password = $_POST['Password'];

                               $sql = "SELECT * FROM `login` WHERE  `email`='$username' AND `password`='$password'";
                                if($result = $conn -> query($sql)) {
                                    $row = $result -> fetch_assoc();
                                    $num = $result -> num_rows;

                                    if($num == 1){
                                        $_SESSION['email'] = $row['email'];
                                        $_SESSION['password'] = $row['password'];
                                       
                                        header('location: ManageRestaurant.php');
                                    }  
                                }
                                $conn -> close();
                            }

                            ?>

                            

                          

                          
                        </div>
                   </div>
            </div>
        </div>
    </div>
</body>
</html>