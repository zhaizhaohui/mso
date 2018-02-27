//确认删除
if ($('a.ajax-delete').length){
	$('a.ajax-delete').on('click',function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		layer.confirm('您确认要删除吗？',{btn: ['确认','取消']},function(){
			layer.msg('删除成功！', {icon: 1,time:1000},function(){reloadPage(window);});
		},function(){
			layer.msg('取消删除', {icon: 2,time:1000});
		})
	})
}
//重新刷新页面，使用location.reload()有可能导致重新提交
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}
//图片预览
function PreviewImage(imgFile,el){
    var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
    filextension=filextension.toLowerCase();
    if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
    {
        alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
        imgFile.focus();
    }
    else
    {
        var path;
        if(document.all)//IE
        {
            imgFile.select();
            path = document.selection.createRange().text;
            document.getElementById(el).innerHTML="";
            document.getElementById(el).style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果
        }
        else//FF
        {
            path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
            document.getElementById(el).innerHTML = '<img src="'+path+'" alt="log" />';
        }
    }
}

//弹出页面
function open_win(title,x,y,url){
	layer.open({
	  type: 2,
	  title: title,
	  shadeClose: true,
	  shade: 0.8,
	  area: [x, y],
	  content: url
	}); 
}