<?php /* Smarty version Smarty-3.1.14, created on 2016-05-19 18:02:06
         compiled from "C:\wamp\www\php_pro\ajax\package\view\article.html" */ ?>
<?php /*%%SmartyHeaderCode:16561571dcacb77af23-07803408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd90f304e8c549f348e068cbb70e8e1de9d33d93b' => 
    array (
      0 => 'C:\\wamp\\www\\php_pro\\ajax\\package\\view\\article.html',
      1 => 1463652125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16561571dcacb77af23-07803408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_571dcacb7feea4_05792764',
  'variables' => 
  array (
    'title' => 0,
    'content' => 0,
    'error' => 0,
    'author' => 0,
    'create_time' => 0,
    'article_id' => 0,
    'comment' => 0,
    'v' => 0,
    'per' => 0,
    'reply' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dcacb7feea4_05792764')) {function content_571dcacb7feea4_05792764($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" href="../view/css/article.css" type="text/css">
    <script type="text/javascript" src="../js/jquery-2.2.3.js"></script>
    <script type="text/javascript" src="../js/pack_obj.js"></script>
</head>
<body>
<?php if (!$_smarty_tpl->tpl_vars['content']->value){?>
    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php }else{ ?>
    <div id="div1">
        <ul>
            <li style="width: 100%;float:left;margin-bottom: 10px;position: relative;">
                <div id="div_image" style="float: left;">
                <img  src="../view/image/1.jpg"/>
                </div>
                <div id="div_title" style="float: left;width: auto;margin-top: 10px;">
                    <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
                    <br/>
                    <label id="label_author"><?php echo $_smarty_tpl->tpl_vars['author']->value;?>
</label><label id="label_time"><?php echo $_smarty_tpl->tpl_vars['create_time']->value;?>
</label>
                </div>
                <hr style="width: 100%;position: absolute;bottom:-5px;left:20px;"/>
            </li>
            <li>
                <div id="div_content">
                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                </div>
            </li>
            <li>
                <div  id="click"  style="display: block" onclick="show()">点击评论...</div>
                <div id="comment" style="display: none">
                    <label>评论:</label><br/>
                    <input  id="article_id" type="hidden" name="article_id" value="<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
"/>
                    <textarea  id="textarea" cols="20" rows="4" name="comment" placeholder="简单说几句吧。"></textarea><br/>
                    <button id="uploadcomment" type="button" onclick="upload()">发表</button>
                </div>
            </li>

            <li id="commentcontent">
                <?php if ($_smarty_tpl->tpl_vars['comment']->value){?>
                <?php  $_smarty_tpl->tpl_vars['per'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['per']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['per']->key => $_smarty_tpl->tpl_vars['per']->value){
$_smarty_tpl->tpl_vars['per']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['per']->key;
?>
                <ul style="margin-top: 15px" id="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                    <li>
                        <label><?php echo $_smarty_tpl->tpl_vars['per']->value['custom_id'];?>
</label>
                        <label><?php echo $_smarty_tpl->tpl_vars['per']->value['comment_time'];?>
</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div><?php echo $_smarty_tpl->tpl_vars['per']->value['content'];?>
</div>
                        <div>
                            <a style="display: block" class="comment<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" href="javascript:" onclick="showtextarea(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,null)">回复</a>
                        </div>
                        <div class="commentreply<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" style="display: none" >
                            <textarea id="reply<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['per']->value['custom_id'];?>
"/>
                            <button  type="button" onclick="insert_reply(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,null)">发表</button>
                        </div>
                    </li>
                    <ul id="comment_reply<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" style="margin-top: 15px">
                    <?php if ($_smarty_tpl->tpl_vars['per']->value['reply']){?>

                            <?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reply']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['per']->value['reply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value){
$_smarty_tpl->tpl_vars['reply']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['reply']->key;
?>
                            <li style="margin-top: 15px">
                                <?php echo $_smarty_tpl->tpl_vars['reply']->value['replyer'];?>
 回复 <?php echo $_smarty_tpl->tpl_vars['reply']->value['bereplyer'];?>
:<?php echo $_smarty_tpl->tpl_vars['reply']->value['reply_content'];?>

                                <a  style="display: block" class="relpy<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" href="javascript:void(0)" onclick="showtextarea(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)">回复</a>
                                <div class="reply<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="display: none" >
                                    <textarea id="reply<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" rows="3" placeholder="回复内容："></textarea>
                                    <input type="hidden" id="replyer_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['reply']->value['replyer'];?>
"/>
                                    <button  type="button" onclick="insert_reply(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)">发表</button>
                                </div>
                            </li>
                            <?php } ?>
                    <?php }?>
                    </ul>
                </ul>
                <?php } ?>
                <?php }?>
            </li>
        </ul>
    </div>

<?php }?>
</body>
</html><?php }} ?>