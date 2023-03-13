<?php
include "../system/api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ซื้ออาหาร</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(177, 232, 255);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:rgb(9, 16, 68); font-weight: bolder;">Purchase Food</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navindex">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <button class="btn btn-primary position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#purchase">
                            ตระกร้า
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="background-color: antiquewhite;">
                    <h5 class="mb-2 mt-2" style="color:rgb(15, 10, 60);; font-size: 20px;  font-weight: bolder; margin-left: 10px;">รายการอาหารเเนะนำ</h5>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-3">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `menu` WHERE 1";
            if($result = $conn -> query($sql)) {
                while($row = $result -> fetch_assoc()) {
                    echo '
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-3">
                    <div class="card" style="width: 100%;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 mb-3 mt-3">
                                    <img src="'.$row['image'].'" style="width: 100%; height: 120px; border-radius: 10px;">
                                </div>
                                <div class="col-sm-6 mb-3 mt-3">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <hr>
                                    <p class="card-text">ราคา: '.$row['price'].' บาท</p>
                                    <form action="purchasefood.php" method="post">
                                    <button class="btn btn-outline-primary" type="submit" name="add-cart-'.$row['menu_id'].'">เพิ่มเมนูใส่ตระกร้า +</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                    if(isset($_POST['add-cart-'.$row['menu_id'].''])) {
                        $user_id = $_SESSION['user_id'];
                        $id = $row['menu_id'];
                        if(isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            $arr = array_column($_SESSION['cart'], 'menu_id');
                            if(in_array($row['menu_id'], $arr)) {
                                foreach($_SESSION['cart'] as $key => $value) {
                                    if($value['menu_id'] == $row['menu_id']) {
                                        $_SESSION['cart'][$key] = Array("menu_id"=>$row['menu_id'], "name"=>$row['name'], "price"=>$row['price'], "user_id"=>$row['user_id'], "image"=>$row['image'], "unit"=>$value['unit'] + 1);
                                    }
                                }
                            } else {
                                $_SESSION['cart'][$count] = Array("menu_id"=>$row['menu_id'], "name"=>$row['name'], "price"=>$row['price'], "user_id"=>$row['user_id'], "image"=>$row['image'], "unit"=>1);
                            }
                            if($count == 0) {
                                $_SESSION['cart'][0] = Array("menu_id"=>$row['menu_id'], "name"=>$row['name'], "price"=>$row['price'], "user_id"=>$row['user_id'], "image"=>$row['image'], "unit"=>1);
                                $date = DATE("Y-m-d");
                                $sql = "INSERT INTO `order_init`(`order_init_id`, `user_id`, `date`, `status`) VALUES (NULL,'$user_id','$date','wait')";
                                $conn -> query($sql);
                            }
                        } else {
                            $_SESSION['cart'][0] = Array("menu_id"=>$row['menu_id'], "name"=>$row['name'], "price"=>$row['price'], "user_id"=>$row['user_id'], "image"=>$row['image'], "unit"=>1);
                            $date = DATE("Y-m-d");
                            $sql = "INSERT INTO `order_init`(`order_init_id`, `user_id`, `date`, `status`) VALUES (NULL,'$user_id','$date','wait')";
                            $conn -> query($sql);
                        }
                    }
                }
            }
            
            ?>
        </div>
    </div>


   


    




    <div class="offcanvas offcanvas-start" id="purchase">
        <div class="offcanvas-header" style="background-color: rgb(205, 224, 255);">
            <h5 class="offcanvas-title">รายการอาหารทั้งหมด</h5>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body" style="background-color: rgb(205, 224, 255);">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $total = 0;
                    if(isset($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $key => $value) {
                            $total += $value['price'] * $value['unit'];
                            echo '
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card" style="width: 100%;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 mt-3">
                                            <img src="'.$value['image'].'" style="width: 100%; height: 100%; border-radius: 10px;">
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-3">
                                            <h5 class="card-title">'.$value['name'].'</h5>
                                            <input type="number" id="Unit" name="Unit" class="form-control" placeholder="จำนวน..." value="'.$value['unit'].'">
                                            <p class="card-text mt-2 mb-2">ราคารวม: '.$value['price'] * $value['unit'].'฿</p>
                                            <form action="purchasefood.php" method="post">
                                                <button class="btn btn-outline-danger" type="submit" name="can-order-'.$value['menu_id'].'" style="width: 100%; margin-top: 5px;">ยกเลิกรายการนี้</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                            if(isset($_POST['can-order-'.$value['menu_id'].''])) {
                                $id = $value['menu_id'];
                                foreach($_SESSION['cart'] as $key => $value) {
                                    if($value['menu_id'] == $id) {
                                        unset($_SESSION['cart'][$key]);
                                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                }
                            }

                            if(isset($_POST['purchase'])) {
                                $user_id = $_SESSION['user_id'];
                                $date = DATE("Y-m-d");
                                $sql = "SELECT max(order_init_id) as max, `user_id`, `date` FROM `order_init` WHERE `user_id`='$user_id'";
                                $row = $conn -> query($sql);
                                if($result = $row -> fetch_assoc()) {
                                    $max = $result['max'];
                                    foreach($_SESSION['cart'] as $key => $value) {
                                        $id_tables = $_POST['id_tables'];
                                        $price = $value['price'];
                                        $unit = $value['unit'];
                                        $name = $value['name'];
                                        $sql = "INSERT INTO `order_detail`(`order_id`, `user_id`, `order_init_id`, `date`, `price`, `unit`, `name`, `status`, `tables_id`) VALUES (NULL,'$user_id','$max','$date','$price','$unit','$name','wait_confirm','$id_tables')";
                                        $conn -> query($sql);
                                    }
                                }
                                unset($_SESSION['cart']);
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                        }
                    }
                    ?>
                    <form action="purchasefood.php" method="post">
                    <div class="col-sm-12 mb-3 mt-3">
                        
                              <input class="form-control mt-3" name="id_tables" placeholder="กรอกโต๊ะที่นั่งลูกค้า.....">
                   
                      </div>


                    <div class="col-sm-6 mb-3 mt-3">
                        <h5 class="card-title">ราคารวม: <?php echo $total ?> บาท</h5>
                    </div>

                    <div class="col-sm-6 mb-3 mt-3">
                        
                            <button class="btn btn-outline-success" type="submit" name="purchase" style="width: 100%;">สั้งซื้ออาหาร</button>
                       
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>