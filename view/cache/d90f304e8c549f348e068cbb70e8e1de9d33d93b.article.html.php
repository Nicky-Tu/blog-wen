<?php /*%%SmartyHeaderCode:26028571dc906d15cc4-04119249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd90f304e8c549f348e068cbb70e8e1de9d33d93b' => 
    array (
      0 => 'C:\\wamp\\www\\php_pro\\ajax\\package\\view\\article.html',
      1 => 1461230510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26028571dc906d15cc4-04119249',
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_571dc906e051f1_66527258',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dc906e051f1_66527258')) {function content_571dc906e051f1_66527258($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>唯心独醉，笑看红尘</title>
    <link rel="stylesheet" href="../view/css/article.css" type="text/css">
    <script type="text/javascript" src="../js/jquery-2.2.3.js"></script>
    <script type="text/javascript" src="../js/pack_obj.js"></script>
</head>
<body>
    <div id="div1">
        <ul>
            <li>
                <div id="div_image">
                <img  src="../view/image/1.jpg"/>
                </div>
                <div id="div_title">
                    <strong>唯心独醉，笑看红尘</strong>
                    <br/>
                    <label id="label_author">北斗</label><label id="label_time">2016-04-19</label>
                </div>
                <br/><hr/>
            </li>
            <li>
                <div id="div_content">
                    <p style='text-indent: 2em;text-align: left'></p><p style='text-indent: 2em;text-align: left'>又是一年春光美，品一杯茗茶，笑看花开花谢，一种淡淡的失落涌上心尖。扬手是春，落手是秋，在这一扬一落之间，心中突然有种难言的痛。
                </div>
            </li>
            <li>
                <div  id="click"  style="display: block" onclick="show()">点击评论...</div>
                <div id="comment" style="display: none">
                    <label>评论:</label><br/>
                    <input  id="article_id" type="hidden" name="article_id" value="2"/>
                    <textarea  id="textarea" cols="20" rows="4" name="comment" placeholder="简单说几句吧。"></textarea><br/>
                    <button id="uploadcomment" type="button" onclick="upload()">发表</button>
                </div>
            </li>
                        <li id="commentcontent">
                                <ul style="margin-top: 15px" id="16">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:53</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>是多少啊速度发顺丰</div>
                        <div>
                            <a style="display: block" class="comment16" href="javascript::" onclick="showtextarea(16,null)">回复</a>
                        </div>
                        <div class="commentreply16" style="display: none" >
                            <textarea id="reply16" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter16" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(16,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="12">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:46</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>经济环境经济和经济和</div>
                        <div>
                            <a style="display: block" class="comment12" href="javascript::" onclick="showtextarea(12,null)">回复</a>
                        </div>
                        <div class="commentreply12" style="display: none" >
                            <textarea id="reply12" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter12" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(12,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="13">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:37</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>十大大苏打撒盛大打算</div>
                        <div>
                            <a style="display: block" class="comment13" href="javascript::" onclick="showtextarea(13,null)">回复</a>
                        </div>
                        <div class="commentreply13" style="display: none" >
                            <textarea id="reply13" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter13" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(13,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="11">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:29</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>很纠结很久很久很久</div>
                        <div>
                            <a style="display: block" class="comment11" href="javascript::" onclick="showtextarea(11,null)">回复</a>
                        </div>
                        <div class="commentreply11" style="display: none" >
                            <textarea id="reply11" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter11" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(11,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="17">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:26</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>是大多数的方式发送</div>
                        <div>
                            <a style="display: block" class="comment17" href="javascript::" onclick="showtextarea(17,null)">回复</a>
                        </div>
                        <div class="commentreply17" style="display: none" >
                            <textarea id="reply17" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter17" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(17,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="14">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:17</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>拒绝急急急急急急急急急</div>
                        <div>
                            <a style="display: block" class="comment14" href="javascript::" onclick="showtextarea(14,null)">回复</a>
                        </div>
                        <div class="commentreply14" style="display: none" >
                            <textarea id="reply14" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter14" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(14,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="15">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:17</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>啊打啊杀</div>
                        <div>
                            <a style="display: block" class="comment15" href="javascript::" onclick="showtextarea(15,null)">回复</a>
                        </div>
                        <div class="commentreply15" style="display: none" >
                            <textarea id="reply15" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter15" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(15,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="9">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:58</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>春风又绿江南岸，明月何时照我还。</div>
                        <div>
                            <a style="display: block" class="comment9" href="javascript::" onclick="showtextarea(9,null)">回复</a>
                        </div>
                        <div class="commentreply9" style="display: none" >
                            <textarea id="reply9" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter9" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(9,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="7">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:56</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>红豆生南国，春来发几枝。</div>
                        <div>
                            <a style="display: block" class="comment7" href="javascript::" onclick="showtextarea(7,null)">回复</a>
                        </div>
                        <div class="commentreply7" style="display: none" >
                            <textarea id="reply7" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter7" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(7,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="5">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:50</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>孔雀东南非，五里一回鸣。</div>
                        <div>
                            <a style="display: block" class="comment5" href="javascript::" onclick="showtextarea(5,null)">回复</a>
                        </div>
                        <div class="commentreply5" style="display: none" >
                            <textarea id="reply5" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter5" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(5,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="4">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:49</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>孔雀东南非，五里一回鸣。</div>
                        <div>
                            <a style="display: block" class="comment4" href="javascript::" onclick="showtextarea(4,null)">回复</a>
                        </div>
                        <div class="commentreply4" style="display: none" >
                            <textarea id="reply4" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter4" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(4,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="3">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:47</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>儿童放学归来早，忙趁东风放纸鸢。</div>
                        <div>
                            <a style="display: block" class="comment3" href="javascript::" onclick="showtextarea(3,null)">回复</a>
                        </div>
                        <div class="commentreply3" style="display: none" >
                            <textarea id="reply3" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter3" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(3,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="6">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:46</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>孔雀东南非，五里一回鸣。</div>
                        <div>
                            <a style="display: block" class="comment6" href="javascript::" onclick="showtextarea(6,null)">回复</a>
                        </div>
                        <div class="commentreply6" style="display: none" >
                            <textarea id="reply6" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter6" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(6,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="2">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:35</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>日出江花红胜火，春来江水绿如蓝。</div>
                        <div>
                            <a style="display: block" class="comment2" href="javascript::" onclick="showtextarea(2,null)">回复</a>
                        </div>
                        <div class="commentreply2" style="display: none" >
                            <textarea id="reply2" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter2" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(2,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="1">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 08:04:02</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>看天上云卷云舒。</div>
                        <div>
                            <a style="display: block" class="comment1" href="javascript::" onclick="showtextarea(1,null)">回复</a>
                        </div>
                        <div class="commentreply1" style="display: none" >
                            <textarea id="reply1" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter1" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(1,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="8">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:12</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>春风又绿江南岸，明月何时照我还。</div>
                        <div>
                            <a style="display: block" class="comment8" href="javascript::" onclick="showtextarea(8,null)">回复</a>
                        </div>
                        <div class="commentreply8" style="display: none" >
                            <textarea id="reply8" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter8" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(8,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="10">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 09:04:11</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>水水水水水水水水</div>
                        <div>
                            <a style="display: block" class="comment10" href="javascript::" onclick="showtextarea(10,null)">回复</a>
                        </div>
                        <div class="commentreply10" style="display: none" >
                            <textarea id="reply10" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter10" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(10,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                                <ul style="margin-top: 15px" id="18">
                    <li>
                        <label>匿名读者</label>
                        <label>2016-04-21 10:04:08</label>
                    </li>
                    <li><hr/></li>
                    <li>
                        <div>是道具卡号放假啊发</div>
                        <div>
                            <a style="display: block" class="comment18" href="javascript::" onclick="showtextarea(18,null)">回复</a>
                        </div>
                        <div class="commentreply18" style="display: none" >
                            <textarea id="reply18" rows="3" placeholder="回复内容："></textarea>
                            <input type="hidden" id="article_commenter18" value="匿名读者"/>
                            <button  type="button" onclick="insert_reply(18,null)">发表</button>
                        </div>
                    </li>
                                    </ul>
                            </li>
                    </ul>
    </div>

<script type="text/javascript">

</script>
</body>
</html><?php }} ?>