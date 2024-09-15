<!-- Xử lý liên quan đến route.   -->
<!-- <h1>bootstrap</h1> -->
<?php
define('_DIR_ROOT',__DIR__);
// xử lý http root;
if(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']='on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'].'/';
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'].'/';
}
$folder = explode('/',$_SERVER['REQUEST_URI'])[1].'/'; 
$web_root.=$folder;
define('__WEB_ROOT',$web_root);
require_once "config/route.php";
require_once "app/App.php"; 
require_once "core/controller.php"; 
require_once "core/connection.php"; 
require_once "core/model.php";

//Làm việc với php mailer;

require_once "core/phpMailer/Exception.php";
require_once "core/phpMailer/PHPMailer.php";
require_once "core/phpMailer/SMTP.php";

require_once "core/functions.php"; // làm việc với hàm;
 