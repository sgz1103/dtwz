<?php
include('huihua.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="../js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
        .container {
            margin: 0 auto;  /* 居中 */
        }
        .col1 {
            width: 20%;
            height: 200px;
        }
        .list-group {
            text-align: center;
            font-size: 24px;
        }
        .col2 {
            width: 80%;
        }
        a {
            height: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center"> <!-- text-center文字居中 -->
                
                <h1>这是管理后台</h1>
            </div>
        </div>
        <div class="row">
            <div class="col1">
                <div class="list-group">
                    <a href="\index.php" class="list-group-item list-group-item-action list-group-item-dark">查看首页效果</a>
                    <a href="news_add.php" target="main" class="list-group-item list-group-item-action list-group-item-primary">新闻快讯添加</a>
                    <a href="list.php?type=1" target="main" class="list-group-item list-group-item-action list-group-item-secondary">新闻快讯管理</a>
                    <a href="music_add.php" target="main" class="list-group-item list-group-item-action list-group-item-success">音乐之声添加</a>
                    <a href="list.php?type=2" target="main" class="list-group-item list-group-item-action list-group-item-danger">音乐之声管理</a>
                    <a href="changepassword.php" target="main" class="list-group-item list-group-item-action list-group-item-warning">密码修改</a>
                    <a href="logout.php" class="list-group-item list-group-item-action list-group-item-info">退出登录</a>
                </div>
            </div>
            <div class="col2">
                <iframe name="main" src="welcome.php" width="95%" height="500"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>版权所有：我心飞扬   技术支持：“动态网站设计”课程团队</p>
                <p>联系地址：沈阳市沈北新区沈北路88号</p>
                <p>ICP备案号：辽ICP备10017699号-5</p>
            </div>
        </div>
    </div>
</body>

</html>