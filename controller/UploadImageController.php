<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/14
 * Time: 8:51
 */
header('Content-type:text/html;charset=utf-8');

//if($_POST['username']=='user')
//    echo 'username=user';
//else
//    echo 'username=null';

//echo 'login.html';
//$data = $_POST['username'];
//echo $data;
//if(is_object($_POST)){
//    echo '传输数据为对象';
//    anaydata();
//}
//else{
//    echo '无法识别数据格式';
//    var_dump($_POST);
//}
//$var = $_POST['input'];
//$var = eval("("+ $var +")");
//var_dump($var);

//初始化发file变量
$file = null;
foreach($_FILES as $item=>$value){
    $file = $value;
}
//先判断上传的文件是否存在
if(is_array($file)){

    /**
     * 上传的文件名称等可能含有多种不同的编码格式，将中文文件名进行转码显示
     */

    //解析字符串编码格式
    $encode = mb_detect_encoding($file['name'], array("ASCII","UTF-8","GB2312","GBK","BIG5"));
    echo '文件名编码方式：'.$encode.'<br/>';
    //文件名转码为GBK编码格式，文件管理器可正确显示文件名
    $file['name'] = iconv($encode,'GBK',$file['name']);
    echo '转码后的文件名：'.$file['name'].'<br/>';


    //判断文件上传过程中由于服务器限制所发生的错误
    if(isset($file['error'])){
        switch($file['error']){
            case 0 : break;

            case 1:
                // 文件大小超出了服务器的空间大小
                echo '文件大小超出了服务器的空间大小';
                return;

            case 2:
                // 要上传的文件大小超出浏览器限制
                echo '要上传的文件大小超出浏览器限制';
                return;

            case 3:
                // 文件仅部分被上传
                echo '文件仅部分被上传';
                return;

            case 4:
                // 没有找到要上传的文件
                echo '没有找到要上传的文件';
                return;

            case 5:
                // 服务器临时文件夹丢失
                echo '服务器临时文件夹丢失';
                return;

            case 6:
                // 文件写入到临时文件夹出错
                echo '文件写入到临时文件夹出错';
                return;
        }

    }
    //判断文件大小是否大于4M
    echo 'file size:'.($file['size']/1024).'KB<br/>';
    $size = 4*1024*1024;
    if($file['size'] > $size){
        echo '文件超出规定大小，请是您上传的文件大小不超过4M';
        return;
    }

    /**
     * 判断文件类型
     */

    //获取上传文件的副本
    if(@$file['tmp_name']){
        $tempFile = $file['tmp_name'];
        echo '文件副本：'.$tempFile.'<br/>';
        //打开文件副本，获取文件类型信息
        $mime = finfo_open(FILEINFO_MIME);
        $finfo = finfo_file($mime,$tempFile);
        //获取文本类型
        $fileType = explode('/',$finfo)[0];
        echo '文件类型：'.$fileType.'<br/>';
        //切割字符串，获取文件类型后缀
        $type = substr(strrchr($file['name'],'.'),1);
        //将后缀转换为小写
        $type = strtolower($type);
        echo '文件后缀：'.$type.'<br/>';

        /**
         * 设置文件唯一id标识符
         */

        //设置时间戳作为id一部分
        $id = date('ymdhms');
        //重命名文件用户id+原始文件名+时间戳字符串
        $file['name'] = $id.$file['name'];


        /**
         * 设置文件上传保存路径
         */

        //初始化路径变量
        $path = null;
        //获取文件服务目录
        $dir = str_replace(array('controller'),'',__DIR__);
        //输出文件类型信息
        var_dump($finfo);
        switch($fileType){
            //根据文件类型设置存储目录
            case 'image' :
                /**
                 * 创建图片缩略图
                 */
                //获取图片文件副本
                $image = $file['tmp_name'];
                if(is_file($image)){
                    //获取图像的尺寸
                    $size = getimagesize($image);
                    //获取图像的宽度
                    $src_width = $size[0];
                    //获取图像的高度
                    $src_height = $size[1];
                    //设置缩略图的尺寸,将其缩小一倍
                    $des_width = $src_width*0.5;
                    $des_height = $src_height*0.5;
                    //创建一个宽高为des_width,des_height的画布
                    $des = imagecreatetruecolor($des_width,$des_height);
                    //设置画布的颜色
                    $gray = imagecolorallocate($des,192,192,192);
                    //载入原图
                    $createFun = 'ImageCreateFrom' . ($type == 'jpg' ? 'jpeg' : $type);
                    if(!function_exists($createFun)) {
                        return false;
                    }
                    $image = $createFun($image);
                    //填充画布
                    imagefill($des,0,0,$gray);
                    //拷贝图像
                    $result = imagecopyresampled($des,$image,0,0,0,0,$des_width,$des_height,$src_width,$src_height);
                    //判断拷贝结果
                    if(!$result){
                        return;
                    }
                    //将上传的文件副本替换为缩略图
                    switch($type){
                        case 'png' : imagepng($des,$file['tmp_name']);break;
                        case 'jpg' : imagejpeg($des,$file['tmp_name']);break;
                        case 'gif' : imagegif($des,$file['tmp_name']);break;
                    }
                    //销毁缓存图像信息
                    imagedestroy($des);
                    imagedestroy($image);
                }
                else{
                    return;
                }
                $path = $dir.'image';break;
            case 'video' : $path = $dir.'videos';break;
            case 'audio' : $path = $dir.'audios';break;
        }
        //判断文件夹是否存在
        if(!file_exists($path)){
            //存储目录文件夹不存在，创建该文件夹
            mkdir($path);
            //拷贝文件到本地存储空间
            move_uploaded_file($file['tmp_name'],$path.'\\'.$file['name']);
        }
        else{
            move_uploaded_file($file['tmp_name'],$path.'\\'.$file['name']);
        }
    }
}
else{
    //文件不存在则输出变量FILES的值
    echo ' upload file happened unknown error ';
}



