<?php
session_start();
include "sql.php";


// Api Login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";

    if ($result = $conn -> query($sql)) {
        $row = $result -> fetch_assoc();
        $num = $result -> num_rows;

        if($num == 1) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            $arr = Array("status"=>"true", "role"=>$row['role']);
            echo json_encode($arr);
        } else {
            $arr = Array("status"=>"false");
            echo json_encode($arr);
        }
        // Free result set
        $result -> free_result();
      }
      
      $conn -> close();
}

?>