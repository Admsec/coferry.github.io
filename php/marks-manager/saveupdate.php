<?php
    /**
    * @var $conn
     */
    include "conn.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $result = $_POST['result'];
    mysqli_query($conn,"UPDATE websql set name = '$name',age = '$age',result = '$result' where id = '$id'");
    if (mysqli_errno($conn))
    {
        echo mysqli_error($conn);
        return;
    };
    echo "<script>alert('修改成功！');history.back()</script>";

?>