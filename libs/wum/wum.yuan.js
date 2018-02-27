;(function($){
    var o = {
        getPath: function() {
            var e = document.scripts,
            t = e[e.length - 1],
            i = t.src;
            if (!t.getAttribute("merge")) return i.substring(0, i.lastIndexOf("/") + 1)
        }()
    }
    $.fn.wum = function(options){
    	//默认配置选项
        var defaults = {
            add:    '',
            del: 	'',
            words: 	'选择图片',
            fname:  'photo[]', 
            size:   2,
            ext:    'jpg|jpeg|bmg|png'
        }
        var opts  = $.extend(defaults, options); 
        var _this = this;
        var a = 0;

        // 添加css文件
        $('head:first').append('<link rel="stylesheet" href="'+o.getPath+'wum.css">');

        _this.html('<div class="wum"><div class="wumBtn"><span class="layui-btn layui-btn-normal">'+opts.words+'</span></div><div class="wuList clear"></div></div>');

        
         _this.on('click','span',function(){
            _this.find(':file').click();
        });

        _this.on('mouseenter mouseleave','.wuItem',function(){
        	$(this).find('.wuBtns').toggle();
        });

        _this.on('mouseenter mouseleave','.wuBtns a',function(){
        	$(this).next('em').stop().fadeToggle();
        });

        _this.on('click','.wuBtns a',function(){
        	var url = $(this).parent().prev('.wuBox').find('img').attr('src');
        	$(this).parents('.wuItem').remove();
        });

        _this.on('change',':file',function(){
        	var docObj = $(this)[0];
        	var item = '';
        	var fileList = docObj.files;
        	for (var i = 0 ;i < fileList.length; i++) {
        		if((docObj.files[i].size).toFixed(2) >= (opts.size*1024*1024)){
        			alert('图片'+docObj.files[i].name+'大小超过限制，无法上传');continue;
        		}
                alert(fileList[i].name);
        		_this.find('.wuList').append(createPreviewHtml("img"+a,docObj.files[i].name));
		    	getUrl("img"+a,docObj,i);
		    	a = a+1;
		    }
		    return true;
        });

    	//多图上传预览
		function setImagePreviews(){
			var docObj = document.getElementById("doc");
		    var dd = document.getElementById("dd");
		    dd.innerHTML = "";
		    var fileList = docObj.files;
		    for (var i = 0; i < fileList.length; i++) {
		    	dd.innerHTML += createPreviewHtml("img"+i);
		    	getUrl("img"+i,docObj,i)
		    }
		    return true;
		}


		//获得图片数据
		function getUrl(id,docObj,i){
			var imgObjPreview = document.getElementById(id); 
			if (docObj.files && docObj.files[i]) {
				//imgObjPreview.style.display = 'block';
				imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);
			}else{
				docObj.select();
				checkImg(id);
				imgObjPreview.style.display = 'none';
		    	document.selection.empty();
			}
		}

		//图片异常的捕捉，防止用户修改后缀来伪造图片
		function checkImg(id){
			var imgSrc = document.selection.createRange().text;
			var localImagId = document.getElementById(id);
			try {
		        localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
		        localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
		    }catch (e) {
		        alert("您上传的图片格式不正确，请重新选择!");
		        return false;
		    }
		}

		//动态添加预览html
		function createPreviewHtml(id,name){
			return '<div class="wuItem"><div class="wuBox"><img id="'+id+'" alt="'+name+'"/><input type="file" name="'+opts.fname+'"></div><div class="wuBtns"><a href="javascript:;"><i class="layui-icon">&#xe640;</i></a><em>删除</em></div></div>';
		}
    }
})(jQuery); 