<?php 
/**
 * 空控制器
 */
namespace Common\Controller;
use Think\Controller;
class EmptyController extends Controller{
	public function index(){
		$this->error('该页面不存在！');
	}
}