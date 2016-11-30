<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/manage/assets/plugin/fontawesome/css/font-awesome.min.css">
    <style>
        body{
            background: #F2F2F2;
            text-align: center;
            color: #b2b2b2;
        }
        .fa{
            width: 240px;
            height: 240px;
            font-size: 15em;
            margin: 5% auto 2% auto;
        }
        p{
            font-size: 40px;
        }
    </style>
    <script src="assets/plugin/layui/lay/lib/jquery.js"></script>
    <script src="assets/plugin/layui/lay/modules/layer.js"></script>
    <script>
        parent.layer.closeAll();
    </script>
</head>
<body>
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<p>
    <?php echo(strip_tags($msg));?>
</p>
<div>
    <a href="javascript:history.go(-1)">返回上一步</a>
</div>
</body>
</html>