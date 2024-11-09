<?php
session_start();
if (! isset( $_SESSION['adminname'] )){
die('非法访问！');
}