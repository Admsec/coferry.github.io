<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP成绩查询系统</title>
    <?php
    /**
     * @var $conn from conn.php
     * */
    require_once "conn.php";
    $id = $_GET['id'];
    $sql = mysqli_query($conn,"select * from websql where id = '" . $id . "'" );
    $info = mysqli_fetch_array($sql);
    ?>
</head>
<body>
<!--onsubmit(return false) 能让 form 标签点击后停留原来的页面-->
<form method="post" action="savedel.php">
    <table border="1" width="300" align="center">
        <caption align="top" style="font-size: 25px">PHP成绩查询系统</caption>
        <tr>
            <td>序号</td>
            <td>姓名</td>
            <td>年龄</td>
            <td>成绩</td>
            <td></td>
        </tr>
        <tr>
        <td><?php echo $info['id'];?></td>
        <input type="hidden" name="id" id="ID" value="<?php echo $info['id'];?>">
<!--        <input type="hidden" name="" id="ID" value="--><?php //echo $info['id']; ?><!--">-->
        <td><?php echo  $info['name'];?></td>
        <td><?php echo $info['age'];?></td>
        <td><?php echo $info['result'];?></td>
        <td><button name="button" value="删除">删除</button></td>
        </tr>
    </table>
</form>
</body>
</html>