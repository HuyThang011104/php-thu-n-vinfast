<!-- <h1>app</h1> -->
<?php
class App
{
    private $__controller, $__action, $__params,$__routes;
    function __construct()
    {
        global $route;
        if (!empty($route['default_controller'])) {
            $this->__controller = $route['default_controller']; // truyền đến file mặc định là home
        }
        $this->__action = 'index';
        $this->__params = [];
        $getUrl = $this->handleUrl();
        // echo $getUrl;
    }
    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    function handleUrl()
    {
        $url = $this->getUrl();
        // echo $url;
        $urlArr = explode("/",trim($url,"/"));
        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';
        if (!empty($urlArr)) {
            $urlCheck = '';
            foreach ($urlArr as $key => $value) {
                $urlCheck .= $value . '/';
                $fileCheck = trim($urlCheck, '/');
                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/Controllers/' . $fileCheck . '.php')) {
                    break;
                }
            }
            $fileArr = explode("/", $fileCheck);
            $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
            $urlCheck = implode("/", $fileArr);
        }

        $urlArr = array_values($urlArr);
        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';

        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }

        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        // echo $urlCheck;

        if (file_exists('app/Controllers/' . $urlCheck . ".php")) {
            require_once 'app/Controllers/' . $urlCheck . ".php";
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            } else {
                $this->loadError();
            }
        } else {
            $this->loadError();
        }
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        $this->__params = array_values($urlArr);
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError();
        }
    }


    function loadError($name = "404")
    {
        require_once 'app/error/' . $name . '.php';
    }
}
