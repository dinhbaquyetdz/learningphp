<?php 
include "connect.php" ;
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sign-up</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-lg-4 col-sm-4 col-1"></div>
        <div class="col-lg-4 col-sm-4 col-10">
        <form class="shadow p-3 mb-5 bg-body-tertiary rounded" method="post" action="">
            <h2 class="text-center">Đăng Nhập</h2>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary" name="login">Đăng Nhập</button>
            </div>
            
            <h5 class="text-center">Bạn chưa có tài khoản?</h5><h6  class="text-center"><a href="register.php">Đăng ký ngay</a></h6>
            <br>
            <?php 
              if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $checkdata = mysqli_query($con,"SELECT * FROM user WHERE email like '$email'");
                if(mysqli_num_rows($checkdata) == 0){
                    echo "<p style='color: red'>Tài khoản không tồn tại!</p>";
                }else{
                    $row = mysqli_fetch_array($checkdata);
                    $pass = md5($password);
                    if($pass === $row['pass']){
                        $_SESSION['email'] = $email;
                        header("location: index.php");
                    }else{
                        echo "<p style='color: red'>Mật khẩu không đúng!</p>";
                    }
                }
              }
            ?>
            </form>
        </div>
        <div class="col-lg-4 col-sm-4 col-1"></div>
    
        </div>
        
    </div>
</body>
</html>