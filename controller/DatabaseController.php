<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/15
 * Time: 9:04
 */
header('Content-type:text/html;charset=utf-8');
//require_once '../model/Database.php';
//$db = new Database();

$con = mysql_connect('127.0.0.1','user','123');
if($con){
    echo 'localhost,root,root 数据库连接成功';
    echo '<hr/>';
    query($con);
}
else{
    echo 'localhost,root,root 数据库连接失败';
    echo '<br/>';
    if($con = mysql_connect('127.0.0.1','user')){
        echo 'localhost,root 数据库连接成功';
        echo '<hr/>';
        query($con);
    }
    else{
        echo 'localhost,root 数据库连接失败';
        echo '<br/>';
        if($con = mysql_connect('127.0.0.1')){
            echo 'localhost 数据库连接成功';
            echo '<hr/>';
            query($con);
        }
        else{
            echo 'localhost 数据库连接失败';
            echo '<hr/>';
            return false;
        }
    }
}
function query($con){
    try{
        $db = mysql_select_db('blog',$con);
        if(!$db) {
            throw new Exception();
        }
    }catch(Exception $e){
        echo '自定义异常：',$e;
    }
    $db = mysql_select_db('blog',$con);
    if($db){
        $result = mysql_query("SHOW TABLES",$con);
        while($row = mysql_fetch_array($result))
        {
            echo $row[0]."";

        }
        echo '<hr/>';
        $sql = "select * from blog_user";
        $rs = mysql_query($sql,$con);
        if($rs){
             $str = '<table border="1"><tr><th>username</th><th>password</th></tr>';

                while($row = mysql_fetch_array($rs)) {

                    $str .= '<tr><td>' . $row[0] . '</td><td>' . $row[1] . '</td></tr>';

                }

            $str.='</table>';
            echo $str;
            echo '<hr/>';
            return true;
        }

        else {
            echo '未查询到结果集';
            echo '<hr/>';
            return false;
        }
    }
    else{
        echo '没有找到blog数据库';
        echo '<hr/>';
        return false;
    }
}


