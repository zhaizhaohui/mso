var geocoder,marker,map,markersArray = [],cr = document.getElementById('coord').value;


//如果存在坐标则在地图上显示坐标
if(cr.length > 1){
    var latlngStr = cr.split(",",2);
    var lat = parseFloat(latlngStr[0]);
    var lng = parseFloat(latlngStr[1]);
    var latLng = new qq.maps.LatLng(lat,lng);
    createMap('txmap',latLng);
    addMarker(latLng);
}else{
    createMap('txmap');getIpLocation(map);
}
//点击地图事件
qq.maps.event.addListener(map, 'click', function(event) {
    //移除地图上的标记
    clearOverlays();
    //进行地址解析
    geocoder = new qq.maps.Geocoder({
        complete : function(result){
            //添加地图标记
            marker = addMarker(event.latLng);
            qq.maps.event.addListener(map, 'click', function(event){
                marker.setMap(null);   
            });
        }
    });
    //获取标记地图坐标
    document.getElementById('coord').value = getCorrd(event.latLng,5);
    getAddress(getCorrd(event.latLng,6),'address');
    geocoder.getAddress(event.latLng);
});
//地址解析
document.getElementById('address').onblur = function(){
    //移除地图上的标记
    clearOverlays();
    //调用地址解析类
    geocoder = new qq.maps.Geocoder({
        complete : function(result){
            map.setCenter(result.detail.location);
            addMarker(result.detail.location);
            document.getElementById('coord').value = result.detail.location.lat+','+result.detail.location.lng;
        }
    });
    geocoder.getLocation(this.value);
}


//创建地图
function createMap(el,center){
    center = center || new qq.maps.LatLng(39.916527,116.397128);
    map = new qq.maps.Map(document.getElementById(el),{
        center: center,
        zoom: 15,
        draggableCursor: "crosshair",
        draggingCursor: "pointer"
    });
}

//获取当前城市的坐标地图
function getIpLocation(map){
    citylocation = new qq.maps.CityService({
        complete : function(result){
            map.setCenter(result.detail.latLng);
        }
    });
    citylocation.searchLocalCity();
}


//获取坐标
function getCorrd(lng,n){
	return lng.getLat().toFixed(n)+','+lng.getLng().toFixed(n);
}
//添加标记
function addMarker(position) {
    var marker = new qq.maps.Marker({
        position: position,
        map: map
    });
    markersArray.push(marker);
    return marker;
}
//清除覆盖层
function clearOverlays() {
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
    }
}
//获得坐标地址
function getAddress(lng,el){
    var $ = layui.jquery;
    var data={
        location:lng,
        key:"WFFBZ-ZU334-NVDUV-DAQ3T-OVY7F-NPBRF",
        get_poi:0    
    }
    var url="http://apis.map.qq.com/ws/geocoder/v1/?";
    data.output="jsonp";
    $.ajax({
        type:"get",
        dataType:'jsonp',
        data:data,
        jsonp:"callback",
        jsonpCallback:"QQmap",
        url:url,
        success:function(json){
            document.getElementById(el).value = json.result.address+json.result.address_reference.landmark_l2.title;
        },
        error : function(err){alert("服务端错误，请刷新浏览器后重试")}
    });
}