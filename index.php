<?php
    $url = !empty($_GET['url']) ? $_GET['url'] : 'home';
    $arrUrl = explode('/', $url);
    $controller = isset($arrUrl[0]) ? $arrUrl[0] : 'home';
    $method = isset($arrUrl[1]) && $arrUrl[1] != ""  ? $arrUrl[1]: 'index';
    $params = isset($arrUrl[2]) && $arrUrl[2] != "" ? $arrUrl[2]: '';
    
    echo $controller;
    echo $method;
    echo $params;
?>