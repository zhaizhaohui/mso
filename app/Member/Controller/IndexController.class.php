<?php
/**
 * 商家后台首页
 */
namespace Member\Controller;
use Common\Controller\BaseController;
class IndexController extends BaseController {
	/**
     * 进程初始化
     */
    function _initialize(){
        parent::_initialize();
    }
    
	/**
	 * 后台首页
	 */
    public function index(){
        $member_name = M('Member')->where(['id'=>$this->msid])->getField('usname');
        $menu = M('MemberMenu')->where(['cate_id'=>$this->msid])->select();
        $this->assign(['member_name'=>$member_name,'menu'=>$menu]);
		$this->display();
    }

    /**
     * 数据统计
     */
    public function main()
    {
        $this->fd = new \Think\File();
        $count['disk'] = $this->fd->getDirSize('./data/imgs/'.$this->msname);
        // 统计文章数量
        $count['news'] = M('News')->where(['uid'=>$this->msid])->count();
        // 获取系统消息
        $msgs = M('Msg')->field('id,title')->order('id desc')->limit(3)->select();
        $this->assign(['count'=>$count,'msgs'=>$msgs]);
        $this->display();
    }
}