<?php
include('environ.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新闻快讯 - <?php echo $site_name ?></title>
    <meta name="Keywords" content="<?php echo $site_keywords ?>" />
    <meta name="Description" content="<?php echo $site_Description ?>" />
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php include('header.php'); ?>
        <div class="row">
            <!-- <div class="col">
                <div class="card" style="width: 100%;">
                    <?php
                    $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
                    $sql = 'select * from message where type=1 order by id desc';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $all_news = $stmt->fetchAll();
                    foreach ($all_news as $news) {
                    ?>
                    <p><a href='show.php?id=<?php echo $news['id'] ?>'>
                        <?php echo $news['title'] ?></a>
                        <?php echo $news['create_time'] ?></a>
                    </p>
                    <?php } ?>
                </div>
            </div> -->

            <div class="card-body">
            <!--
            分页要素：每页多少条记录，第几页——>记录从第几条取几条，记录号从0开始数
            每页5条记录，想看第3页，问，记录从第几条取几条？前两页都是8条记录足额2*8=16，第3页从16开始，但16-
            第81页从哪个记录号开始？64  第n页，记录号=(n-1)*每页记录个数
            limit (页号-1)*每页记录个数，每页记录个数
            -->
            <?php
                $pagesize=6;  // 每页显示几条记录
                if(isset($_GET['page'])) {
                    $page=$_GET['page'];  // 看第几页就设置$page为第几页
                } else {
                    $page=1;
                }

                if($page<1){  // 如果请求的页号小于1，则令其为第1页
                    $page=1;
                }

                $pdo=new PDO($mysql_dsn,$mysql_dbname,$mysql_dbpassword);
                
                // 计算一共多少条记录，整除+1
                $sql='select count(*) from message where type=1';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $count=$stmt->fetch()[0];  // 记录条数
                $pagecount=ceil($count/$pagesize);  // 总页数  ceil向上取整

                if($page>$pagecount){  // 如果请求的页号小于总页数，则令其为最后的页号
                    $page=$pagecount;
                }

                $start=$pagesize*($page-1);  // 起始记录号
                $sql='select * from message where type=1 order by id desc limit ?,?';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1,$start,PDO::PARAM_INT);  // 默认一律按字符串转换处理，目的是防止SQL注入
                $stmt->bindValue(2,$pagesize,PDO::PARAM_INT);  // PDO::PARAM_INT  代表参数转换为整形数字
                $stmt->execute();
                $all_news = $stmt->fetchAll();
                foreach ($all_news as $news)
                {
                ?>
                <p><a href='show.php?id=<?php echo $news['id'] ?>'>
                    <?php echo $news['title'] ?></a>
                    <?php echo $news['create_time'] ?></a>
                </p>
                <?php } ?>
            </div>
        </div>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php if($page==1){ echo 'disabled'; } ?>"><a class="page-link" href="?page=<?php echo $page-1 ?>">上一页</a></li>
                <?php for($i=1;$i<=$pagecount;$i++) { ?> 
                    <li class="page-item <?php if($i==$page){ echo 'active'; } ?>"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php } ?>
                <li class="page-item <?php if($page==$pagecount){ echo 'disabled'; } ?>"><a class="page-link" href="?page=<?php echo $page+1 ?>">下一页</a></li>
            </ul>
        </nav>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>