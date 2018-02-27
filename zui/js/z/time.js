function getTime(){
	var D = new Date(),W = ['日','一','二','三','四','五','六'];
	return {
		year: D.getFullYear(),
		month: (D.getMonth()+1)<10 ? '0'+ (D.getMonth()+1) : (D.getMonth()+1),
		day: (D.getDate())<10 ? '0'+ (D.getDate()) : (D.getDate()),
		week: W[D.getDay()]
	}
}
function greetings(hour){
	if(hour < 6){return "凌晨好！";}
	else if (hour < 9){return "早上好！";}
	else if (hour < 12){return "上午好！";}
	else if (hour < 14){return "中午好！";}
	else if (hour < 17){return "下午好！";}
	else if (hour < 19){return "傍晚好！";}
	else if (hour < 22){return "晚上好！";}
	else {return "夜里好！";} 
};
setInterval(
	function getClock(){
		var D = new Date(),
			H = (D.getHours()+1)<10 ? '0'+ (D.getHours()) : (D.getHours()),
			M = (D.getMinutes())<10 ? '0'+ (D.getMinutes()) : (D.getMinutes());
		$('.main-wel strong').html(greetings(D.getHours()));
		$('.main-hour').html(H+':'+M);
},10);
var tm = getTime();
$('.main-year p:first').html('星期'+tm.week);
$('.main-year p:last').find('span').html(tm.year).parent().append('年'+tm.month+'月'+tm.day+'日');