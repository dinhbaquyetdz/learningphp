<?php 
include "connect.php" ;
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
            <h2 class="text-center">Đăng ký</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giới tính</label>
                <input type="text" name="gender" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày sinh</label>
                <input type="date" name="dateofbirth" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Đăng ký</button>
            <br>
            <?php 
                if(isset($_POST['register'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $gender = $_POST['gender'];
                    $dateOfBirth = $_POST['dateofbirth'];
                    $data = "SELECT * FROM user WHERE email like '$email'";
                    $check = mysqli_query($con, $data);
                    if(mysqli_num_rows($check) == 0){
                        $mh = md5($pass);
                        $sql = "INSERT INTO `user`(`name`, `email`, `pass`, `gender`,`dateOfBirth`) VALUES ('$name','$email','$mh','$gender','$dateOfBirth')";
                        if($con->query($sql) === true){
                            // echo "<p style='color: blue;'>Đắng ký thành công!<p>";
                            header("location: login.php");
                        }else{
                            
                        }
                    }else{
                        echo "<p style='color: red;'>Tài khoản đã tồn tại!<p>";
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