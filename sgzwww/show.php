<?php
    include('environ.php');

    $id = $_GET['id'];
    $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
    $sql = "select * from message where id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $result = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $msg['title'] ?> - <?php echo $site_name ?></title>
    <meta name="Keywords" content="<?php echo $site_keywords ?>" />
    <meta name="Description" content="<?php echo $site_Description ?>" />
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
        .card {
            width: 98%;
            height: 400px;
        }
        .page-item {
            text-align: center;
            font-size: 25px;
        }
        a {
            text-decoration: none; // 取消下划线
            color: black; // 设置字颜色
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body" width="95%" height="600">
                        <h2 class="text-center"><?php echo $result["title"] ?></h2>
                        <div class="text-center">发布时间：<?php echo $result["create_time"] ?></div>
                        <div><?php echo $result["content"] ?></div>
                    </div>
                    <div class="page-item">
                        <?php
                        echo '<a style="bottom: 0; width: 100%;" href="javascript:history.back()">返回</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>