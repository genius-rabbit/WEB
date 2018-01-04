<?php
/**
 * Created by PhpStorm.
 * User: geniusrabbit
 * Date: 18-1-3
 * Time: 下午9:15
 */


$servername = "localhost";
$username = "root";
$password = "5258wawj";

$conn = new mysqli($servername,$username,$password);

if($conn->connect_error){
    die("连接失败：".$conn->connect_error);
}
else{
    echo "\n";
}

$sql = "CREATE DATABASE IF NOT EXISTS AccountDB";

if ($conn->query($sql) === TRUE) {
    echo "\n";
}else{
    echo "创建数据库失败: " . $conn->error."\n";
}

$sql = "USE AccountDB;";

if ($conn->query($sql) === TRUE) {
    echo "\n";
}else{
    echo "数据库使用失败: " . $conn->error."\n";
}

$acc = $_POST["account"];
$pas = $_POST["password"];
$pas = md5($pas);

$result=mysqli_query($conn,"SELECT * FROM ACC_Password WHERE account='$acc'");
$row=mysqli_fetch_array($result);

if($row['password']!=$pas){
    echo "密码错误";
}
else{
    echo "登录成功";
}

$conn->close();
