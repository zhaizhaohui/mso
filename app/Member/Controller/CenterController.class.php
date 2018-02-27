<?php
/**
 * 个人中心
 */
namespace Member\Controller;
use Common\Controller\BaseController;
class CenterController extends BaseController {
	/**
     * 进程初始化
     */
    function _initialize(){
        parent::_initialize();
        $this->about = M('MemberAbout');
        $this->conatact = M('MemberContact');
    }

    /**
     * 基本资料
     */
    public function index()
    {
    	if(IS_POST){

    	}else{
    		$this->display();
    	}
    }

    /**
     * 图片上传
     */
    public function upload()
    {
    	
    }

    /**
     * 关于我们
     */
    public function about()
    {
        if(IS_POST){
            $count = $this->about->where(['mid'=>$this->msid])->count();
            $res = ($count > 0) ? $this->about->where(['mid'=>$this->msid])->save($_POST) : $this->about->add($_POST);
            ($res > 0 ) ? $this->success('更新成功') : $this->error('更新失败');
        }else{
            $info = $this->about->alias('c')
                    ->join('m_member m on c.mid = m.id','RIGHT')
                    ->field('company,content')
                    ->where(['m.id'=>$this->msid])
                    ->find();
            if($info){
                $this->assign($info);
            }
            $this->display();
        }
    }

    /**
     * 联系我们
     */
    public function contact()
    {
        if(IS_POST){
            $count = $this->conatact->where(['mid'=>$this->msid])->count();
            $res = ($count > 0) ? $this->conatact->where(['mid'=>$this->msid])->save($_POST) : $this->conatact->add($_POST);
            ($res > 0 ) ? $this->success('更新成功') : $this->error('更新失败');
        }else{
            $info = $this->conatact->where(['mid'=>$this->msid])->find();
            if($info){
                $this->assign($info);
            }
            $this->display();
        }
    }
}