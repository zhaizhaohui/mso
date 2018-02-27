layui.use(['jquery','layer'],function(){
	var $ = layui.jquery;
	$('.ablum-list').on('mouseenter','dt',function(){
		$(this).find('p').stop().show();
	}).on('mouseleave','dt',function(){
		$(this).find('p').stop().hide();
	});
	$('.ablum-add').click(function(){
		layer.open({
		  type: 2,
		  title: '添加相册',
		  shadeClose: false,
		  shade: 0.8,
		  area: ['400px','200px'],
		  content: GV.ROOT+'/member/ablum/add'
		});
	});


	    if($('.ablum-add').length){
        $('html').on('click','.ablum-add',function(e){
            e.preventDefault();
            zayer('添加相册',$(this).attr('href'),'400px','200px');
        });
    }
    if($('a.btn-edit').length){
        $('table').on('click','a.btn-edit',function(e){
            location.href = action+'edit/id/'+$(this).attr('data-id');
        });
    }
    if($('#content').length){
        $('body').append('<script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.config.js"></script><script charset="utf-8" src="'+baseUrl+'/libs/ueditor/ueditor.all.min.js"></script>');
        UE.getEditor('content');
    }
    
    if($('.ablum-list').length){
        $('html').on('mouseenter','.ablum-list dt',function(){
            $(this).find('p').stop().show();
        }).on('mouseleave','dt',function(){
            $(this).find('p').stop().hide();
        });
    }
    if($('a.btn-del').length) {
        $('table').on('click','a.btn-del',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            layer.confirm('您确认要删除吗?', {icon: 3, title:'删除提示',btn: ['确认','取消']}, function(){
                $.get(action+'delete' ,{id:id},function(data){
                    if(data.status == 1){
                        layer.msg(data.info, {icon: 1,time: 1000},function(){
                            reloadPage(window);
                        });
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
            var checkbox = $('.data-list tbody input[type="checkbox"][name="ids"]'),
                checked = $('.data-list tbody input[type="checkbox"][name="ids"]:checked');
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
});