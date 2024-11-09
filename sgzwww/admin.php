<?php
ob_start(); // 强制启动缓存
include('environ.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>后台管理</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="js/popper.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  <style>
    .card {
      margin: 0 auto;
      /* 居中 */
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include('header.php'); ?>
    <div class="row">
      <div class="col">
        <div class="card" style="width: 480px;">
          <div class="card-body">
            <h4>后台管理登录</h4>
            <form method="post" action="">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">用户名</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">密码</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
              </div>
              <?php
              if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $pass = md5($_POST['password']);
                $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
                $sql = "select count(*) from admin where name=? and password=?";
                $stmp = $pdo->prepare($sql);
                $stmp->bindValue(1, $name);
                $stmp->bindValue(2, $pass);
                $stmp->execute();
                $result = $stmp->fetch();
                if ($result[0] > 0) {  // 登录成功
                  session_start();
                  $_SESSION['adminname'] = $name;
                  header("location:/admin/index.php");
                } else {
              ?>
                  <div class="alert alert-danger" role="alert">
                    用户名或密码错误！
                  </div>
              <?php
                }
              }
              ?>
              <button type="submit" class="btn btn-primary">登录</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>