    <!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP成绩查询系统</title>
    <style>

    </style>
</head>
<body>
<?php
    /**
    * @var  $conn
    * @var  $conn.php
    */
    require_once("./conn.php");
    $sql = "select * from websql";
    $result = mysqli_query($conn,$sql);
    $num = 0;
    ?>
    <table border="1" width="500" align="center">
        <caption align="top" style="font-size: 25px">PHP成绩查询系统</caption>
        <tr>
            <th>序号</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>总分</th>
            <th>详情</th>
        </tr>
        <?php
        /**
         * 设置分页
         */
        $sql = mysqli_query($conn,"select count(*) as total from websql");
        $result = mysqli_fetch_array($sql);
        if (!$result['total'])
        {
            echo '本系统暂无任何查询数据';
            return;
        }

        $pagesize = 5;
        if ($result['total'] < 5){
            $pagecount = 1;
        }
        if (($result['total'] % $pagesize) != 0){
            $pagecount = intval($result['total'] / $pagesize) + 1;
        }else{
            $pagecount = $result['total'] / $pagesize;
        }
        if (!$_GET['page'])
        {
            $page = 1;
        }else{
            $page = intval($_GET['page']);
        }
        // 按升序分页查询数据，每一页 5 行数据
        $sql = mysqli_query($conn,"select * from websql order by id asc limit " . ($page - 1) * $pagesize . "," .$pagesize);
        // mysqli_fetch_array 查询所以记录集，并定义为$info
        while ($info = mysqli_fetch_array($sql))
        {
            echo "<tr>";
            echo "<td>" . $info['id'] . "</td>" .
                "<td>" . $info['name'] . "</td>" .
                "<td>" . $info['age'] . "</td>" .
                "<td>" . $info['result'] . "</td>" .
                "<td>" . "<a href='detail.php?id=" . $info['id'] . "'>操作</a>" ."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <table border="1" width="500" align="center">
        <tr>
            <td>共有数据<?php echo $result['total']?>条，每页显示 <?php echo $pagesize?> 条,第<?php echo $page?>页 / 共<?php echo $pagecount;?>页:
                <?php
                if ($page == 1)
                {
                ?>
                    <a href="index.php?page=<?php echo $page + 1;?>">后一页</a> /
                    <a href="index.php?page=<?php echo $pagecount; ?>">尾页</a>
                <?php } elseif ( $page != 1 && $page < $pagecount)
                {
                ?>
                <a href="index.php?page=1">首页</a> /
                <a href="index.php?page=<?php echo $page - 1;?>">前一页</a> /
                <a href="index.php?page=<?php echo $page + 1;?>">后一页</a>
                <?php }
                else {
                ?>
                <a href="index.php?page=1">首页</a> /
                <a href="index.php?page=<?php echo $page - 1?>">前一页</a>
                <?php }?>
            </td>
        </tr>
    </table>
</body>
</html>