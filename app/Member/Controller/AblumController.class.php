<?php
/**
 * 相册管理
 */
namespace Member\Controller;
use Common\Controller\BaseController;
class AblumController extends BaseController {
    /**
     * 进程初始化
     */
    function _initialize(){
        parent::_initialize();
        $this->ablist = M('AblumList');
        $this->abphotos = M('AblumPhotos');
        $this->fd = new \Think\File();
    }

    /**
     * 相册列表页
     */
    public function index(){
        $count = $this->ablist->where(['uid'=>$this->msid])->count();
        $p = $this->getPage($count,5);
        $list = $this->ablist->where(['uid'=>$this->msid])->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        foreach ($list as $k => $v) {
            $list[$k]['cover'] = ($v['cover']=='') ? __HOST__.'/zui/img/member/ablum.png' : __HOST__.'/data/imgs/'.$this->msname.'/'.$v['ab_id'].'/'.$v['cover'];
        }
        $this->assign(['list'=>$list,'page'=>$p->show()]);
        $this->display();
    }

    /**
     * 进入相册
     */
    public function manage(){
        $aid = I('get.aid',0,'int');
        $this->page('AblumPhotos',['uid'=>$this->msid,'ab_id'=>$aid],20);
        $this->display();
    }

    /**
     * 相册添加
     */
    public function add()
    {
        if(IS_POST){
            $str = getAbId();
            $arr = ['ab_id'=>$str,'uid'=>$this->msid,'name'=>I('post.name'),'create_time'=>time()];
            $data = $this->ablist->add($arr) ? ($this->fd->makeDir('data/imgs/'.$this->msname.'/'.$str) ? $this->success('创建成功') : $this->error('创建失败')) : $this->error('数据存储失败');
        }else{
            $this->display();
        }
    }

    /**
     * 修改相册
     */
    public function edit()
    {
        $id = I('get.id',0,'int');
        $where = ['ab_id'=>$id,'uid'=>$this->msid];
        if(IS_POST){
            ($this->ablist->where($where)->setField('name',I('post.name')) !== false) ? $this->success('修改成功') : $this->error('修改失败');
        }else{
            $name = $this->ablist->where($where)->getField('name');
            $this->assign('name',$name);
            $this->display();
        }
    }

    /**
     * 删除相册
     */
    public function delete()
    {
        $id = I('get.id',0,'int');
        if($this->ablist->where(['ab_id'=>$id])->delete() !== false){
            $this->abphotos->where(['uid'=>$this->msid,'ab_id'=>$id])->delete();
            $this->fd->delDir('./data/imgs/'.$this->msname.'/'.$id);
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

    /**
     * 删除图片
     */
    public function remove()
    {
        $ids = I('get.ids');
        $ab_id = I('get.abid');
        $count = count($ids);
        if($count > 0){
            // 删除图片
            $this->abphotos->where(['uid'=>$this->msid,'id'=>['in',$ids]])->delete();
            // 相册计数减少
            $this->ablist->where(['ab_id'=>$ab_id,'uid'=>$this->msid])->setDec('photos',$count);
            // 删除图片
            
        }else{
            $data = $this->error('非法操作！');
        }
    }

    /**
     * 移动图片
     */
    public function move()
    {
        $aid = I('get.aid');
        $list = $this->ablist->where(['uid'=>$this->msid,['ab_id'=>['neq',$aid]]])->select();
        $this->assign('list',$list);
        $this->display();
    }
}