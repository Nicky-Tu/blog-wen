<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/14
 * Time: 9:10
 */
header('Content-type:text/html;charset=utf-8');
session_start();
require_once '../model/User.php';
require_once '../model/Database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['act']){
        case 'checkUser' : checkUser(); break;
        case 'login'     : login();     break;
        case 'checklogin': checklogin();break;
    }
}

/**
 * 检查用户输入的用户名是否存在
 */
function checkUser(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //格式化用户名
        $username = str_replace(' ','',trim($_POST['username']));
        //连接数据库
        $db = new Database();
        $sql = 'select user_name from blog_user where user_name ="'.$username.'";';
        $rs = $db->query('blog',$sql);
        //是否查询到结果集
        if(mysql_num_rows($rs) < 1){
            echo 'false';
            return;
        }
        else{
            echo 'true';
            return;
        }
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
        return;
    }
}



/**
 * @param 登陆
 */
function login(){

    //格式化用户名
    $username = str_replace(' ','',trim($_POST['username']));
    $password = str_replace(' ','',trim($_POST['password']));
    $check_code = str_replace(' ','',trim($_POST['yanzhengma']));
    //判断验证码是否正确
    if($check_code != $_SESSION['check_code']){
        //弹出确认框，点击确认按钮后跳转到指定页面
        echo '<script>alert("验证码输入不正确");location.href="../view/login.html";</script>';
//        header('Refresh:1; url=../view/login.html');
        exit;
    }
    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);
    $db = new Database();
    $sql = "select user_name from blog_user where user_name = '".$user->getUsername().
            "' and password = '".$user->getPassword()."';";
    $rs = $db->query('blog',$sql);
    $user = array('user'=>$user->getUsername(),'passwd'=>$user->getPassword());
    if(mysql_num_rows($rs) >= 1){
        setcookie("user",$user);
        $_SESSION['user'] = $user;
        header('location:../index.php');
    }
    else{
        echo '用户名或密码输入错误，请检查正确后再登陆。';
        header('Refresh:2; url=../view/login.html');
    }

}

/**
 * 验证用户登录状况
 *
 */
function checklogin(){

}