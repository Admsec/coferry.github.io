<?php
    /**
     * @var $conn from conn.php
     * */
    include "conn.php";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $result = $_POST['result'];
    $sql = mysqli_query($conn,"INSERT INTO websql(name,age,result) values('$name','$age','$result')");
    if (mysqli_errno($conn))
    {
        echo "请求失败，原因：" . mysqli_error($conn);
        return;
    }
    echo "<script>alert('添加成功');history.back()</script>";
    updateId($conn);
?>

