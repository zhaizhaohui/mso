$.fn.extend({
	wum: function(opt){
		var defaults = {
            add:    '',
            del: 	'',
            words: 	'选择图片',
            fname:  'photo[]', 
            size:   1,
            ext:    'jpg|jpeg|bmg|png'
        }
        var opts  = $.extend(defaults, opt); 
        	opts.el = this;
        	opts.list = new Array();
        wumTools.initHtml(opts);
        wumTools.initFileBtn(opts);
            
        wumEvent.uploadEvent(opts);
	}
});
var o = {
    getPath: function() {
        var e = document.scripts,
        t = e[e.length - 1],
        i = t.src;
        if (!t.getAttribute("merge")) return i.substring(0, i.lastIndexOf("/") + 1)
    }()
}
// 上传工具
var wumTools = {
	// 初始化布局
	initHtml:function(opts){
		$('head:first').append('<link rel="stylesheet" href="'+o.getPath+'wum.css">');
		opts.el.html('<div class="wum"><div class="wumBtn"><span class="layui-btn layui-btn-normal">'+opts.words+'</span></div><div class="wuList clear"></div></div>');
	},
	// 初始化选择文件按钮
	initFileBtn:function(opts){
		opts.el.on('click','.wumBtn',function(){
			wumEvent.selectFile(opts);
		});
	},
	// 添加文件到列表
	addList:function(files,opts){
		var fileArray = opts.list;
		for(var i=0;i<files.length;i++){
			// 判断文件是否存在
            if(wumTools.fileIsExit(files[i],opts)){
                alert("文件("+files[i].name+")已经存在！");
                continue;
            }
            // 文件大小显示判断
			if((files[i].size).toFixed(2) >= (opts.size*1024*1024)){
    			alert('图片'+files[i].name+'大小超过限制!请控制在'+opts.size*1024+'Kb以内');continue;
    		}
    		//检测文件格式
            // if(!eval("/.("+opts.ext+")$/").test(wumTools.getFileExt(files[i].name).toLowerCase())){
            //     alert('上传文件类型不支持'+wumTools.getFileExt(files[i].name).toLowerCase());
            //     return false;
            // }
    		var imgSrc = '';
    		if (window.createObjectURL != undefined) {
                imgSrc = window.createObjectURL(files[i]);
            } else if (window.URL != undefined) {
                imgSrc = window.URL.createObjectURL(files[i]);
            } else if (window.webkitURL != undefined) {
                imgSrc = window.webkitURL.createObjectURL(files[i]);
            }
    		$('.wuList').append(wumTools.createPreviewHtml(fileArray.length,imgSrc));
    		fileArray[fileArray.length] = files[i];
		}
		opts.list = fileArray;
	},
	// 动态创建预览html
	createPreviewHtml:function(i,src){
		return '<div class="wuItem" data-item="'+i+'"><div class="wuBox"><img src="'+src+'"/></div><div class="wuBtns"><a href="javascript:;"><i class="layui-icon">&#xe640;</i></a><em>删除</em></div></div>';
	},
	// 删除文件
	deletFile:function(opts){
		opts.el.on('mouseenter mouseleave','.wuItem',function(){
        	$(this).find('.wuBtns').toggle();
        });
        opts.el.on('mouseenter mouseleave','.wuBtns a',function(){
        	$(this).next('em').stop().fadeToggle();
        });
		opts.el.on('click','.wuBtns a',function(){
            var item = $(this).parents('.wuItem'),
                fileListArray = opts.list;
            delete fileListArray[item.attr('data-item')];
            opts.list = wumTools.filterArr(fileListArray);
        	item.remove();
        });
	},
	// 清除选择文件的input
	clearFileBtn:function(){
		$('#wumId').remove();
	},
	// 文件是否已经存在
	fileIsExit:function(file,opts){
		var fileList = opts.list,ishave = false;
        for(var i=0;i<fileList.length;i++){
            //文件名相同，文件大小相同
            if(fileList[i]!=null&&fileList[i].name ==file.name&&fileList[i].size==file.size){
                ishave = true;
            }
        }
        return ishave;
	},
	// 获取文件名后缀
	getFileExt:function(file){
        var pos = file.lastIndexOf(".")+1;
        return file.substring(pos,file.length);
    },
    // 删除数组中的undefined
    filterArr:function(arr){
        var res = [];
        for (var i = 0;i < arr.length;i++) {
            if(typeof(arr[i])!='undefined'){
                res.push(arr[i]);
            }
        }
        return res;
    }
}
// 上传事件
var wumEvent = {
	// 初始选择按钮
	selectFile:function(opts){
		$('.wum').append('<input type="file" multiple="multiple" id="wumId" />');
		$('#wumId').on('change',function(){
			wumEvent.fileChange(this.files,opts);
		});
		$('#wumId').click();
	},
	// 选择文件后对文件的回调事件
	fileChange:function(files,opts){
		wumTools.addList(files,opts);
		wumTools.clearFileBtn();
	},
    // 提交操作
    uploadEvent:function(opts){
        $('#multiForm').on('click','.sub-btn',function(){
            var fileList = opts.list;
            var formData = new FormData();
            console.log(fileList);
            if(fileList.length <= 0){
                layer.alert("请先选择上传文件！");
                return;
            }
            if(opts.otherData!=null&&opts.otherData!=""){
                for(var j=0;j<opts.otherData.length;j++){
                    formData.append(opts.otherData[j].name,opts.otherData[j].value);
                }
            }
            for(var i=0;i<fileList.length;i++){
                if(fileList[i]!=null){
                    formData.append(opts.fname,fileList[i]);
                }
            }
            $.ajax({  
                url: opts.add,
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    console.log(data);
                },
                error:function(e){
                    console.log(e+'error');
                }
            })
        });

    }
}