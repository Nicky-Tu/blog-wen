/**
 * Created by Renjun on 2016/4/28.
 */

/**
 * 文件上传
 */
function uploadFile() {
    var file = document.getElementById('fileToUpload').files[0];
    //if (file) {
    //    var fileSize = 0;
    //
    //    if (file.size > 1024 * 1024)
    //        fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
    //    else
    //        fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
    //
    //    document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
    //    document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
    //}
    var fd = new FormData();
    fd.append("fileToUpload", file);
    $("#showProgress").css('display','block');
    document.getElementById('ProgressNumber1').innerHTML = file.name;
    var xhr = new XMLHttpRequest();
    xhr.upload.addEventListener("progress", uploadProgress, false);
    xhr.addEventListener("load", uploadComplete, false);
    xhr.addEventListener("error", uploadFailed, false);
    xhr.addEventListener("abort", uploadCanceled, false);
    xhr.open("POST", "../controller/ArticleController.php");//修改成自己的接口
    xhr.send(fd);
}
/**
 * 进度条显示
 * @param evt
 */
function uploadProgress(evt) {

    if (evt.lengthComputable) {
        var percentComplete = Math.round(evt.loaded * 100 / evt.total);
        $("#progressNumber").attr({'max':'100',
                                    'value':percentComplete});
    }
    else {
        document.getElementById('progressNumber').innerHTML = 'unable to compute';
    }
}
function uploadComplete(evt) {
    /* 服务器端返回响应时候触发event事件*/
    alert(evt.target.responseText);
}
function uploadFailed(evt) {
    alert("There was an error attempting to upload the file.");
}
function uploadCanceled(evt) {
    alert("The upload has been canceled by the user or the browser dropped the connection.");
}