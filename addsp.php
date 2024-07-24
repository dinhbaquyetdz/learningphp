<?php 
include "connect.php";
session_start();
if(!isset($_SESSION["email"])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Leaning Php</title>
</head>
<body>
    <h2 class="text-center">ADD_PRODUCT</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="">Tên sản phẩm: </label>
            <input type="text" name="tensp" class="form-control" required>
        </div>
        <div class="form-control">
            <label for="">Số lượng sản phẩm: </label>
            <input type="number" name="soluong" class="form-control" required>
        </div>
        <div class="form-control">
            <label for="">Giá sản phẩm: </label>
            <input type="number" name="gia" class="form-control" required>
        </div>
        <div class="form-control">
            <label for="">Mô tả sản phẩm: </label>
            <input type="text" name="mota" class="form-control" required>
        </div>
        <div class="form-control">
            <input type="file" name="img" class="form-control"  required>
        </div>
        <button type="submit" name="addsp" class="btn btn-primary">ADD</button>
        
    </form>
</body>
</html>
<?php
    if(isset($_POST['addsp'])){
        $name = $_POST['tensp'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $imgname = basename($_FILES["img"]["name"]);
        $target_dir = "image/";
        $target_file = $target_dir . $imgname;
        // var_dump($target_file);die();
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        $sql = "INSERT INTO `product`(`tensp`, `soluong`, `gia`, `mota`,`image`) VALUES ('$name','$soluong','$gia','$mota','$target_file')";
        if($con->query($sql)===true){
            header('location: index.php');
        }else{
            echo "Thêm sản phẩm thất bại!";
        }
    }
?>