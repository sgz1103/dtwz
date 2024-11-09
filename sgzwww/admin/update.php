<?php include('../environ.php'); ?>

<!DOCTYPE html>
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
                <h3>修改</h3>
            </div>
            <hr />
            <?php
            $id = $_GET['id'];
            $type = $_GET['type'];
            $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];

                $sql = 'update message set title=?,content=? where id=?';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $title);
                $stmt->bindValue(2, $content);
                $stmt->bindValue(3, $id);
                $stmt->execute();
                header('location:list.php?type=' . $type);
            }
            else{
                $sql='select * from message where id=?';
                $stmt=$pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                $result=$stmt->fetch();
            }   
            ?>
        </div>
        <div class="row">
            <div class="col">
                <form class="row g-3" method="post" action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">标题</label>
                        <input value='<?php echo $result['title'] ?>' type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="请在此处写标题">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">内容</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $result['content'] ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">提交</button>
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