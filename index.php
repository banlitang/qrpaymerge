<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strpos($ua, 'MicroMessenger')) {
    $type = 'wepay';
    $name = '微信支付|Wechat Pay';
    $url = '';   //微信支付链接
    $icon_img = '<img src="/wechatpay.png" width="48px" height="48px" alt="'.$name.'">';
}
elseif (strpos($ua, 'AlipayClient')) {
    $url = '';   //支付宝链接
    header('location: ' . $url);
}
elseif (strpos($ua, 'QQ/')) {
    $type = 'qq';
    $name = 'QQ钱包支付|QQ Wallet';
    $url = "";   //QQ钱包支付链接
    $icon_img = '<img src="/qqpay.png" width="48px" height="48px" alt="'.$name.'">';
}
else {
    $type = 'other';
    $name = '付款|Pay';
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
$qr_img = '<img src="qrcode.php?t='.urlencode($url).'">';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$name?></title>
    <style type="text/css">
        * {margin: auto;padding: 0;border: 0;}
        html {-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%}
        body {font-family: -apple-system, SF UI Text, Arial, Microsoft YaHei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;color: #333;}
        img {max-width: 100%;}
        h3 {padding: 10px;}
        .container {text-align: center;}
        .title {padding: 2em 0;background-color: #fff;}
        .content {padding: 2em 1em;color: #fff;}
        .wepay {background-color: #23ac38;}
        .qq {background-color: #4c97d5;}
        .other {background-color: #ff7055;}
    </style>
</head>
<body class="<?=$type?>">
    <div class="container">
        <div class="title"><h1><?=$name?></h1></div>
        <div class="content"><?=$type=='other'?$qr_img.'<h3><br>请扫描二维码或复制链接到App付款<br><br>Please scan QR code or copy link to App payment</h3>':$qr_img.'<h3>扫描或长按识别二维码，向Ta付款<br><br>Scan or long press the identification QR code to pay</h3>'?></div>
    </div>
</body>
</html>