<?php
/**
 * @var $conn from conn.php
 */
   include "conn.php";
   $id = $_POST['id'];
   mysqli_query($conn,"DELETE FROM websql where id = '$id'");
    if (mysqli_errno($conn))
        {
        echo "请求失败，原因：" . mysqli_error($conn);
        return;
         }
    updateId($conn);
    echo "<script>alert('删除成功');</script>";
    header("location:index.php");
?>