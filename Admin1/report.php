<?php
include "../system/api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปยอดขายรายวัน</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:rgb(9, 16, 68); font-weight: bolder;">สรุปการขายรายวัน</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navindex">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="ManageRestaurant.php">HOME</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">สรปข้อมูลการขายรายวัน</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <table class="table table-primary table-hover">
            <thead>
                <tr>
                    <!--เพิ่มใหม่เเก้ไข-->
                    <th>OrderID</th>
                    <th>FoodName</th>
                    <th>Unit</th>
                    <th>Total Price</th>
                    <th>DateSales</th>
                   
                 
                </tr>
            </thead>

            <tbody>
                <?php
                $id = $_SESSION['user_id'];
                $day = DATE("d");
                $sql = "SELECT * FROM `order_detail` WHERE day(date) = '$day'";
                $total = 0;
                if($result = $conn -> query($sql)) {
                    while($row = $result -> fetch_assoc()) {
                        $total += $row['price'];
                       
                        echo '
                        <tr>
                        <th>1011</th>  <!--เพิ่มใหม่เเก้ไข-->
                        <td>'.$row['name'].'</td>
                        <td>'.$row['unit'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['date'].'</td>
                        <!--เพิ่มใหม่เเก้ไข-->
                        
                    </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">ราคารวมทั้งสิ้น <?php echo $total ?></h5>
                </div>
            </div>
        </div>
    </div>


</body>
</html>