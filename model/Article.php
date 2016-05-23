<?php

/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/18
 * Time: 9:02
 */
class Article
{
    /**
     title;        文章题目
     article_id;    id标识符
     path;          文章存放路径
     describe;       文章简要描述
     author;        作者
    create_time;    创建时间
    */
    protected $articleinfo = array(array(
                                    'title'=>'',
                                    'article_id'=>'',
                                    'author'=>'',
                                    'create_time'=>'',
                                    'path'=>'',
                                    'describle'=>'')
                                    );


    public function setArticleinfo()
    {
        require_once 'Database.php';
        $db = new Database();
        $sql = "select title,article_id,author,create_time,path,describle from article order by create_time DESC";
        $rs = $db->query('blog',$sql);
        $articleinfo = array();
        $id = 0;
        while($row = mysql_fetch_array($rs)){
            $articleinfo[$id]['title'] = $row['title'];
            $articleinfo[$id]['article_id'] = $row['article_id'];
            $articleinfo[$id]['author'] = $row['author'];
            $articleinfo[$id]['create_time'] = $row['create_time'];
            $articleinfo[$id]['path'] =ROOT.$row['path'];
            $articleinfo[$id]['describle'] = $row['describle'];
            $id++;
        }
        $this->articleinfo = $articleinfo;
    }

    public function getArticleinfo()
    {
        return $this->articleinfo;
    }

    /**
     * 上传编辑的文章
     *
     * @param $article
     * @return bool
     */
    public function uploadarticle($article){
        $title = $article->title;
        $author = $article->author;
        $create_time = date('Y-m-d');
        $content = $article->content;
        $article_id = 0;
        require_once 'Database.php';
        $db = new Database();
        $sql = 'select article_id from article;';
        $rs = $db->query('blog',$sql);
        if($rs){
            while($row = mysql_fetch_array($rs)){
                if($article_id <= $row['article_id'])
                    $article_id = $row['article_id'];
            }
            $article_id = $article_id + 1;
        }
        else{
            $article_id = 1;
        }
        $path = '/article/'.$article_id.'.txt';
        $size = (int)mb_strlen($content)*0.2;
        $describe = mb_substr($content,0,$size);
        $sql = "insert into article (article_id,title,author,create_time,path,describle) values ('".
                $article_id."','".$title."','".$author."','".$create_time."','".$path."','".$describe."')";
        $rs = $db->query('blog',$sql);
        if(!$rs){
            return false;
        }
        else{
            $file = fopen('..'.$path,'w');
            if($file){
                $content = mb_convert_encoding($content,'GBK','utf-8');
                fwrite($file,$content);
                return true;
            }
            else{
                $sql = 'rollback;';
                $db->query('blog',$sql);
                return false;
            }
        }
    }

}