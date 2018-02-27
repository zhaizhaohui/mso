var baseUrl = window.location.protocol+'//'+window.location.host+'/mso';
layui.use(['jquery','layer','table','form'], function(){
	var $ = layui.jquery,
        form = layui.form,
        table = layui.table,
        url = window.location.href,
        action = url.substring(0,url.lastIndexOf("\/")+ 1);    
	form.on('switch(isShow)', function(data){
		var id = data.value,top;
		top = (data.elem.checked == true) ? 1 : 0;
		$.post(action+'istop',{id:id,top:top},function(data) {
            layer.msg(data.info, {time: 1000});
        });
	});
    form.on('checkbox(allChoose)', function(data){
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="switch"])');
        child.each(function(index, item){
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });
    form.on('submit(ajax-add)',function(data){
        $.post(window.location.href,data.field,function(res){
            if(res.status == 1){
                layer.msg(res.info,{icon: 1,time: 600},function(){window.parent.location.reload();});
            }else{
                layer.msg(res.info,{icon: 0,time: 600});
            }
        }) 
        return false;
    });
    table.on('tool(ajax-del)',function(data){
        alert('hello');
    });
    // 父窗口向子窗口传参
    window.zayer = function(title,url,area,obj){
        obj = obj ? obj : {};
        area = area ? area : ['50%','50%'];
        layer.open({
            type: 2,
            title: title,
            content: url,
            shadeClose: false,
            shade: 0.8,
            area: area,
            success: function(layero,index){
                var body = layer.getChildFrame('body',index);
                var iframeWin = window[layero.find('iframe')[0]['name']];
                $.each(obj,function(k,v){
                    body.find(k).val(v);
                });
            }
        });
    };
    // 子窗口向父窗口传参
    window.cayer = function(el,v){
        $(parent.document).find(el).val(v);
        var index = parent.layer.getFrameIndex(window.name);    
        parent.layer.close(index);
    };
    // 获取选中元素
    window.getIds = function(el,attr){
        var ids = [];
        $(el).each(function(){
            ids.push($(this).attr(attr));
        });
        return ids;
    };
    // 加载ue编辑器
    if($('#content').length){
        $('body').append('<script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.config.js"></script><script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.all.min.js"></script>');
        UE.getEditor('content');
    }
});
