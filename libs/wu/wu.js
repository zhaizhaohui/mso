;(function($){
    var o = {
        getPath: function() {
            var e = document.scripts,
            t = e[e.length - 1],
            i = t.src;
            if (!t.getAttribute("merge")) return i.substring(0, i.lastIndexOf("/") + 1)
        }()
    }
    $.fn.webu = function(options){
        //默认配置选项
        var defaults = {
            add:    '',
            fname:  'photo', 
            src:    'add.png',
            size:   2,
            ext:    'jpg|jpeg|bmg|png'
        }
        var opts  = $.extend(defaults, options); 
        var _this = this;

        $('head:first').append('<link rel="stylesheet" href="'+o.getPath+'wu.css">');

        _this.html('<div class="webu"><div class="webuImg"><img src="'+o.getPath+opts.src+'"/></div><input type="file" id="'+opts.fname+'" name="'+opts.fname+'" /></div>');

        var wf = _this.find(':file'),wi = _this.find('img');

        _this.on('click','.webuImg',function(){
            wf.attr('type','file').click();
        });

        _this.on('change',':file',function(){Wupload();});

        function Wupload(){
            //检测上传图片路径是否配置
            if(opts.add==''||opts.add== 'undefined'){
                alert('请指定图片上传路径');
                return false;
            }

            //检测文件格式
            if(!eval("/.("+opts.ext+")$/").test(wf.val().toLowerCase())){
                alert('上传文件类型不支持');
                return false;
            }

            //检测文件大小
            if(((wf[0].files[0].size).toFixed(2)) >= (opts.size*1024*1024)){
                alert('请上传'+opts.size+'M以内的文件！');
                return false;
            }

            wi.attr('src',o.getPath+'load.gif');

            //构建ajax提交数据
            var formData = new FormData();
            formData.append(opts.fname, wf[0].files[0]);
            //ajax异步上传
            $.ajax({
                url: opts.add,
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.status!== 0){
                        wi.attr('src',data.path);wf.attr('type','hidden').val(data.name);
                    }else{
                        alert('ehll');
                        alert(data.info);wi.attr('src',o.getPath+opts.src);
                    }
                },
                error: function () {
                    alert("上传失败！");wi.attr('src',o.getPath+opts.src);
                }
            });
        }
    }
})(jQuery); 














