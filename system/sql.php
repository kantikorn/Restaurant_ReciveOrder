<?php
$conn = new mysqli("localhost", "root", "", "school");

if ($conn -> connect_errno) {
    echo "Fail : " . $conn -> connect_error;
    exit();
  }
?>