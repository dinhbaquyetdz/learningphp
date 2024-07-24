<?php 
include 'connect.php';
if(!isset($_GET['id'])){
    header('location: index.php');
}
$id = $_GET['id'];
$delete = "DELETE FROM product WHERE id = '$id'";
if($con->query($delete) === true){
    header('location: index.php');
}else{
    echo "Xóa sản phẩm thất bại!";
}
?>