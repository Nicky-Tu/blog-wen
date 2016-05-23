<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/20
 * Time: 15:43
 */
require_once '../init.php';
require_once '../model/Database.php';

if(isset($_POST['type'])){
    insert_reply();
}
else{
    insert_comment();
}

function insert_comment(){
        $article_id = $_POST['article_id'];
        $content = $_POST['content'];
        $db = new Database();
    $sql = "select comment_id from comment where article_id='".$article_id."';";
    $rs = $db->query('blog',$sql);
    $comment_id = 0;
    while($row = mysql_fetch_array($rs)){
        if($comment_id <= $row[0]){
            $comment_id = $row[0];
        }
    }
    $comment_id = $comment_id+1;
    $comment_time = date('Y-m-d h:m:s');
    $custom_id = '匿名读者';
    if(@$_POST['custom_id']) {
        $custom_id = $_POST['custom_id'];
    }
    $sql = "insert into comment (article_id,comment_id,comment_time,content,custom_id) values ".
            "('".$article_id."','".$comment_id."','".$comment_time."','".$content."','".$custom_id."');";
    $rs = $db->query('blog',$sql);
    if($rs){
//        header("location:ArticleController.php?id=".$article_id);

        echo "<ul style='margin-top: 15px'>";
        echo '<li>';
        echo '<label>'.$custom_id.'</label><label>'.$comment_time.'</label>';
        echo '</li>';
        echo '<li><hr/></li>';
        echo '<li>';
        echo '<div>'.$content.'</div><div><a href="javascript::">回复</a></div>';
        echo '</li>';
    }
    else{
        echo '评论上传失败。';
        return false;
    }
}

function insert_reply(){

    $db = new Database();
    $article_id = $_POST['article_id'];
    $comment_id = $_POST['comment_id'];
    $replyer    = $_POST['replyer'];
    $bereplyer  = $_POST['bereplyer'];
    $reply_content = $_POST['reply_content'];
    $sql = "select reply_id from reply where article_id='".$article_id."' and comment_id='".$comment_id."';";
    $rs  = $db->query('blog',$sql);
    $reply_id = 0;
    while($row = mysql_fetch_array($rs)){
        if($reply_id <=$row[0]){
            $reply_id = $row[0];
        }
    }
    $reply_id = $reply_id+1;
    $sql = "insert into reply (article_id,comment_id,reply_id,replyer,bereplyer,reply_content) values ('".
            $article_id."','".$comment_id."','".$reply_id."','".$replyer."','".$bereplyer.
            "','".$reply_content."');";
    $rs = $db->query('blog',$sql);
    if($rs){
        echo '<li style="margin-top: 15px">';
        echo $replyer.' 回复 '.$bereplyer."：".$reply_content;
        echo '<a style="display: block" class="reply'.$reply_id.'" href="javascript:" onclick=showtextarea('.$comment_id.','.$reply_id.')>回复</a>';
        echo '<div class="reply'.$comment_id.'-'.$reply_id.'" style="display:none">';
        echo '<textarea id="reply'.$comment_id.'-'.$reply_id.'" rows="3" placeholder="回复内容："></textarea>';
        echo '<input type="hidden" id="replyer_'.$reply_id.'" value="'.$replyer.'"/>';
        echo '<button  type="button" onclick="insert_reply('.$comment_id.','.$reply_id.')">发表</button>';
        echo '</div>';
        echo '</li>';
    }
    else{
        echo '<li style="margin-top: 15px">处理回复过程中发生错误</li>';
    }
}