$.fn.extend({
    wum: function(opt){
        var defaults = {
            add:    '',
            del:    '',
            words:  '选择图片',
            fname:  'photo', 
            size:   1,
            ubtn:   '',
            ext:    'jpg|jpeg|bmg|png'
        }
        var opts  = $.extend(defaults, opt); 
            opts.el = this;
            opts.list = new Array();
        wum.initHtml(opts);
        wum.initFileBtn(opts);
        wum.selectFile(opts);
        wum.deletFile(opts);
        wum.wuUpload(opts);
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
var wum = {
    // 初始化布局
    initHtml:function(opts){
        $('head:first').append('<link rel="stylesheet" href="'+o.getPath+'wum.css">');
        opts.el.html('<div class="wum"><div class="wumBtn"><span class="layui-btn layui-btn-normal">'+opts.words+'</span></div><div class="wuList clear"></div><input type="file" multiple="multiple" name="'+opts.fname+'" /></div>');
    },
    // 初始化选择文件按钮
    initFileBtn:function(opts){
        opts.el.on('click','.wumBtn',function(){
            opts.el.find(':file').click();
        });
    },
    // 选择操作
    selectFile:function(opts){
        opts.el.on('change',':file',function(){
            wum.addList(this.files,opts);
        });
    },
    // 添加列表
    addList:function(files,opts){
        var fileArray = opts.list,imgSrc;
        for(var i=0;i<files.length;i++){
            imgSrc = wum.getUrl(files[i]);
            $('.wuList').append(wum.createPreviewHtml(fileArray.length,imgSrc));
            fileArray[fileArray.length] = files[i];
        }
        opts.list = fileArray;
        console.log(opts.list.length);
    },
    // 删除文件
    deletFile:function(opts){
        wum.mouseEvent(opts);
        opts.el.on('click','.wuBtns a',function(){
            var item = $(this).parents('.wuItem'),
                fileListArray = opts.list;
            delete fileListArray[item.attr('data-item')];
            opts.list = wum.filterArr(fileListArray);
            item.remove();
        });
    },
    // 文件上传
    wuUpload:function(opts){
        var Btn;
        if(opts.ubtn == ''){
            Btn = opts.el.parents('form').find('button');
        }else{
            Btn = $(opts.btn);
        }
        Btn.on('click',function(e){
            e.preventDefault();
            console.log(opts.list);
            // for(var i = 0;i<opts.list.length;i++){
            //     opts.el.find(':file').files[i] = opts.list[i];
            // }
            // $('form').submit();
        })
    },
    // 鼠标移入时间
    mouseEvent:function(opts){
        opts.el.on('mouseenter mouseleave','.wuItem',function(){
            $(this).find('.wuBtns').toggle();
        });
        opts.el.on('mouseenter mouseleave','.wuBtns a',function(){
            $(this).next('em').stop().fadeToggle();
        });
    },
    // 动态创建预览html
    createPreviewHtml:function(i,src){
        return '<div class="wuItem" data-item="'+i+'"><div class="wuBox"><img src="'+src+'"/></div><div class="wuBtns"><a href="javascript:;"><i class="layui-icon">&#xe640;</i></a><em>删除</em></div></div>';
    },
    // 获取图片路径
    getUrl:function(file){
        var imgSrc = '';
        if (window.createObjectURL != undefined) {
            imgSrc = window.createObjectURL(file);
        } else if (window.URL != undefined) {
            imgSrc = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) {
            imgSrc = window.webkitURL.createObjectURL(file);
        }
        return imgSrc;
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