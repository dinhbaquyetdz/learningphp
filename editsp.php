<?php 
include 'connect.php';
session_start();
if(!isset($_SESSION["email"])){
    header("location: login.php");
}
if(!isset($_GET['id'])){
    header('location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = '$id'";
$query = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit_Products</title>
</head>
<body>
  <h2 class="text-center">Edit_Products</h2>
<?php 
while($row = mysqli_fetch_array($query)){
?>
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
    <input type="text" name="tensp" class="form-control" value="<?php echo $row['tensp'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Số lượng: </label>
    <input type="number" name="soluong" class="form-control" value="<?php echo $row['soluong'] ?>" id="exampleInputPassword1" min="1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mô tả: </label>
    <input type="text" name="mota" class="form-control" value="<?php echo $row['mota'] ?>" id="exampleInputPassword1" min="1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Giá: </label>
    <input type="number" name="gia" class="form-control" value="<?php echo $row['gia'] ?>" id="exampleInputPassword1" min="1" required>
  </div>
  
  <button type="submit" class="btn btn-primary" name="update">Cập nhật</button>
</form>
<?php 
}

if(isset($_POST['update'])){
    $tensp = $_POST['tensp'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    
    $edit = "UPDATE product SET tensp = '$tensp', soluong = '$soluong', gia = '$gia', mota = '$mota' WHERE id = '$id'";
    $update = mysqli_query($con,$edit);
    if($update){
        header('location: index.php');
    }else{
        echo "Cập nhật thất bại!";
    }
}
?>
</body>
</html>