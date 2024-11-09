<?php
session_start();

// 首次执行时为session计算器赋初值
if (! isset($_SESSION["c"])) {
    $_SESSION["c"]=0;
}

$_SESSION['c']=$_SESSION['c']+1;

echo '当前访问次数为：' .$_SESSION['c'];