<?php

$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri === '/' || $request_uri === ''|| $request_uri === '/home' || $request_uri === '/home/') {
    header('Content-Type: text/html');
    $html = file_get_contents('navbar.html');
    echo $html;
    $html = file_get_contents('welcome.html');
    echo $html;
}
else if($request_uri === '/blog' || $request_uri === '/blog/'){
    header('Content-Type: text/html');
    $html = file_get_contents('navbar.html');
    echo $html;
    $html = file_get_contents('blog.html');
    echo $html;
}
else if($request_uri === '/contact' || $request_uri === '/contact/'){
    header('Content-Type: text/html');
    $html = file_get_contents('navbar.html');
    echo $html;
    $html = file_get_contents('contact.html');
    echo $html;

}
else {
    echo "404: Unbekannte Seite";
}