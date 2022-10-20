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
</head>
<body>
<!--onsubmit(return false) 能让 form 标签点击后停留原来的页面-->
<form method="post" action="saveadd.php" onsubmit="return checkinput(this)">
<table border="1" width="300" align="center">
    <caption align="top" style="font-size: 25px">PHP成绩查询系统</caption>
    <tr>
        <td><label for="name">姓名：
        <td><input type="text" name="name"></label></td></td>
    </tr>
    <tr>
        <td><label for="age">年龄：</td>
        <td><input type="text" name="age"></label></td>
    </tr>
    <tr>
        <td><label for="result">成绩：</label></td>
        <td><input type="text" name="result"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" name="button1" value="提交">提交</button>
            <button type="reset" name="button2" value="重置">重置</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>