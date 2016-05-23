/**
 * Created by Renjun on 2016/4/13.
 */


var User = {
    user_data:{
        username:'123',
        password:'123',
        method:'get',
        url:'../controller/UploadImageController.php'},
    namedata: [
        'user',
        '123',
        'username',
        'lilei',
        'wangfang',
        'zhao',
        'qian',
        'admin'],
    checkuser:function(){
        var     user = this;
        var username = $('#username').val();

        /**
         * 连接数据库搜索用户名是否已存在
         *
         * 参数  username   用户名
         *      table      数据库表名
         *
         * @type {*|jQuery}
         */
        console.log(username);
        $.ajax({
            method:'post',
            url : '../controller/Usercontroller.php',
            data : 'username='+username+'&act=checkUser',
            dataType : 'text',
            success:function(data){
                if(data == 'false'){
                    document.getElementById('span_username').innerHTML = '*用户名不存在';
                }
                else{
                    document.getElementById('span_username').innerHTML = '';
                }
            }
        });
    },
    login:function(){
        var     user = this;
        var username = $('#username').val();
        var password = $('#password').val();
        user.user_data.username = username;
        user.user_data.password = password;
        user.dorequest('controller/UploadImageController.php');
    },
    dorequest:function(url,str){
        var xmlhttp;
        try{
            xmlhttp = new XMLHttpRequest();
        }catch(e){
            try{
                xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
            }catch(e){
                try{
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }catch(e){
                    alert('您的浏览器不支持ajax');
                }
            }
        }
        xmlhttp.open("POST",url,true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        //var poststr = 'username='+this.user_data.username;
        //xmlhttp.send(poststr);
        //var data = eval ("('" + this.user_data + "')");
        //data = String(data);
        //alert(data);
        xmlhttp.send(str);
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                alert(xmlhttp.responseText);
                $("#commentcontent").prepend(xmlhttp.responseText);
                //document.getElementById('span_username').innerHTML = txt;
            }

        };
    }
};

function insert_reply(comment_id,reply_id){
    var comment_id = comment_id;
    var article_id = $("#article_id").val();
    var replyer     = '匿名读者';
    var bereplyer  = '';
    var reply_content = '';
    if(reply_id == null){
        reply_content = $("#reply"+comment_id).val();
        bereplyer = $("#article_commenter"+comment_id).val();
    }
    else{
        reply_content = $("#reply"+comment_id+"-"+reply_id).val();
        bereplyer  = $("#replyer_"+reply_id).val();
    }
    $.ajax({
        url: 'CommentController.php/insert_reply',
        method:'POST',
        data:{
            'article_id':article_id,
            'comment_id':comment_id,
            'replyer':replyer,
            'bereplyer':bereplyer,
            'reply_content':reply_content,
            'type':'uploadreply'
        },
        datatype:'xml',
        success:function(data){
            $("#comment_reply"+comment_id).append(data);
        }
    });
    if(reply_id == null){
        $(".comment"+comment_id).css('display','block');
        $(".commentreply"+comment_id).css('display','none');
    }
    else{
        $(".reply"+reply_id).css('diplay','block');
        $(".reply"+comment_id+"-"+reply_id).css('display','none');
    }
}


function showtextarea(comment_id,reply_id){
    if(reply_id == ''||reply_id == null){
        $(".comment"+comment_id).css('display','none');
        $(".commentreply"+comment_id).css('display','block');
    }
    else{
        $(".reply"+reply_id).css('diplay','none');
        $(".reply"+comment_id+"-"+reply_id).css('display','block');
    }
}


function show(){
    $("#click").css("display","none");
    $("#comment").css("display","block");
}


function upload(){
    str = $("#textarea").val();
    article_id = $("#article_id").val();
    str = "content="+str+"&article_id="+article_id;
    User.dorequest("CommentController.php",str);
    $("#comment").css("display","none");
    $("#click").css("display","block");
}