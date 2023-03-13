<?php
include "../system/api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะออร์เดอร์</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand mt-3" href="#" style="color:rgb(15, 10, 60); font-weight: bolder;">Status Order</a>

          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navindex">
                <a class="btn btn-primary" type="button" href="purchasefood.php">click</a>
            </button>

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary mt-3" type="button" href="purchasefood.php">กลับไปหน้าสั่งซื้ออาหาร</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">สถานะออร์เดอร์ของคุณลูกค้า</h5>
                </div>
            </div>
        </div>
    </div>


    
    <div class="container-fluid mt-3">
        <div class="row">
            <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `order_init` WHERE `user_id`='$id' AND `status`='รับรายการอาหาร'";
            $total = 0;
            if($result = $conn -> query($sql)) {
                while($rows = $result -> fetch_assoc()) {
                    $ids = $rows['order_init_id'];
                    $sql = "SELECT user.username as u, order_init.order_init_id as id, order_detail.name as menu_name, order_detail.unit as unit, order_detail.price as price, order_detail.tables_id as tables_id
                    FROM user
                    INNER JOIN order_init ON order_init.user_id = user.user_id
                    INNER JOIN order_detail ON order_init.order_init_id = order_detail.order_init_id WHERE order_init.order_init_id = '$ids' AND order_init.status = 'รับรายการอาหาร'";
                    $res = $conn -> query($sql);

                    $sql3 = "SELECT user.username as u, order_init.order_init_id as id, order_detail.name as menu_name, order_detail.unit as unit, order_detail.price as price, order_detail.tables_id as tables_id
                    FROM user
                    INNER JOIN order_init ON order_init.user_id = user.user_id
                    INNER JOIN order_detail ON order_init.order_init_id = order_detail.order_init_id WHERE order_init.order_init_id = '$ids' AND order_init.status = 'รับรายการอาหาร'";
                    $res2 = $conn -> query($sql);
                    $row3 = $res2 -> fetch_assoc();
                    
                    echo '
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                    <div class="card" style="width: 100%; ">
                        <div class="card-header" style="background-color: rgb(255, 153, 0);">
                            <h6 class="card-text" style="color: #fff;">โต้ะที่ '.$row3['tables_id'].' คุณ '.$row3['u'].'</h6>
                            <h6 class="card-text" style="color: #fff;">ร้านกำลังทำอาหาร</h6>
                        </div>
                        <div class="card-body" style="background-color: rgb(255, 238, 208);">';
                        while($row = $res -> fetch_assoc()) {
                            echo '<li style="color:rgb(8, 1, 72);">'.$row['menu_name'].' จำนวน '.$row['unit'].'</li>';
                            $total += $row['price'] * $row['unit'];
                        }
                            echo '<hr>
                            <h6 class="card-text"  style="color:rgb(8, 1, 72);">ราคารวม: '.$total.' บาท</h6>
                            <form action="statusorder.php" method="post">
                                <button class="btn btn-primary" type="submit" name="checkbill-'.$rows['order_init_id'].'">เรียกพนักงานเก็บเงิน</button>
                            </form>
                        </div>
                    </div>
                </div>
                    ';
                    if(isset($_POST['checkbill-'.$rows['order_init_id'].''])) {
                        $id_menu = $rows['order_init_id'];
                        $sqli = "UPDATE `order_init` SET `status`='ลูกค้ารับประทาน' WHERE `order_init_id`='$id_menu'";
                        $conn -> query($sqli);
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
            }
            ?>
</body>
</html>