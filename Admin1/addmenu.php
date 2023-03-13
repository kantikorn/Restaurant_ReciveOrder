<?php
include "../system/api.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเมนูอาหาร</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-sm" style="background-color: antiquewhite;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:rgb(9, 16, 68); font-weight: bolder;">เพิ่มรายการอาหาร</a>
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



   <div class="container-fluid mt-5">
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
            <div class="card" style="width: 100%; background-color: antiquewhite;">
                <form action="addmenu.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="imgfood" class="form-label">Image food</label>
                        <input type="file" class="form-control" id="imgfood" name="imgfood" >
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="foodname" class="form-label">foodname</label>
                        <input class="form-control" id="foodname" name="foodname" placeholder="กรอกชื่ออาหาร....">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="Unitprice" class="form-label">Price</label>
                        <input class="form-control" id="Unitprice" name="Unitprice" placeholder="กรอกราคาอาหาร....">
                    </div>
                    <button class="btn btn-outline-success" type="submit" name="add-food">Confirm</button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                </form>
                <?php
                    if(isset($_POST['add-food'])) {
                        $id = $_SESSION['user_id'];
                        $img = $_FILES['imgfood']['name'];
                        $content = file_get_contents($_FILES['imgfood']['tmp_name']);
                        $name = $_POST['foodname'];
                        $price = $_POST['Unitprice'];
                        $base64 = 'data:image/png;base64,' . base64_encode($content);
                        $sql = "INSERT INTO `menu`(`menu_id`, `name`, `price`, `user_id`, `image`) VALUES (NULL,'$name','$price','$id','$base64')";
                        $conn -> query($sql);
                    }
                    ?>
            </div>
        </div>
        <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `menu` WHERE `user_id`='$id'";
            if ($result = $conn -> query($sql)) {
                while($row = $result -> fetch_assoc()) {
                    echo '
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <img src="'.$row['image'].'" style="width: 100%; height: 230px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$row['name'].'</h5>
                            <hr>
                            <p class="card-text">ราคา: '.$row['price'].' บาท</p>
                            <form action="addmenu.php" method="post">
                                <button class="btn btn-primary" type="submit" name="editfood">เเก้ไขรายการอาหาร</button>
                                <button class="btn btn-danger" type="submit" name="deletefood">ลบรายการอาหาร</button>
                            </form>
                        </div>
                    </div>
                </div>
                    ';
                }
            }
            
            ?>
    </div>
</div>
   
      
</body>
</html>