<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/18
 * Time: 9:16
 */
require_once '../init.php';
require_once  '../model/Article.php';
require_once '../model/Database.php';

if(isset($_POST['act'])){
    switch($_POST['act']){
        case 'up_article'   : upload();break;
        case 'show_article' : index($smarty);break;
    }
}
elseif(isset($_GET['act'])){
    switch($_GET['act']){
        case 'up_article'   : upload();break;
        case 'show_article' : index($smarty);break;
    }
}
else
    save_image();




function index($smarty){
    if(isset($_GET['id'])){
        $db = new Database();//连接数据库
        $sql = "select article_id,title, author,create_time,path from article where article_id='".$_GET['id']."';";
        $rs = $db->query('blog',$sql);  //根据id号查询文章信息
        $row =mysql_fetch_array($rs);

        $path = ROOT.str_replace('article','\article\\',$row['path']);  //设置文章读取路径
        $content = readf($path);      //读取文章内容并格式化
        $comment = comment($db,$_GET['id']);
        if($content){
            $smarty->assign('article_id',$row['article_id']);
            $smarty->assign('path',$path);
            $smarty->assign('title',$row['title']);
            $smarty->assign('create_time',$row['create_time']);
            $smarty->assign('author',$row['author']);
//    $content = iconv('GBK','UTF-8',$content);
//    $content = mb_convert_encoding($content,'UTF-8');
            $smarty->assign('content',$content);
            $smarty->assign('comment',$comment);
            $db->destroy();
            $smarty->display('article.html');
        }           //成功读取内容，页面赋值显示
        else{
            $db->destroy();
            $smarty->display('404.tpl');
        }                   //读取内容失败
    }
    else{
        $smarty->display('404.tpl');
    }
}





/**
 * 读取文章内容
 *
 * @param $path    //读取文件的路径
 * @return bool|string      读取成功返回读取的文本，失败则返回false
 */
function readf($path)
{

    $content = "<p style='text-indent: 2em;text-align: left'>";
    $file = fopen($path, 'r');
    if($file){
        while (!feof($file)) {
            $buff = fgets($file);
            $buff = strip_tags($buff,"");//清楚文本内容中的html文本格式

            if(preg_match('/^\t|\n| {1,9}/',$buff)){
                $buff =ltrim($buff);
                $buff = preg_replace('/\t/','',$buff);
                $buff = preg_replace('/\n/','',$buff);
                $buff = preg_replace('/ /','',$buff);
                $buff = mb_convert_encoding($buff,'utf-8','GBK');

                $content .= "</p><p style='text-indent: 2em;text-align: left'>".$buff;
            }
            else{
                $buff =ltrim($buff);
                $buff = preg_replace('/\n/','',$buff);
                $buff = preg_replace('/ /','',$buff);
                $buff = mb_convert_encoding($buff,'utf-8','GBK');
                $content.=$buff;
            }

        }
        $content.="</p>";
        fclose($file);
        return $content;
    }
    else{
        $error = '打开文件出错';
        return false;
    }


}

/**
 * 读取网友评论内容
 * @param
 * $comment=array(
 *  comment_id=>array(
 *      custom_id,
 *      content,
 *      comment_time,
 *      reply=>array(
 *          reply_id=>array(
 *              replyer,
 *              bereplyer,
 *              reply_content)))
 */
function comment($db,$id){
    $sql = "select * from comment where article_id='".$id."' order by comment_time desc";
    $rs = $db->query('blog',$sql);
    $i = 0;
    $comment=null;
    $replylist = reply($db,$id);
    while($row = mysql_fetch_array($rs)){
        $comment[$row['comment_id']]['custom_id'] = $row['custom_id'];
        $comment[$row['comment_id']]['content']   = $row['content'];
        $comment[$row['comment_id']]['comment_time'] = $row['comment_time'];
        if(isset($replylist[$row['comment_id']])){
            $comment[$row['comment_id']]['reply'] = $replylist[$row['comment_id']];
        }
        else{
            $comment[$row['comment_id']]['reply'] = null;
        }

    }
    return $comment;
}

/**
 * 读取网友的回复内容
 *
 * @param $db
 * @param $id
 * @return null
 */
function reply($db,$id){
    $sql = "select article_id,comment_id,reply_id,replyer,bereplyer,reply_content from reply where ".
            "article_id='".$id."';";
    $rs = $db->query('blog',$sql);
    $replylist = null;
    while($row = mysql_fetch_array($rs)){
        $replylist[$row['comment_id']][$row['reply_id']]['replyer'] = $row['replyer'];
        $replylist[$row['comment_id']][$row['reply_id']]['bereplyer'] = $row['bereplyer'];
        $replylist[$row['comment_id']][$row['reply_id']]['reply_content'] = $row['reply_content'];
    }
    return $replylist;
}

/**
 * 文件上传方法
 *
 * $_FILES  获得表单提交的文件变量内容
 * __DIR__  本文件所在的文件根目录
 */
function upload(){
//    $txt = $_FILES['upload_file'];
//    $path = __DIR__;
//    $path = str_replace('controller','article\\'.$txt['name'],$path);
//    move_uploaded_file($txt['tmp_name'],$path);   //将上传的文件从临时文件夹移动到目标文件夹
//    print_r($txt);
//    echo '<br/>';
//    print_r($_POST);
//    $title = $_POST['title'];
//    $content = $_POST['text'];
//    $author = $_POST['author'];
//    $article = new Article();
//    $article_info = new ArrayObject();
//    $article_info->title = $title;
//    $article_info->content = $content;
//    $article_info->author = $author;
//
//    $article->uploadarticle($article_info);
}

/**
 * 处理上传的图片文件
 */
function save_image()
{
    //获取上传的文件表单
    $file = $_FILES['file'];
    //判断表单是否存在
    if ($file) {
        //获得上传文件的临时存储路径
        $tmp_path = $file['tmp_name'];
        //取得本控制器的绝对路径
        $path = __DIR__;
        //将路径中的controller文件夹替换成image文件夹，作为上传图片文件存储的路径
        $path = str_replace('controller', 'image\\' . $file['name'], $path);
        //将图片文件从临时目录转移到存储目标目录
        move_uploaded_file($tmp_path, $path);
        //输出返回的图片存储路径信息，并作为img标签插入到编辑框内供用户预览
        echo '<img  style="height:100px;width:100px" src="../image/' . $file['name'] . '"/>';
//        echo $path;
    }
}
/**
 * 处理上传的视屏文件
 */
function save_video()
{
    //获取上传的文件表单
    $file = $_FILES['file'];
    //判断表单是否存在
    if ($file) {
        //获得上传文件的临时存储路径
        $tmp_path = $file['tmp_name'];
        //取得本控制器的绝对路径
        $path = __DIR__;
        //将路径中的controller文件夹替换成存储图像文件的videos文件夹，作为上传图片文件存储的路径
        $path = str_replace('controller', 'videos\\' . $file['name'], $path);
        //将图片文件从临时目录转移到存储目标目录
        move_uploaded_file($tmp_path, $path);
        //输出返回的图片存储路径信息，并作为img标签插入到编辑框内供用户预览
        echo '<video  style="height:100px;width:100px" src="../videos/' . $file['name'] . '"></video>';
    }
}
