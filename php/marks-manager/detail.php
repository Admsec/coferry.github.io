<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP成绩查询系统</title>
</head>
<body>
<?php
    require_once("conn.php");
?>
<table border="1" width="500" align="center">
    <caption align="top" style="font-size: 25px">PHP成绩查询系统</caption>
    <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>总分</th>
        <th>编辑</th>
    </tr>
    <?php
    /**
    * @var $conn from conn.php
     */
        $id = $_GET['id'];
        $sql = mysqli_query($conn,"select * from websql where id = " . $id);
        $info = @mysqli_fetch_array($sql);
        echo "<tr>";
        echo "<td>" . $info['id'] . "</td>" .
            "<td>" . $info['name'] . "</td>" .
            "<td>" . $info['age'] . "</td>" .
            "<td>" . $info['result'] . "</td>" .
            "<td>" . "<a href='update.php?id=" . $info['id'] . "'>更新</a>" . '/' .
                     "<a href='del.php?id=" . $info['id'] . "'>删除</a>".
            "</td>";
        echo "</tr>";
    ?>

</table>
<hr>
</body>
</html>