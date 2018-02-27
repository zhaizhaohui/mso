<?php
/**
 * 网站首页
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * website index
	 * @return index view
	 */
    public function index(){
        $this->display();
    }

    /**
     * 空操作
     */
    public function _empty() {
        $this->error('该页面不存在！');
    }
}