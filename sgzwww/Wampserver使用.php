<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <style>
      .row {
            margin: 0 auto;  /* 居中 */
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col">
            <ol>
                <li>下载VScode绿色版zip.x64</li>
                <li>下载Wampserver安装</li>
                <li>Wampserver安装问题需要vc++库，所以又下载安装VisualCppRedist_AIO_x86_x64.exe</li>
                <li>在D盘新建个目录（文件夹）如sunguizunwww，用于存放网站</li>
                <li>使用vscode打开上面的目录，以便新建编辑网页</li>
                <li>单击Wampserver，Add a VirtualHosts->VirtualHost Management，在第一个文本框为主机起个名（如www），第二个文本框告诉上面自己网站目录的路径，单击下方<a href="img/新建.jpg">创建</a></li>
                <li>右击ampserver->tools->restart DNS</li>
                <li>单击Wampserver，your VirtualHost->选自己建的主机（如上面的www）</li>
                <li>会自动打开浏览器，但没有网页，使用vscode创建一个index.html</li>
                <li>保存网页ctrl+s，在浏览器刷新（f5）</li>
            </ol>
        </div>
    </div>
</body>