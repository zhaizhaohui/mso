<?php
/**
 * 文章管理
 */
namespace Member\Controller;
use Common\Controller\BaseController;
class NewsController extends BaseController {

    /**
     * 进程初始化
     */
    function _initialize(){
        parent::_initialize();
        $this->news = D('News');
    }

    /**
     * 列表
     */
    public function index(){
        $this->page('News',['uid'=>$this->msid],10,'id desc','id,title,is_top,create_time');
        $this->display();
    }

    /**
     * 文章添加
     */
    public function add()
    {
        if(IS_POST){

        }else{
            $this->display();
        }
    }

    /**
     * 文章编辑
     */
    public function edit()
    {
        if(IS_POST){

        }else{
            $info = $this->news->where(['id'=>I('get.id')])->find();
            $this->assign($info);
            $this->display();
        }
    }

    /**
     * 是否推荐
     */
    public function istop(){
        $this->news->where(['id'=>I('post.id')])->setField('is_top',I('post.top')) ? $this->success('修改成功') : $this->error('修改失败');
    }

    /**
     * 删除操作
     */
    public function delete(){
        $id = I('get.id');
        if(!empty($id)){
            $where = is_array($id) ? 'id in('.implode(',',$id).')' : 'id='.$id;
            $res = $this->news->relation(true)->where($where)->delete();
            ($res !== false) ? $this->success("删除成功！") : $this->error("删除失败！");
        }else{
            $this->error("删除数据不存在！");
        }
    }


}