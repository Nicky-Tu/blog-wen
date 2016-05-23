<?php /* Smarty version Smarty-3.1.14, created on 2016-04-27 10:31:56
         compiled from "C:\wamp\www\php_pro\ajax\package\view\index.html" */ ?>
<?php /*%%SmartyHeaderCode:13838571dc723f212f7-46091278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76739aa490a6f369ad9da7e2ddda5a263bb2095c' => 
    array (
      0 => 'C:\\wamp\\www\\php_pro\\ajax\\package\\view\\index.html',
      1 => 1461661795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13838571dc723f212f7-46091278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_571dc72435d9f8_60546904',
  'variables' => 
  array (
    'article' => 0,
    'ar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dc72435d9f8_60546904')) {function content_571dc72435d9f8_60546904($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>岁月静好，此生悠然</title>
    <link rel="stylesheet" href="view/css/css.css" type="text/css">
</head>
<body>
<ul>
<?php if ($_smarty_tpl->tpl_vars['article']->value){?>
    <?php  $_smarty_tpl->tpl_vars['ar'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ar']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['article']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ar']->key => $_smarty_tpl->tpl_vars['ar']->value){
$_smarty_tpl->tpl_vars['ar']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['ar']->key;
?>
        <li>
        <a  href="controller/ArticleController.php?act=show_article&id=<?php echo $_smarty_tpl->tpl_vars['ar']->value['article_id'];?>
">
        <div>
            <div>
                <strong><?php echo $_smarty_tpl->tpl_vars['ar']->value['title'];?>
</strong><br/>
                <label id="label_author">作者：<?php echo $_smarty_tpl->tpl_vars['ar']->value['author'];?>
</label>
                <label id="label_time">创建时间：<?php echo $_smarty_tpl->tpl_vars['ar']->value['create_time'];?>
</label><br/>
            </div>
            <hr/>
            <div id="content"><?php echo $_smarty_tpl->tpl_vars['ar']->value['describle'];?>
</div>
        </div>
        </a>
        <br/>
        </li>
    <?php } ?>

<?php }?>
</ul>
</body>
</html><?php }} ?>