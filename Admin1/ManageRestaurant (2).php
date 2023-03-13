<?php
include "../system/api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Restaurant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand mt-3" href="#" style="color:rgb(15, 10, 60); font-weight: bolder;">Welcome Restaurant</a>

          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navindex">
                <a class="btn btn-primary" type="button" href="ManageRestaurant.php">click</a>
            </button>

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary mt-3" type="button" href="addcate.html">เพิ่มหมวดหมู่อาหาร +</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary mt-3" type="button" href="addmenu.html">เพิ่มเมนูอาหาร +</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary mt-3" type="button" href="report.html">สรุปการขายรายวัน</a>
                    </li>

                    <!--เเก้ไขใหม่-->
                    <li class="nav-item mt-3"  style="margin-left: 10px;">
                        <form action="ManageRestaurant.php" method="post">
                            <button class="btn btn-danger" type="submit" name="logout">ออกจากระบบ</button>
                        </form>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">ออร์เดอร์ทั้งหมด</h5>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-3">
        <div class="row">
        <?php
        $total = 0;
            $sql = "SELECT * FROM `order_init` WHERE 1 AND `status`!='complete'";
            if($result = $conn -> query($sql)) {
                while($rows = $result -> fetch_assoc()) {
                    $id = $rows['order_init_id'];
                    $sql = "SELECT user.username as u, order_init.order_init_id as id, order_detail.name as menu_name, order_detail.unit as unit, order_detail.price as price
                    FROM user
                    INNER JOIN order_init ON order_init.user_id = user.user_id
                    INNER JOIN order_detail ON order_init.order_init_id = order_detail.order_init_id WHERE order_init.order_init_id = '$id'";
                    $res = $conn -> query($sql);

                    echo '
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                    <div class="card" style="width: 100%; ">
                        <div class="card-header" style="background-color: rgb(11, 6, 70);">
                            <h6 class="card-text" style="color: #fff;">โต้ะที่ 7 คุณ กัณติกรณ์</h6>
                        </div>
                        <div class="card-body" style="background-color: rgb(186, 223, 255);">' ;
                            while($row = $res -> fetch_assoc()) {
                                echo '<li style="color:rgb(8, 1, 72);">'.$row['menu_name'].' จำนวน '.$row['unit'].'</li>';
                                $total += $row['unit'] * $row['price'];
                            }
                           echo '<hr>
                            <h6 class="card-text"  style="color:rgb(8, 1, 72);">ราคารวม: '.$total.' บาท</h6>
                            <form action="ManageRestaurant.php" method="post">
                                <button class="btn btn-primary" type="submit" name="recive-order-'.$rows['order_init_id'].'">รับรายการอาหาร</button>
                                <button class="btn btn-success" type="submit" name="complete-'.$rows['order_init_id'].'">ออร์เดอร์เสร็จสิ้น</button>
                            </form>
                        </div>
                    </div>
                </div>
                    ';
                    if(isset($_POST['recive-order-'.$rows['order_init_id'].''])) {
                        $id_menu = $rows['order_init_id'];
                        $sqli = "UPDATE `order_init` SET `status`='รับรายการอาหาร' WHERE `order_init_id`='$id_menu'";
                        $conn -> query($sqli);
                        echo "<meta http-equiv='refresh' content='0'>";
                    }

                    if(isset($_POST['complete-'.$rows['order_init_id'].''])) {
                        $id_menu = $rows['order_init_id'];
                        $sqli = "UPDATE `order_init` SET `status`='complete' WHERE `order_init_id`='$id_menu'";
                        $conn -> query($sqli);
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
            }
            ?>

        </div>
    </div>




    


  
</body>
</html>