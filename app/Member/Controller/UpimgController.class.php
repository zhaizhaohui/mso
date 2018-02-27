<?php
namespace Member\Controller;
use Common\Controller\BaseController;
class UpimgController extends BaseController {
    /**
     * 进程初始化
     */
    function _initialize()
    {
        parent::_initialize();
        $this->ablum = M('AblumList');
    }

    /**
     * 单图上传
     */
    public function index()
    {
        if(IS_POST){
            $ab_id = I('post.ab_id');
            $tmp_name = I('post.photo');
            // 处理数据
            $data = ['ab_id' => $ab_id,'name' => I('post.name'),'uid' => $this->msid,'tmp_name' => $tmp_name,'create_time' => time()];
            if(M('AblumPhotos')->add($data)){
                $file = C('UP_IMG.root').C('UP_IMG.tmp').$tmp_name;
                $save = C('UP_IMG.root').C('UP_IMG.save').$this->msname.'/'.$ab_id.'/'.$tmp_name;
                rename($file,$save);
                $sd = (I('post.isCover') == 1) ? ['photos'=>['exp','photos+1'],'cover'=>$tmp_name] : ['photos'=>['exp','photos+1']];
                M('AblumList')->where(['ab_id'=>$ab_id])->save($sd); 
                $this->success('上传成功');
            }else{
                $this->error('上传失败');
            }
        }else{
            $this->assign('list',$this->getAblumList());
            $this->display();
        }
    }

    /**
     * 多图上传
     */
    public function multi()
    {
    	if(IS_POST){
            $data = $this->upload('photos',C('UP_IMG.tmp'),C('UP_IMG.root'),true);
            foreach ($data as $v) {
                echo $v['savename'];
            }
        }else{
            creatToken();
            $this->assign('list',$this->getAblumList());
            $this->display();
        }
    }

    /**
     * 重命名
     */
    public function batch()
    {
        //防止重复提交 如果重复提交跳转至相关页面
        $ab_id = I('post.ab_id');
        $photo = I('post.photo');
        $cover = I('post.cover');
        $imgs = [];
        if($photo && count($photo) > 0){
            if (!checkToken(I('post.token',''))) {
                $list = session('photolist');
            }else{
                foreach ($photo as $k => $v) {
                    //删除掉旧的photolist
                    session('photolist',null);
                    // 数据处理
                    $data = ['ab_id'=>$ab_id,'name'=>'','uid'=>$this->msid,'tmp_name'=>$v,'create_time'=>time()];
                    if($id = M('AblumPhotos')->add($data)){
                        $file = C('UP_IMG.root').C('UP_IMG.tmp').$v;
                        $save = C('UP_IMG.root').C('UP_IMG.save').$this->msname.'/'.$ab_id.'/'.$v;
                        rename($file,$save);
                        M('AblumList')->where(['ab_id'=>$ab_id])->setInc('photos',1); 
                        $list[$k]['photo'] = __ROOT__.'/'.$save;
                        $list[$k]['tmp_name'] = $v;
                        $list[$k]['id'] = $id;
                        session('photolist',$list);
                    }else{
                        $this->error('图片上传失败');
                    }
                }
            }   
            $this->assign(['list'=>$list,'ab_id'=>$ab_id]);
            $this->display();
        }else{
            $this->error('请先选择上传的图片');
        }
    }


    /**
     * 批量重命名
     */
    public function batchName()
    {
        if(IS_POST){
            $ids = I('post.ids');
            $name = I('post.name');
            $uname = I('post.uname','','trim'); 
            $cover = I('post.cover');
            $ab_id = I('post.ab_id');
            if(!empty($uname)){
                $res = M('AblumPhotos')->where(['id'=>['in',$ids]])->setField('name',$uname);
            }else{
                foreach ($ids as $k => $v) {
                    $res = M('AblumPhotos')->where(['id'=>$v])->setField('name',$name[$k]);
                }
            }
            if(strlen($cover) > 1){
                $this->ablum->where(['ab_id'=>$ab_id])->setField('cover',$cover);
            }
            ($res !== false) ? $this->success('命名成功',U('upimg/multi')) : $this->error('命名失败');
        }
    }


    /**
     * 单张图片异步上传
     */
    public function ajaxUpload()
    {
        $data = $this->upload('photo',C('UP_IMG.tmp'),C('UP_IMG.root'));
        $this->ajaxReturn($data);
    }

    /**
     * 获取相册列表
     */
    public function getAblumList()
    {
        return $this->ablum->where(['uid'=>$this->msid])->select();
    }
}