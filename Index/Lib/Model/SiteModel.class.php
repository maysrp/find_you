<?php
	class SiteModel extends Model{
		function my_ip(){
			return $_SERVER['REMOTE_ADDR'];
		}
		function create_ip($img="xhr.gif",$text="一切尽在不言中!"){
			$my_ip=$this->my_ip();
			$num=mt_rand(1000,9999);
			$time=time();
			$rd=md5($num.$time);//生成链接
			$rd_ad=md5($rd.$num);//创建者
			$img=$img;
			$my_ip_location=$this->location($my_ip);
			$add['rd']=$rd;
			$add['rd_ad']=$rd_ad;
			$add['img']=$img;
			$add['my_ip']=$my_ip;
			$add['time']=$time;
			$add['my_ip_location']=$my_ip_location;
			$add['text']=$text;
			$this->add($add);
			return $rd_ad;

		}
		function location($ip){
			$url=FINDIP;
			$re=file_get_contents($url.$ip);//JSON
			return $re;
		}
		function find_ip($rd){
			$where['rd']=$rd;
			$where['is_click']=0;
			$rez=$this->where($where)->select();
			if($rez){
				$id=$rez['0']['id'];
				$ip=$_SERVER['REMOTE_ADDR'];
				$location=$this->location($ip);

				$save['click_time']=time();
				$save['id']=$id;
				$save['ip']=$ip;
				$save['location']=$location;
				$save['is_click']=1;
				$this->save($save);
				$re['status']=true;
				$re['content']=$rez[0];
			}else{
				$re['status']=false;
				$re['content']="没有任何东西";
			}
			return$re;
		}
		function show($rd_ad){
			$where['rd_ad']=$rd_ad;
			//$where['is_click']=0;
			$rez=$this->where($where)->select();
			if($rez['0']){
				if($rez['0']['is_click']){
					if($rez[0]['is_show']){
						if(time()>($rez[0]['show_time']+300)){
							$re['status']=false;
							$re['content']="没有任何东西";
						}else{
							$re['content']=$rez['0'];
							$re['status']=true;		
						}
					}else{
						$save['id']=$rez[0]['id'];
						$save['is_show']=1;
						$save['show_time']=time();
						$this->save($save);
						$re['content']=$rez['0'];
						$re['status']=true;		
					}
				}else{
					$re['content']=$rez['0'];
					$re['status']=true;		
				}
			}else{
				$re['status']=false;
				$re['content']="没有任何东西";
			}
			return $re;

		}


	}