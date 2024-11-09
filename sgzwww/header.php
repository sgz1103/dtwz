<div class="row">
  <div class="col">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/001.jpg" class="d-block w-100" alt="..." width="100%" height="300">
        </div>
        <div class="carousel-item">
          <img src="img/002.jpg" class="d-block w-100" alt="..." width="100%" height="300">
        </div>
        <div class="carousel-item">
          <img src="img/003.jpg" class="d-block w-100" alt="..." width="100%" height="300">
        </div>
        <div class="carousel-item">
          <img src="img/004.jpg" class="d-block w-100" alt="..." width="100%" height="300">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <nav class="nav nav-pills nav-fill">
      <a class="nav-link <?php echo $_SERVER['PHP_SELF']=='/index.php' ? 'active' : '' ?>" aria-current="page" href="index.php">首页</a>
      <a class="nav-link <?php echo $_SERVER['PHP_SELF']=='/news.php' ? 'active' : '' ?>" href="news.php">新闻快讯</a>
      <a class="nav-link <?php echo $_SERVER['PHP_SELF']=='/music.php' ? 'active' : '' ?>" href="music.php">音乐之声</a>
      <?php
      session_start();
      if(isset($_SESSION['adminname'])){
      ?>
        <a class="nav-link <?php echo $_SERVER['PHP_SELF']=='/admin.php' ? 'active' : '' ?>" href="admin/index.php" tabindex="-1"><?php echo $_SESSION['adminname'] ?>进入管理</a>
      <?php } else { ?>
        <a class="nav-link <?php echo $_SERVER['PHP_SELF']=='/admin.php' ? 'active' : '' ?>" href="admin.php" tabindex="-1">后台管理</a>
      <?php } ?>
    </nav>
  </div>
</div>