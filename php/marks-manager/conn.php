<?php
    // 建立数据库连接
    $conn = mysqli_connect("localhost","root","root","phpweb");
    // 不显示更换字符集时的警告
    @mysqli_set_charset($conn,"utf-8");
    // 如果连接错误显示错误原因
    if (mysqli_connect_errno())
    {
        echo mysqli_connect_error();
    }

    // 主键重新排序
    function updateId($conn)
    {
        mysqli_query($conn,"ALTER TABLE `websql` DROP `id`;");
        mysqli_query($conn,"ALTER TABLE `websql` ADD `id` INT NOT NULL FIRST;");
        mysqli_query($conn,"ALTER TABLE `websql` MODIFY COLUMN `id` INT NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(id);");
    }

?>