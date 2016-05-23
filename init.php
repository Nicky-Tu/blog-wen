<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/18
 * Time: 16:30
 */

header('Content-type:text/html;charset=utf-8');
session_start();//开启session
require_once __DIR__.'\libs\Smarty.class.php';
define('ROOT',__DIR__);
//设置时区
date_default_timezone_set('Asia/Shanghai');
$smarty = new Smarty();
$smarty->template_dir =ROOT."/view";
$smarty->compile_dir =ROOT."/view/templates_c";
$smarty->config_dir = ROOT."/view/config";
$smarty->cache_dir =ROOT."/view/cache";
$smarty->caching = false;