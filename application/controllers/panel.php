<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
    	parent::__construct();
    	$this->load->helper('url');
      	$this->load->library('session');
      	$this->load->database();
  	}
	//manage index
	function index(){
		redirect(base_url('panel/app/exhibition'));
	}

	function app($func='exhibition',$act='',$xid=''){

		if($this->session->userdata('username')){
			$role = $this->session->userdata('role');
			$uid = $this->session->userdata('uid');

			$funclist;
			$data;

			$this->load->model('Panel_model');
			//panel_nav.php numbers 
			$data['exNum'] = $this->Panel_model->getExhibitionNumByUID($role,$uid);
			$data['tcNum'] = $this->Panel_model->getTakecourseNumByUID($role,$uid);
			$data['raNum'] = $this->Panel_model->getRaceNum($role,$uid);
			$data['neNum'] = $this->Panel_model->getNewsNum($role,$uid);
			$data['uid'] = $uid;
			$data['role'] =$role;


			if($func == 'exhibition'){
				// admin can see all exhibition
				$funclist =array('List' => base_url('panel/app/exhibition/list'), 'Publish' => base_url('panel/app/exhibition/publish'));
				if($act == ''){
					$act = 'list';
				}

				$data['act'] = $act;
				$data['func']= $func;
				$data['funclist'] =$funclist;
				$data['subpage'] = 'exhibition';
				$result =  $this->Panel_model->getExhibitionList($role,$uid);
				$data['exhibitionList'] = $result;
				$this->load->view('panel',$data);

			}elseif($func == 'course'){
				$funclist =array('List' => base_url('panel/app/course/list'));
				if($role == 'admin'){
					$funclist['Publish'] =base_url('panel/app/course/publish');
				}
			
				if($act == 'list'){
					$result =  $this->Panel_model->getCourseList($role,$uid);
					$data['courseList'] = $result;

				}elseif($act == 'publish'){
					$lecturers = $this->Panel_model->getAdminInfo();
					$data['lecturers'] = $lecturers;
				}elseif($act == 'edit'){
					$result = $this->Panel_model->getCourseById($xid);
					$data['courseList'] = $result;
					$lecturers = $this->Panel_model->getAdminInfo();
					$data['lecturers'] = $lecturers;
				}

				$data['act'] = $act;
				$data['func']= $func;
				$data['funclist'] =$funclist;
				$data['subpage'] = 'course';


				$this->load->view('panel',$data);

			}elseif($func == 'news'){
				if($this->session->userdata('role') == 'admin'){
					$funclist =array('List' => base_url('panel/app/news/list'));
					if($role == 'admin'){
						$funclist['Publish'] =base_url('panel/app/news/publish');
					}
				
					if($act == 'list'){
						$result =  $this->Panel_model->getNewsList($role,$uid);
						$data['newsList'] = $result;

					}elseif($act == 'publish'){


					}elseif($act == 'edit'){
						$result = $this->Panel_model->getNewsById($xid);
						$data['newsList'] = $result;
					}

					$data['act'] = $act;
					$data['func']= $func;
					$data['funclist'] =$funclist;
					$data['subpage'] = 'news';


					$this->load->view('panel',$data);
				}else{
					redirect('panel');
				}
			}elseif($func == 'race'){
				$funclist =array('Result' => base_url('panel/app/race/list'));

				if($this->session->userdata('role') == 'admin'){
					$funclist['Publish'] =base_url('panel/app/race/publish');
					$funclist['Manage'] =base_url('panel/app/race/manage');
				}
				if($act == 'list'){
					$result =  $this->Panel_model->getRaceResult($role,$uid);
					$data['raceList'] = $result;
				}elseif($act == 'manage'){
					$result =  $this->Panel_model->getRaceList($role);
					$data['raceList'] = $result;
				}elseif($act == 'publish'){

				}elseif($act == 'edit'){
					$result = $this->Panel_model->getRaceById($xid);
					$data['raceList'] = $result;
				}else{
					$act = 'list';
					$result =  $this->Panel_model->getRaceResult($role,$uid);
					$data['raceList'] = $result;

				}

				$data['act'] = $act;
				$data['func']= $func;
				$data['funclist'] =$funclist;
				$data['subpage'] = 'race';
				$this->load->view('panel',$data);

			}elseif($func == 'profile'){
				$funclist =array('Change Password' => base_url('panel/app/profile/updatepass'),"Infomation" =>base_url('panel/app/profile/information'));
				$userInfo = $this->Panel_model->getUserInfo($uid);
				$data['subpage'] = 'userinfo';
				$data['userInfo'] = $userInfo;
				$data['act'] = $act;
				$data['func']= $func;
				$data['funclist'] =$funclist;

				$this->load->view('panel',$data);

			}else{
				redirect(base_url('panel/app/exhibition'));

			}
			// $data['func']= $func;
			// $data['funclist'] =$funclist;
			// $this->load->view('panel',$data);
		}else{
			redirect(base_url());
		}
	}

	//更新用户信息
	function updateUserInfo(){
		if($this->session->userdata('username')){
			$uid = $this->session->userdata('uid');

			$this->load->model('Panel_model');
			$result = $this->Panel_model->updateUserInfo($uid);
			echo $result;

		}
	}

	// Exhibition loadmore
	function loadmoreExhibition(){
		if($this->session->userdata('username')){
			$role = $this->session->userdata('role');
			$uid = $this->session->userdata('uid');
			$html = "";

			if(isset($_POST['lastmsg']) && is_numeric($_POST['lastmsg'])){
				$lastmsg=$_POST['lastmsg'];

				$this->load->model('Panel_model');
				$moreexhi = $this->Panel_model->getMoreExhibition($role,$uid,$lastmsg);
				$num = count($moreexhi);
				$title='';
				$createtime='';
				$imagename='';
				$description='';
				$publisher='';
				$category='';
				$id='';
				$uid='';
	            $i = 0; 
				foreach ($moreexhi as $item) {
					
					foreach ($item as $key => $value) {
						if($key == 'title'){
							$title = $value;
						}elseif($key == 'category'){
							$category = $value;
						}elseif($key == 'imgname'){
							$imgname = $value;
						}elseif($key == 'publisher'){
							$publisher = $value;
						}elseif($key == 'createtime'){
							$createtime = $value;
						}elseif($key == 'id'){
							$id = $value;
						}elseif($key == 'uid'){
							$euid = $value;
						}
					}	


					$html .= 
					'<div class="item">
					    <div class="image">
					      <img src="'.base_url('public/models/'.$euid.'/'.$createtime.'/'.$imgname).'" style="width:175px; height:100px;">    
					    </div>
					    <div class="content">
					      <a class="header">'.$title.'</a>
					      <div class="meta">
					        <span class="cinema">Union Square 14</span>
					      </div>
					      <div class="description">
						  </div>
					      <div class="extra">
					        <div class="ui label">'.$publisher.'</div>
					        <div class="ui label"><i class="globe icon"></i> '.$category.'</div>
					        <div class="ui label">Limited</div>

					        <div class="ui right floated primary button">
					          view
					          <i class="right chevron icon"></i>
					        </div>
					      </div>
					    </div>
					  </div>';
	               

				}  


				if( $num == 5){
					$html .=

					      	'<h2 id="more" class="ui horizontal divider">
		        				
		        				<a  onclick=exhibitionLoadmore('.$id.') ><i class="arrow circle down icon"></i>more</a>
		      				</h2>';
				}else { 
					$html .=
				      	'<h2 id="more" class="ui horizontal divider">
	        				
	        				The end
	      				</h2>';			
					
				}
			

				echo $html;
			}else{
				redirect(base_url());
			}

		}else{
				redirect(base_url());
		}
	}

	// Course loadmore
	function loadmoreCourse(){
		if($this->session->userdata('username')){
			$role = $this->session->userdata('role');
			$uid = $this->session->userdata('uid');
			$html = "";

			if(isset($_POST['lastmsg']) && is_numeric($_POST['lastmsg'])){
				$lastmsg=$_POST['lastmsg'];

				$this->load->model('Panel_model');
				$morecourse = $this->Panel_model->getThreeCourse($role,$uid,$lastmsg);
				$num = count($morecourse);

				if($role == 'admin'){

					foreach ($morecourse as $item) {
						
						foreach ($item as $key => $value) {
				  			if($key == 'id'){
				  				$cid = $value;
				  			}elseif($key == 'name'){
				  				$cname = $value;
				  			}elseif($key == 'time'){
				  				$ctime = $value;
				  			}elseif($key == 'venue'){
				  				$cvenue = $value;
				  			}elseif($key == 'courseimg'){
				  				$courseimg = $value;
				  			}elseif($key == 'createtime'){
								$createtime = $value;
								$t = strtotime($createtime);
								$publishtime = date('Y-m-d',$t);	 	  
							}
				  		}	


						$html .= 
							'<div class="item">
								<div class="image">
							  		<img src="'.base_url('public/course/'.$createtime.'/'.$courseimg).'" >    
								</div>
								<div class="content">
							  		<a class="header">'.$cname.'</a>
								  <div class="meta">
									<!-- <span class="cinema">Union Square 14</span> -->
								  </div>
								  <div class="description">
									<p><b>Time:</b> <br>'.$ctime.'</p>
									<p><b>venue:</b> '.$cvenue.'</p>
									<p><b>Publish Time:</b> '.$publishtime.'</p>
								  </div>
								  <div class="extra">
									<!-- <div class="ui label">IMAX</div>
									<div class="ui label"><i class="globe icon"></i> Additional Languages</div>
									<div class="ui label">Limited</div> -->
									<div class="ui right floated  button">
									  <a href='.base_url('home/course/'.$cid).' target="_balcnk" ">Detail...</a>
										<i class="right chevron icon"></i>

									</div>

								  </div>
							</div>
						  </div>';
		               

					}  


					

				}elseif($role == 'user'){
					foreach ($morecourse as $item) {
						
						foreach ($item as $key => $value) {
				  			if($key == 'courseid'){
				  				$cid = $value;
				  			}elseif($key == 'coursename'){
				  				$cname = $value;
				  			}elseif($key == 'coursetime'){
				  				$ctime = $value;
				  			}elseif($key == 'coursevenue'){
				  				$cvenue = $value;
				  			}elseif($key == 'courseimg'){
				  				$courseimg = $value;
				  			}elseif($key == 'createtime'){
				  				$createtime = $value;
				  				$t = strtotime($createtime);
				  				$createtime = date('Y-m-d',$t);	   
				  			}
				  		}	


						$html .= 
							'<div class="item">
								<div class="image">
							  		<img src="'.base_url('public/image/course/'.$courseimg).'" >    
								</div>
								<div class="content">
							  		<a class="header">'.$cname.'</a>
								  <div class="meta">
									<!-- <span class="cinema">Union Square 14</span> -->
								  </div>
								  <div class="description">
									<p><b>Time:</b> <br>'.$ctime.'</p>
									<p><b>venue:</b> '.$cvenue.'</p>
									<p><b>Publish Time:</b> '.$createtime.'</p>
								  </div>
								  <div class="extra">
									<!-- <div class="ui label">IMAX</div>
									<div class="ui label"><i class="globe icon"></i> Additional Languages</div>
									<div class="ui label">Limited</div> -->
									<div class="ui right floated  button">
									  <a href='.base_url('home/course/'.$cid).' target="_balcnk" ">Detail...</a>
										<i class="right chevron icon"></i>

									</div>

								  </div>
							</div>
						  </div>';
		               

					} 

				}

					if( $num == 3){
						$html .=

						      	'<h2 id="more" class="ui horizontal divider">
			        				
			        				<a  onclick=courseLoadmore('.$cid.') ><i class="arrow circle down icon"></i>more</a>
			      				</h2>';
					}else { 
						$html .=
					      	'<h2 id="more" class="ui horizontal divider">
		        				
		        				The end
		      				</h2>';			
						
					}

				echo $html;
			}else{
				redirect(base_url());
			}

		}else{
				redirect(base_url());
		}
	}

	// news loadmore
	function loadmoreNews(){
		if($this->session->userdata('username')){
			$role = $this->session->userdata('role');
			$uid = $this->session->userdata('uid');
			$html = "";

			if(isset($_POST['lastmsg']) && is_numeric($_POST['lastmsg'])){
				$lastmsg=$_POST['lastmsg'];

				$this->load->model('Panel_model');
				$morenews = $this->Panel_model->getMoreNews($role,$lastmsg);
				$num = count($morenews);

				if($role == 'admin'){
					foreach ($morenews as $item) {
						
						foreach ($item as $key => $value) {
				  			if($key == 'id'){
								$nid = $value;
							}elseif($key == 'title'){
								$ntitle = $value;
							}elseif($key == 'content'){
								$ncontent = $value;
							}elseif($key == 'createtime'){
								$createtime = $value;
								$t = strtotime($createtime);
								$t = date('Y-m-d',$t);	
							}elseif($key == 'newsimg'){
								$newsimg = $value;
							}elseif($key == 'status'){
							  $nstatus = $value;
							  if($nstatus == 0){
							  	$rstxt = "Delete";
							  }elseif($nstatus == 1){
							  	$rstxt = "Enable";
							  }elseif($nstatus == 2){
							  	$rstxt = "Disable";
							  }
							}
				  		}	


						$html .= 
										'<div class="item">
				
				<div class="content">
					<a class="header">'.$ntitle.'</a>
					<div class="meta">
					</div>
					<div class="description">
						<p><b>Publish Time:</b> '. $t .'</p>
						<p id="'.$nid.'">Status: '. $rstxt .' </p>
					</div>
					<div class="extra">

					</div>

					<div class="ui buttons">
					  	<a href="' .base_url('panel/app/news/edit/'.$nid).' " class="ui primary button">Edit</a>
					  	<div class="or"></div>
					  	<div class="ui positive button" onclick="enableThisNews('.$nid.')">Enable</div>
					  	<div class="or"></div>
					  	<div class="ui teal button" onclick="disableThisNews('.$nid.')">Disable</div>
						<div class="or"></div>
					  	<div class="ui red button" onclick="deleteThisNews('.$nid.')">Delete</div>
					  	<div class="or"></div>
					  	<a href="'.base_url('home/news/'.$nid).'" class="ui orange button" target="_blank">View</a>

					</div>
				</div>
				
			</div>' ;
					}  

					if( $num == 5){
						$html .=
						      	'<h2 id="more" class="ui horizontal divider">
			        				<a  onclick=courseLoadmore('.$nid.') ><i class="arrow circle down icon"></i>more</a>
			      				</h2>';
					}else { 
						$html .=
					      	'<h2 id="more" class="ui horizontal divider">
		        				The end
		      				</h2>';			
						
					}
					echo $html;
				}else{
					redirect(base_url());
				}
			}
		}
	}



	//load more race result
	function loadmoreRaceresult(){
		if($this->session->userdata('username')){
			$role = $this->session->userdata('role');
			$uid = $this->session->userdata('uid');
			$html = "";

			if(isset($_POST['lastmsg']) && is_numeric($_POST['lastmsg'])){
				$lastmsg=$_POST['lastmsg'];

				$this->load->model('Panel_model');
				$moreraceresult = $this->Panel_model->getMoreRaceResult($role,$uid,$lastmsg);
				$num = count($moreraceresult);

				if($role == 'admin'){

					foreach ($moreraceresult as $item) {
						foreach ($item as $key => $value) {
				  			if($key == 'gname'){
					          $gname = $value;
					        }elseif($key == 'nterm'){
					          $gnterm = $value;
					        }elseif($key == 'uid'){
					          $guid = $value;
					        }elseif($key == 'username'){
					          $gusername = $value;
					        }elseif($key == 'avatar'){
					          $gavatar = $value;
					        }elseif($key == 'workid'){
					          $gworkid = $value;
					        }elseif($key == 'workname'){
					          $gworkname = $value;
					        }elseif($key == 'workimg'){
					          $gworkimg = $value;
					          $t = explode('.',$gworkimg);
					          $gcreatetime = $t[0];
					        }elseif($key == 'isvoted'){
					          $gisvoted = $value;
					        }elseif($key == 'rank'){
					          $grank = $value;
					        }elseif($key == 'id'){
					          $gid = $value;
					        }
						}	


						$html .= 
							'<div class="item">
							    <div class="image"> 
							      <img src="'.base_url('public/models/'.$guid.'/'.$gcreatetime.'/'.$gworkimg).'" >    
							    </div>
							    <div class="content">
							      <a class="header">'.$gname.'</a>
							      <div class="meta">
							        <span class="cinema"></span>
							      </div>
							      <div class="description">
							        <p> <b>TITLE :</b>    '.$gworkname.' </p>
							        <p> <b>AUTHOR :</b>    
							            <a class="ui image label" style="margin-bottom:5px">
							             <img class="ui avatar circle image" src="'.base_url('public/images/avatar/'.$gavatar).'">
							         admin        </a>
							        </p>
							        <p> <b>VOTED :</b> <i class=" red heart icon"></i>   '.$gisvoted.'  </p>
							        <p> <b>RANK :</b>    '.$grank .'  </p>
							      </div>
							      <div class="extra">
							        <!-- <div class="ui label">IMAX</div>
							        <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
							        <div class="ui label">Limited</div> -->

							        <div class="ui right floated primary button">
							          View
							          <i class="right chevron icon"></i>
							        </div>
							      </div>
							    </div>
							  </div>';
		               

					}  
				}elseif($role == 'user'){
					foreach ($moreraceresult as $item) {
						foreach ($item as $key => $value) {
				  			if($key == 'gname'){
					          $gname = $value;
					        }elseif($key == 'nterm'){
					          $gnterm = $value;
					        }elseif($key == 'uid'){
					          $guid = $value;
					        }elseif($key == 'username'){
					          $gusername = $value;
					        }elseif($key == 'avatar'){
					          $gavatar = $value;
					        }elseif($key == 'workid'){
					          $gworkid = $value;
					        }elseif($key == 'workname'){
					          $gworkname = $value;
					        }elseif($key == 'workimg'){
					          $gworkimg = $value;
					          $t = explode('.',$gworkimg);
					          $gcreatetime = $t[0];
					        }elseif($key == 'isvoted'){
					          $gisvoted = $value;
					        }elseif($key == 'rank'){
					          $grank = $value;
					        }elseif($key == 'id'){
					          $gid = $value;
					        }
						}		


						$html .= 
							'<div class="item">
							    <div class="image"> 
							      <img src="'.base_url('public/models/'.$guid.'/'.$gcreatetime.'/'.$gworkimg).'" >    
							    </div>
							    <div class="content">
							      <a class="header">'.$gname.'</a>
							      <div class="meta">
							        <span class="cinema"></span>
							      </div>
							      <div class="description">
							        <p> <b>TITLE :</b>    '.$gworkname.' </p>
							       
							        <p> <b>VOTED :</b> <i class=" red heart icon"></i>   '.$gisvoted.'  </p>
							        <p> <b>RANK :</b>    '.$grank .'  </p>
							      </div>
							      <div class="extra">
							        <!-- <div class="ui label">IMAX</div>
							        <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
							        <div class="ui label">Limited</div> -->

							        <div class="ui right floated primary button">
							          View
							          <i class="right chevron icon"></i>
							        </div>
							      </div>
							    </div>
							  </div>';
		               

					} 

				}

					if( $num == 3){
						$html .=

						      	'<h2 id="more" class="ui horizontal divider">
			        				
			        				<a  onclick=reaceresultLoadmore('.$gid.') ><i class="arrow circle down icon"></i>more</a>
			      				</h2>';
					}else { 
						$html .=
					      	'<h2 id="more" class="ui horizontal divider">
		        				
		        				The end
		      				</h2>';			
						
					}

				echo $html;
			}else{
				redirect(base_url());
			}

		}else{
				redirect(base_url());
		}	}


	//校验 密码 是否正确
	function validatePass(){
		if($this->session->userdata('username')){
			$uid = $this->session->userdata('uid');
			if(isset($_POST['opass'])){
				$this->load->model('Panel_model');
				$result = $this->Panel_model->validatePass($_POST['opass'],$uid);	
				echo $result;		
			}
			
		}

	}

	//更改密码
	function changePassword(){
		if($this->session->userdata('username')){
			$uid = $this->session->userdata('uid');
			if(isset($_POST['password'])){
				$this->load->model('Panel_model');

				$pass = $_POST['password'];
				$result = $this->Panel_model->changePassword($pass,$uid);

				if($result == 1){
					redirect(base_url('panel/app/profile/information'));
				}else{
					//更新失败
				}	
			}

		}
	}

	// 发布作品
	function publishWork(){
		if($this->session->userdata('username')){
			if($_POST){
				$uid = $this->session->userdata('uid');
				$username = $this->session->userdata('username');
				$this->load->model('Panel_model');
        		$createtime = date('YmdHis',time());
				$isok = $this->uploadWorkFile($uid,$createtime);
				if($isok){
					$result = $this->Panel_model->publishWork($uid,$username,$createtime);
					if($result == 1 ){
						redirect(base_url('panel/app/exhibition/list'));
					}
				}else{
					//上传失败 不录入数据库
				}
			}

		}
		redirect(base_url());
	
	}

	// 上传3D 文件 图片
	function uploadWorkFile($uid,$createtime){
		$path = getcwd().'/public/models/'.$uid.'/'.$createtime; //上传模板目录
		if (!file_exists($path)) {
        	mkdir($path,0777,true);
    	}
    	$filename = $createtime;
    	$config['upload_path'] = $path;
      	$config['allowed_types'] = '*';
      	$config['file_name'] = $filename;
      	$config['max_size'] = '5000';
      	$config['max_width']  = '1024';
      	$config['max_height']  = '768';
      	$this->load->library('upload', $config);

      	if( !$this->upload->do_upload('coverfile')){
            //echo "Imange Cover Upload Failed";
        	$error1=1;
      	}else{
            //echo "Imange Cover Upload Successfully";
        	$error1=0;
      	}

      	if( !$this->upload->do_upload('modelfile')){
            //echo "Model  Upload Failed";
        	$error2=1;
      	}else{
            //echo "Model  Upload Successfully";
        	$error2=0;
      	}

      	if($error1 == 0 && $error2 == 0){
      		$this->renameFiles($path);
      		return true;
      	}else{
      		return false;
      	}
	}

	// 发布COURSE
	function publishCourse(){
		if($this->session->userdata('role') == 'admin'){
			if($_POST){
				$uid = $this->session->userdata('uid');
				$username = $this->session->userdata('username');
				$this->load->model('Panel_model');
        		$createtime = date('YmdHis',time());
        		$nterm = $this->Panel_model->getCourseNum() +1;
				$isok = $this->uploadCourseFile($createtime);
				//echo $isok;
				if($isok){

					$result = $this->Panel_model->publishCourse($nterm,$username,$createtime);
					if($result == 1 ){
						redirect(base_url('panel/app/course/list'));
					}
				}else{
					//上传失败 不录入数据库
				}
			}

		}
		redirect(base_url());
	}

	function publishNews(){
		if($this->session->userdata('role') == 'admin'){
			if($_POST){
				$uid = $this->session->userdata('uid');
				$username = $this->session->userdata('username');
				$this->load->model('Panel_model');
        		$createtime = date('YmdHis',time());
				$isok = $this->uploadNewsFile($createtime);
				//echo $isok;
				if($isok){

					$result = $this->Panel_model->publishNews($username,$createtime);
					if($result == 1 ){
						redirect(base_url('panel/app/news/list'));
					}
				}else{
					//上传失败 不录入数据库
				}
			}

		}
		redirect(base_url());
	}
	// 发布Race
	function publishRace(){
		if($this->session->userdata('role') == 'admin'){
			if($_POST){
				$uid = $this->session->userdata('uid');
				$username = $this->session->userdata('username');
				$this->load->model('Panel_model');
        		$createtime = date('YmdHis',time());
        		$nterm = $this->Panel_model->getRaceNum() +1;
				
				$result = $this->Panel_model->publishRace($nterm,$username,$createtime);
				redirect(base_url('panel/app/race/list'));
			}

		}
		redirect(base_url());
	}

	function uploadNewsFile($createtime){
		$path = getcwd().'/public/news/'.$createtime; //上传模板目录
		if (!file_exists($path)) {
        	mkdir($path,0777,true);
    	}
    	//echo $path;
    	$filename = $createtime;
    	$config['upload_path'] = $path;
      	$config['allowed_types'] = 'jpg';
      	$config['file_name'] = $filename;
      	$config['max_size'] = '5000';
      	$config['max_width']  = '1024';
      	$config['max_height']  = '768';
      	$this->load->library('upload', $config);
      	$deletefile = $path.'/'.$createtime.'.jpg';


		if(file_exists($deletefile)){
			 unlink($deletefile);
		}

      	if( !$this->upload->do_upload('newsimg')){
            //echo "Imange Cover Upload Failed";
        	$error1=1;
      	}else{
            //echo "Imange Cover Upload Successfully";
        	$error1=0;
      	}

      	if($error1 == 0){
      		$this->renameFiles($path);
      		return true;
      	}else{
      		return false;
      	}
	}

	function uploadCourseFile($createtime){
		$path = getcwd().'/public/course/'.$createtime; //上传模板目录
		if (!file_exists($path)) {
        	mkdir($path,0777,true);
    	}
    	//echo $path;
    	$filename = $createtime;
    	$config['upload_path'] = $path;
      	$config['allowed_types'] = 'jpg';
      	$config['file_name'] = $filename;
      	$config['max_size'] = '5000';
      	$config['max_width']  = '1024';
      	$config['max_height']  = '768';
      	$this->load->library('upload', $config);
      	$deletefile = $path.'/'.$createtime.'.jpg';


		if(file_exists($deletefile)){
			 unlink($deletefile);
		}

      	if( !$this->upload->do_upload('courseimg')){
            //echo "Imange Cover Upload Failed";
        	$error1=1;
      	}else{
            //echo "Imange Cover Upload Successfully";
        	$error1=0;
      	}

      	if($error1 == 0){
      		$this->renameFiles($path);
      		return true;
      	}else{
      		return false;
      	}
	}



	// rename file
	function renameFiles($destination){
		$files = scandir($destination);
		foreach ($files as $file) {
			$file_parts = pathinfo($file);
			$a = $destination.'/'.$file;
			$b = $destination.'/'.strtolower($file);
			if(strtolower($file_parts['extension']) == 'obj' || strtolower($file_parts['extension']) == 'stl' ||strtolower($file_parts['extension']) == 'jpg' ||strtolower($file_parts['extension']) == 'png'){
				rename($a,$b);
			}
		}
	}

	//学生参加课程
	function takeThisCourse(){
		if($this->session->userdata('username')){
			if($_POST){
				$this->load->model('Panel_model');
				$result = $this->Panel_model->takeThisCourse();
			}
		}

		redirect(base_url('home/course/'.$_POST['courseid']));
	}

	//更改 race status
	function changeRaceStatus($t){
		if($this->session->userdata('role') == 'admin'){
			$this->load->model('Panel_model');
			$result = $this->Panel_model->changeRaceStatus();
			echo $result;
		}
	}

	//更改 race status
	function changeCourseStatus($t){
		if($this->session->userdata('role') == 'admin'){
			$this->load->model('Panel_model');
			$result = $this->Panel_model->changeCourseStatus();
			echo $result;
		}
	}

	function changeNewsStatus($t){
		if($this->session->userdata('role') == 'admin'){
			$this->load->model('Panel_model');
			$result = $this->Panel_model->changeNewsStatus();
			echo $result;
		}
	}
	//update race by id 
	function updateRaceById(){
		if($this->session->userdata('role') == 'admin'){
			if($_POST){
				$this->load->model('Panel_model');
				$result = $this->Panel_model->updateRaceById();
				//return $result;
			}
			redirect('panel/app/race/manage');

		}
		redirect('panel/app/race/list');
	}


	//update race by id 
	function updateCourseById(){
		if($this->session->userdata('role') == 'admin'){
			if($_POST){

				$this->load->model('Panel_model');

				$isok = $this->uploadCourseFile($_POST['createtime']);
				//echo $isok;
				if($isok){

					$result = $this->Panel_model->updateCourseById();
					
				}
				//return $result;
			}
			redirect('panel/app/course/list');

		}
		redirect('panel/app/course/list');
	}

}	