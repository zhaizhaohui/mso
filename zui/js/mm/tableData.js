layui.use(['jquery','layer','form'], function(){
    var $ = layui.jquery,
        form = layui.form,
        url = window.location.href,
        action = url.substring(0,url.lastIndexOf("\/")+ 1);
    //是否展示
    form.on('switch(isShow)', function(data){
        var id = data.value;
        if(data.elem.checked == true){
            $.post(action+'istop',{id:id,top:1},function(data) {
                layer.msg(data.info, {time: 1000});
            });
        }else{
            $.post(action+'istop',{id:id,top:0},function(data) {
                layer.msg(data.info, {time: 1000});
            });
        }
    });
    //修改操作
    if($('a.btn-edit').length){
        $('table').on('click','a.btn-edit',function(e){
            location.href = action+'edit/id/'+$(this).attr('data-id');
        });
    }
    //删除操作
    if($('a.btn-del').length) {
        $('table').on('click','a.btn-del',function(e){
            // e.preventDefault();
            var id = $(this).attr('data-id');
            layer.confirm('您确认要删除吗?', {icon: 3, title:'删除提示',btn: ['确认','取消']}, function(){
                $.get(action+'delete' ,{id:id},function(data){
                    if(data.status == 1){
                        layer.msg(data.info, {icon: 1,time: 1000},function(){
                            reloadPage(window);
                        });
                    }else{
                        alert(data);
                        // layer.msg(data.info, {icon: 0,time: 1000});
                    }
                });
            },function(){
                layer.msg('删除取消', {icon: 2,time: 1000});
            });
        });
    }
    //全选
    form.on('checkbox(allChoose)', function(data){
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="switch"])');
        child.each(function(index, item){
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });
    
    //批量删除
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
// 刷新页面
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}
