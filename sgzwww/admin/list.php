<?php
include('../environ.php');
include('huihua.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="../js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
        a {
            text-decoration: none; // 取消下划线
            color: black; // 设置字颜色
        }
    </style>
</head>
<body>
    <div class="container" style="width: 100%;height: 200px;">
        <div class="row">
            <div class="col text-center">
                <h3>管理</h3>
            </div>
            <hr />
        </div>
        <div class="row" style="width: 100%;height: 200px;">
            <div class="col"">
                <div class="card">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        $pagesize=8;  // 每页显示几条记录
                        if(isset($_GET['page'])) {
                            $page=$_GET['page'];  // 看第几页就设置$page为第几页
                        } else {
                            $page=1;
                        }

                        if($page<1){  // 如果请求的页号小于1，则令其为第1页
                            $page=1;
                        }

                        $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);                
                        $type = $_GET['type'];
                        // 计算一共多少条记录，整除+1
                        $sql = 'select count(*) from message where type=?';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(1, $type);
                        $stmt->execute();

                        $count = $stmt->fetch()[0];  // 记录条数
                        $pagecount=ceil($count/$pagesize);  // 总页数  ceil向上取整

                        if($page>$pagecount){  // 如果请求的页号小于总页数，则令其为最后的页号
                            $page=$pagecount;
                        }
                        $start=$pagesize*($page-1);  // 起始记录号
                        $sql='select * from message where type=? order by id desc limit ?,?';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(1, $type);
                        $stmt->bindValue(2,$start,PDO::PARAM_INT);  // 默认一律按字符串转换处理，目的是防止SQL注入
                        $stmt->bindValue(3,$pagesize,PDO::PARAM_INT);  // PDO::PARAM_INT  代表参数转换为整形数字
                        $stmt->execute();
                        $all_news = $stmt->fetchAll();
                        foreach ($all_news as $news)
                        {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $news['id'] ?>
                                </td>
                                <td>
                                    <a href='../show.php?id=<?php echo $news['id'] ?>'>
                                    <?php echo $news['title'] ?></a>
                                </td>
                                <td><?php echo $news['create_time'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $news['id'] ?>&type=<?php echo $type ?>">修改</a>
                                    <a href="delete.php?id=<?php echo $news['id'] ?>" onclick="return confirm('确认删除吗？')">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <nav aria-label="Page navigation example" style="position: absolute; bottom: 0; width: 100%;">
                <ul class="pagination">
                    <li class="page-item <?php if($page==1){ echo 'disabled'; } ?>"><a class="page-link" href="?page=<?php echo $page-1 ?>&type=<?php echo $type ?>">上一页</a></li>
                    <?php for($i=1;$i<=$pagecount;$i++) { ?> 
                        <li class="page-item <?php if($i==$page){ echo 'active'; } ?>"><a class="page-link" href="?page=<?php echo $i ?>&type=<?php echo $type ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                    <li class="page-item <?php if($page==$pagecount){ echo 'disabled'; } ?>"><a class="page-link" href="?page=<?php echo $page+1 ?>&type=<?php echo $type ?>">下一页</a></li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>