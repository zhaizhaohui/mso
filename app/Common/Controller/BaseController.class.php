<?php
/**
 * 店铺控制中心
 */
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller
{
	/**
	 * 进程初始化
	 */
	function _initialize()
    {
	    $this->msid = 1; //session('msid');
        $this->msname = 'xiaoyu';
        $this->days = '-200';
	}

	/**
     * 检测是否登录
     */
    public function is_login()
    {
        if(!session('msid') || empty(session('msid'))){
            $this->redirect('/login');
        }
    }

	/**
     * 空操作
     */
    public function _empty()
    {
        $this->error('该页面不存在！');
    }

    /**
     * 图片上传
     */
    public function upload($file,$savePath,$rootPath,$multi = false)
    {
        $config = [
            'maxSize'    =>    3145728,
            'rootPath'   =>    $rootPath,
            'savePath'   =>    $savePath,
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    false
        ];
        $upload = new \Think\Upload($config);
        $info   =   $upload->upload();
        if(!$info) {
            $data = ['status' => 0, 'info' => $upload->getError()] ;
        }else{
            if($multi == false){
                $data = ['status' => 1, 'name' => $info[$file]['savename'], 'path' => __ROOT__.$config['rootPath'].$config['savePath'].$info[$file]['savename']];
            }else{
                $data = $info;
            }
           
        }
        return $data;
    }
    

    /**
     * 分页操作
     */
    public function page($table, $where = [], $pageSize = 10, $order = '', $field = '*')
    {
        $count = M($table)->where($where)->count();
        $p = $this->getPage($count, $pageSize);
        $list = M($table)->field($field)->where($where)->order($order)->limit($p->firstRow, $p->listRows)->select();
        $this->assign(['list'=>$list,'page'=>$p->show()]);
    }


    /**
     * 分页操作
     */
    public function getPage($count, $pageSize = 10)
    {
        $Page  = new \Think\Page($count,$pageSize);
        $Page -> setConfig('first','首页');
        $Page -> setConfig('last','末页');
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $Page->lastSuffix = false;
        return $Page;
    }

}