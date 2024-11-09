<?php include('environ.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页 - <?php echo $site_name ?></title>
    <meta name="Keywords" content="<?php echo $site_keywords ?>" />
    <meta name="Description" content="<?php echo $site_Description ?>" />
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
      .container {
            margin: 0 auto;  /* 居中 */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include('header.php'); ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>新闻快讯</h5>
                        <?php
                            $pdo=new PDO($mysql_dsn,$mysql_dbname,$mysql_dbpassword);
                            $sql='select * from message where type=1 order by id desc limit 10';
                            $stmt=$pdo->prepare($sql);
                            $stmt->execute();
                            $all_news=$stmt->fetchAll();
                            foreach( $all_news as $news ) {
                        ?>
                        <p><a href='show.php?id=<?php echo $news['id'] ?>'>
                            <?php echo $news['title'] ?></a>
                            <?php echo $news['create_time'] ?></a>
                        </p>
                        <?php } ?>

                        <p align='right'><a href='news.php'>>>>更多</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>音乐之声</h5>
                        <?php
                            // $sql='select * from message where type=2 order by id desc'  // 按id倒序排列
                            $sql='select * from message where type=2 order by id desc limit 10';
                            $stmt=$pdo->prepare($sql);
                            $stmt->execute();
                            $all_music=$stmt->fetchAll();
                            foreach( $all_music as $music ) {
                        ?>
                        <p><a href='show.php?id=<?php echo $music['id'] ?>'>
                            <?php echo $music['title'] ?></a>
                            <?php echo $music['create_time'] ?></a>
                        </p>
                        <?php } ?>

                        <p align='right'><a href='music.php'>>>>更多</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.php'); ?>
    </div>
</body>
</html>