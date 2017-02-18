<?php
function get($key)
{
    if(isset($_GET[$key]))
        return $_GET[$key];
    else
        return '';
}
function post($key)
{
    if(isset($_POST[$key]))
        return $_POST[$key];
    else
        return '';
}
function IfNotLogin(){
    session_start();
    if(!isset($_SESSION['userid'])){
        header('Location:'.WWWROOT.'web/user/login.php');
        die();
    }
}
function IfLogin(){
    session_start();
    if(isset($_SESSION['userid'])){
        header('Location:'.WWWROOT.'web/user/panel.php');
        die();
    }
} 
function CheckIsLogin(){
    session_start();
    return isset($_SESSION['userid']);
}