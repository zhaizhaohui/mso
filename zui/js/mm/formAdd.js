var baseUrl = window.location.protocol+'//'+window.location.host+'/mso';
layui.use(['jquery','form','layer'], function(){
	var $ = layui.jquery,
		form = layui.form;
	if($('#content').length){
		$('body').append('<script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.config.js"></script><script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.all.min.js"></script>');
		UE.getEditor('content');
	}
    $('form').on('click','.btn-add',function(e){
    	e.preventDefault();
    	var formParam = $('form').serialize(),
    		url = $('form').attr('action'),
    		ac = url.substring(0,url.lastIndexOf("\/")+ 1);
    	form.on('submit(formAdd)', function(data){
    		$.ajax({
	    		type: 'post',   
			    url: url, 
			    data: formParam, 
			    cache: false, 
			    dataType: 'json', 
			    success: function(data) {
		    		if(data.status == 1){
		    			layer.confirm(data.info, 
		    				{btn: ['继续添加','完成']},
		    				function(){location.href = ac+'add';},
		    				function(){location.href = ac+'index';}
		    			);
		    		}else{
		                layer.msg(data.info, {icon: 0,time: 1000});
		            }
			    }
	    	});
    	});
    });
    form.verify({
		title: function(value){  
          if(value.length < 2){  
            return '标题不得少于2个字符';  
          }  
        },
        content: function(value){
        	if(value.length < 1){  
            	return '内容不能为空';  
          	}  
        }
	});
});


if($('a.btn-edit').length){
        $('table').on('click','a.btn-edit',function(e){
            location.href = action+'edit/id/'+$(this).attr('data-id');
        });
    }
    if($('#content').length){
        $('body').append('<script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.config.js"></script><script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.all.min.js"></script>');
        UE.getEditor('content');
    }
    if($('a.btn-del').length) {
        $('html').on('click','a.btn-del',function(e){
            e.preventDefault();
            var url = $(this).attr('data-url');
            layer.confirm('您确认要删除吗?', {icon: 3, title:'删除提示',btn: ['确认','取消']}, function(){
                $.get(url,function(data){
                    if(data.status == 1){
                        layer.msg(data.info, {icon: 1,time: 1000},function(){reloadPage(window);});
                    }else{
                        layer.msg(data.info, {icon: 0,time: 1000});
                    }
                });
            },function(){
                layer.msg('删除取消', {icon: 2,time: 1000});
            });
        });
    }
    if($('.batchDel').length) {
        $(".batchDel").click(function(){
            var checkbox = $(':checkbox[name="ids"]'),checked = $(':checkbox[name="ids"]:checked');
            if(checkbox.is(":checked")){
                layer.confirm('确定删除选中项？',{icon:3, title:'提示信息'},function(index){
                    var ids = [];
                    for (var i = 0; i < checked.length; i++) {
                        ids.push(checked[i].value);
                    };
                     $.get(action+'delete',{id:ids},function(data){
                        if(data.status == 1){
                            layer.msg(data.info, {icon: 1,time: 1000},function(){
                                reloadPage(window);
                            });
                        }else{
                            layer.msg(data.info, {icon: 0,time: 1000});
                        }
                    });
                });
            }else{
                layer.msg('请先选择删除项');
            }
        });
    }


    function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}


$('.btn-del').on('click',function(){
			var ids = getIds();
			if(ids.length > 0){
				$.get("{:U('member/ablum/del')}",{ids:ids},function(data){
					layer.alert(data);
				});
			}else{
				layer.alert('请先选择需要操作的图片');
			}
		});