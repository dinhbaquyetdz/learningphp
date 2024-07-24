<?php 
// include và require dùng để chèn 1 file php vào 1 file php khác.
// include lỗi sẽ đưa ra dòng cảnh báo, chương trình vẫn có thể chạy bình thường
// require lỗi sẽ đưa ra err, chương trình sẽ lập tức dùng hoạt động.
require "connect.php";

session_start();
if(!isset($_SESSION["email"])){
    header("location: login.php");
}
$sql = "";
if(isset($_GET['search'])){
    $search = $_GET['data'];
    $sql = "SELECT * FROM product WHERE tensp like '%$search%'";
}else{
    $sql = "SELECT * FROM product";
}
$query = mysqli_query($con,$sql);
$mail = $_SESSION['email'];
$userdata = mysqli_query($con,"SELECT * FROM user WHERE email like '$mail'");
$user = mysqli_fetch_array($userdata);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Learning Php</title>
</head>
<style>
a{
    text-decoration: none;
}
.dropdown {
  position: relative;
  display: inline-block;
  /* float: right; */
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<body>
    <h2 class="text-center">Product_Manage</h2>
    <div class="user dropdown">
        <span><?php echo $user['name']?></span>
        <div class="dropdown-content">
        <a href="logout.php">Đăng xuất</a>        
        </div>
    </div>
    <!-- <div class="nav"> -->
    <a href="addsp.php"><button class="btn btn-primary">AddSP</button></a>
    <form class="d-flex" style="width: 400px;float: right;" role="search" method="GET">
        <input class="form-control me-2" type="search" name="data" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
      </form>
    <!-- </div> -->
    
    <table class="table table-border">
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th colspan="2">Thao tác</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($query)){
            echo "
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['tensp']."</td>
            <td><img width='50px' src='".$row['image']."'/></td>
            <td>".$row['soluong']."</td>
            <td>".$row['gia']."</td>
            <td>".$row['mota']."</td>
            <td><a href='editsp.php?id=".$row['id']."'><button class='btn btn-success'>Sửa</button></a></td>
            <td><a href='deletesp.php?id=".$row['id']."'><button class='btn btn-danger'>Xóa</button></a></td>
        </tr>
            
            ";
        }
        ?>
    </table>
</body>
</html>