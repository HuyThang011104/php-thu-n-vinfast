<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }
    return false;
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        return true;
    }
    return false;
}

function filter()
{
    $arrFilter = [];
    if (!empty(isGet())) {
        // lọc giá trị value cho vào mảng;
        foreach ($_GET as $keys => $value) {
            $arrFilter[$keys] = filter_input(INPUT_GET, $keys, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    if (!empty(isPost())) {
        foreach ($_POST as $keys => $value) {
            $arrFilter[$keys] = filter_input(INPUT_POST, $keys, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    return $arrFilter;
}

function isEmail($email)
{
    $filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $filterEmail;
}
function isInt($int)
{
    $filterInt = filter_var($int, FILTER_VALIDATE_INT);
    return $filterInt;
}
function isFloat($float)
{
    $filterFloat = filter_var($float, FILTER_VALIDATE_FLOAT);
    return $filterFloat;
}
function reload($path = 'index.php')
{
    header("Location: $path");
    exit;
}
// Hàm upload ảnh
function upload()
{
    $target_dir = _DIR_ROOT . "/public/assets/image/";
    if (!empty($_FILES['images'])) {
        $target_file = $target_dir . $_FILES["images"]["name"];
        setFlashdata('target_file', $target_file);
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["images"]["name"]) . " has been uploaded.";
            setFlashdata('upload', 'Đã tải ảnh thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('upload', 'File của bạn đã bị lỗi');
            setFlashdata('type', 'danger');
        }
    }
}
function old($arrData, $keys)
{
    if (!empty($arrData[$keys])) {
        return $arrData[$keys];
    }
}
function danger($content)
{
    echo '<div class = "alert alert-danger">';
    echo $content;
    echo '</div>';
}
function success($content)
{
    echo '<div class = "alert alert-success">';
    echo $content;
    echo '</div>';
}
function error($contentError)
{
    echo '<span style="color: red; font-style: italic">';
    echo $contentError;
    echo '</span>';
}

function setAttribute($value, $type)
{
    echo '<div class = "text-center alert alert-' . $type . '">';
    echo $value;
    echo '</div>';
}
function setSession($key, $value)
{
    return $_SESSION[$key] = $value;
}

function getSession($key = '')
{
    if (empty($key)) {
        return $_SESSION;
    } else {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
}

function removeSession($key = '')
{
    if (empty($key)) {
        session_destroy();
        return true;
    } else {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
    }
}
function setFlashdata($key, $value)
{
    $key = 'flash_' . $key;
    return setSession($key, $value);
}
function getFlashdata($key)
{
    $key = 'flash_' . $key;
    $flashdata = getSession($key);
    removeSession($key);
    return $flashdata;
}
function sendEmail($receiveMail, $title, $content)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vukhoiclan@gmail.com';
        $mail->Password   = 'jaumdhsspkvvxpiy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('vukhoiclan@gmail.com', 'Chủ nợ');
        $mail->addAddress($receiveMail);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body    = $content;
        $mail->CharSet = 'UTF-8';
        $mail->send();
        // echo 'Gửi thành công';
    } catch (Exception $e) {
        echo "Gửi thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}
function urlWeb($method, $action = '')
{
    $currentWeb = __WEB_ROOT . trim($_SERVER['PATH_INFO'], '/');
    $currentHome = $currentWeb . '/index';
    $url_index = __WEB_ROOT . 'admin/' . $method . '/' . $action . '';
    if ($currentWeb == $url_index || $currentHome == $url_index) {
        return true;
    }
    return false;
}
function urlWebClient($method, $action = '')
{
    $currentWeb = __WEB_ROOT . trim($_SERVER['PATH_INFO'], '/');
    $currentHome = $currentWeb . '/index';
    $url_index = __WEB_ROOT . 'client/' . $method . '/' . $action . '';
    if ($currentWeb == $url_index || $currentHome == $url_index) {
        return true;
    }
    return false;
}
function urlHandle()
{
    $currentWeb = trim($_SERVER['PATH_INFO'], '/');
    $currenArr = explode('/', $currentWeb);
    $currentLine = $currenArr[0] . '/' . $currenArr[1];
    return $currentLine;
}

function formatVnd($money){
   return number_format($money,0,'.','.').' VNĐ';
}