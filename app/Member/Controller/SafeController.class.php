<?php
/**
 * 安全中心
 */
namespace Member\Controller;
use Common\Controller\BaseController;
class SafeController extends BaseController {
	/**
     * 进程初始化
     */
    function _initialize(){
        parent::_initialize();
    }
    
	/**
	 * 首页
	 */
    public function index(){
		$this->display();
    }
}