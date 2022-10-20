<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP成绩查询系统</title>
    <script>
        function checkinput(form)
        {
            if (!form.name.value)
            {
                alert("请输入姓名");
                // from.form内的元素.select() 的作用是将鼠标的指针点击一下输入框
                form.name.select();
                return(false);
            }
            if (!form.age.value)
            {
                alert("请输入年龄");
                form.name.select();
                return(false);
            }
            if (!form.mark.value)
            {
                alert("请输入年龄");
                form.mark.select();
                return(false);
            }
            return(true);
        }
    </script>
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
<form method="post" action="saveupdate.php" onsubmit="return checkinput(this)">
    <table border="1" width="300" align="center">
        <caption align="top" style="font-size: 25px">PHP成绩查询系统</caption>
        <tr>
            <td><label for="name">姓名：
            <td><input type="text" name="name" value="<?php echo $info['name']; ?>"></label></td></td>
        </tr>
        <tr>
            <td><label for="age">年龄：</td>
            <td><input type="text" name="age" value="<?php echo $info['age']; ?>"></label></td>
        </tr>
        <tr>
            <td><label for="mark">成绩：</label></td>
            <td><input type="text" name="result" value="<?php echo $info['result']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="button1" value="更新">更新</button>
                <button type="reset" name="button2" value="重置">重置</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>