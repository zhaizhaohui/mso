layui.use(['jquery','form'], function(){
	form.verify({
	    name: function(value){  
	      if(value.length < 1){  
	        return '名称不能为空';  
	      }  
	    }
	});
});