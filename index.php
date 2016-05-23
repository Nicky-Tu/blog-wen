<?php
require_once 'init.php';
require_once ROOT.'\model\Article.php';


//I had changed the file first
/**
 * there is this margin changed
 */
$article = new Article();
$article->setArticleinfo();
$smarty->assign('article',$article->getArticleinfo());
$smarty->display('index.html');

