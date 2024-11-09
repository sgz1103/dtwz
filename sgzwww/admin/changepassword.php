<?php
include('../environ.php');
include('huihua.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="../js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3>密码修改</h3>
            </div>
            <hr />
            <div style="text-align: center;">
            <?php
                if (isset($_POST['oldpassword'])){
                    $username='admin';
                    $oldpassword = $_POST['oldpassword'];
                    $newpassword = $_POST['newpassword'];
                    $newpassword2 = $_POST['newpassword2'];
                    if($newpassword==$newpassword2) {
                        // 检测原始密码是否正确
                        $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
                        $sql = "select count(*) from admin where name=? and password=?";
                        $stmp = $pdo->prepare($sql);
                        $stmp->bindValue(1, $username);
                        $stmp->bindValue(2, md5($oldpassword));
                        $stmp->execute();
                        $result = $stmp->fetch();
                        if ($result[0] > 0) {
                            if ($oldpassword==$newpassword) {
                                echo '新密码不能与原密码相同！';
                            } else {
                                $sql = 'update admin set password=? where name=?';
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(1, md5($newpassword));
                                $stmt->bindValue(2, $username);
                                $stmt->execute();
                                echo '密码修改成功！';
                            }
                        } else {
                            echo '密码错误！';
                        }
                    } else {
                        echo '密码不一致！';
                    }
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="row g-3" method="post" action="">
                    <div class="mb-3">
                        <label for="oldpassword" class="form-label">原始密码</label>
                        <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="请在此处写原始密码">
                    </div>
                    <div class="mb-3">
                        <label for="newpassword" class="form-label">新密码</label>
                        <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="请在此处写新密码">
                    </div>
                    <div class="mb-3">
                        <label for="newpassword2" class="form-label">新密码确认</label>
                        <input type="password" name="newpassword2" class="form-control" id="newpassword2" placeholder="请在此处再次写新密码">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">修改</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
        </div>
    </div>
</body>

</html>