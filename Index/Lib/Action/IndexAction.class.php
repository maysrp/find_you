<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){//
		if($_POST){
			$text=$_POST['text'];
			if($_FILES['img']['name']){
				import('ORG.Net.UploadFile');
				$up=new UploadFile();
				$up->maxSize=15000000;
				$up->allowExts=array('jpg','gif','png','jpeg','bmp');
				$up->savePath="./file/";
				$ty=$up->upload();
				if($ty){
					$info=$up->getUploadFileInfo();
					$img=substr($info[0]['savepath'].$info[0]['savename'],1);
				}
			}
			$rd_ad=D('Site')->create_ip($img,$text);
			$this->success("创建成功!",U('Index/ip?rd_ad='.$rd_ad));
		}else{
			$this->display();
		}
		
    }
    function ip(){//$rd_ad
    	if(!$_GET['rd_ad']){
    		$this->error("啥都没有！");
    		return;
    	}
    	$re=D('Site')->show($_GET['rd_ad']);
    	if($re['status']){
    		//var_dump($re);//tem
    		$di_array=json_decode($re['content']['location'],true);
    		$re['content']['location']=$di_array['content']['address_component']['country'].$di_array['content']['address_component']['province'].$di_array['content']['address_component']['city'].$di_array['content']['address_component']['district'].$di_array['content']['address_component']['street'].$di_array['content']['address_component']['street_number']."邮编".$di_array['content']['address_component']['admin_area_code'];

    		$this->assign('info',$re['content']);
    		$this->display();

    	}else{
    		$this->error($re['content'],U('Index/index'));
    	}
    	return;

    }
    function click(){//$rd
    	if(!$_GET['rd']){
    		$this->error("啥都没有！");
    		return;
    	}
    	$re=D('Site')->find_ip($_GET['rd']);
    	if($re['status']){
    		//var_dump($re);//click
    		$this->assign("info",$re['content']);
    		$this->display();
    	}else{
    		$this->error($re['content'],U('Index/index'));
    	}
    	return;

    }
    
}