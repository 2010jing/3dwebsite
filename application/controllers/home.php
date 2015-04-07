<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	     parent::__construct();
	     $this->load->helper('url');
	     $this->load->library('session');
	     $this->load->database();
 	}

	public function index()
	{	
		
		$this->load->model('Home_model');

		$news = $this->Home_model->getTopSixNews();
		$photoshow = $this->Home_model->getTopFivePhotoshow();

		$data['news'] = $news;
		$data['photoshow'] = $photoshow;
		$this->load->view('index',$data);
	}

	public function exhibition1()
	{
		$this->load->model('Home_model');
		$allexhi = $this->Home_model->getEachSixExhibition();
		$data['allexhi'] = $allexhi;
		$this->load->view('h_exhibition1',$data);

	}

	public function exhibition()
	{
		$this->load->model('Home_model');
		$allexhi = $this->Home_model->getEachSixExhibition();
		$data['allexhi'] = $allexhi;
		$this->load->view('h_exhibition',$data);

	}

	public function course($cid='')
	{
		$this->load->model('Home_model');

		if($this->session->userdata('username')){
			$uid = $this->session->userdata('uid');
			$username = $this->session->userdata('username');
			$email = $this->session->userdata('email');
			$avatar = $this->session->userdata('avatar');
			$istake = $this->Home_model->checkIsTakeCourse($cid,$uid);
		}else{
			$uid = "";
			$username ="";
			$email ="";
			$avatar ="";
			$istake = "yes";
		}

		$data['uid'] =$uid;
		$data['username'] =$username;
		$data['email'] =$email;
		$data['avatar'] =$avatar;
		$data['istake'] =$istake;

		if($cid == '' || !is_numeric($cid)){
			$result = $this->Home_model->getLatestCourseId();
			$cid = $result['id'];
		}
		$whos = $this->Home_model->whoInCourse($cid);
		$data['whos'] = $whos;		
		$lcourse = $this->Home_model->getCourseByCourseId($cid);

		$tid='';
		$data['lcourse'] = $lcourse;                    
		foreach ($lcourse as $item) {
            foreach ($item as $key => $value) {
            	if($key == 'teacherid'){
            		$tid = $value;
            	}
            }
        }

        //get teacher
        $teacher = $this->Home_model->getTeacherById($tid);
        $data['teacher'] = $teacher;

		$this->load->view('h_course',$data);
	}

	public function news($nid='')
	{
		$this->load->model('Home_model');

		if($nid == '' || !is_numeric($nid)){
			$result = $this->Home_model->getLatestNewsId();
			$nid = $result['id'];
		}
		$detailnews = $this->Home_model->getNewsById($nid);
        //get teacher
        $data['detailnews'] = $detailnews;

		$this->load->view('h_news',$data);
	}


	//查看谁报名了课程
	public function whoInCourse($cid='',$tid=''){
		$this->load->model('Home_model');

		if($cid == '' || !is_numeric($cid)){
			$result = $this->Home_model->getLatestCourseId();
			$cid = $result['id'];
		}
		$whos = $this->Home_model->whoInCourse($cid);
		$data['whos'] = $whos;
		//get teacher
		if($tid == '' || !is_numeric($tid)){
			$tid = 1;
		}

        $teacher = $this->Home_model->getTeacherById($tid);
        $data['teacher'] = $teacher;

		$this->load->view('whoincourse',$data);	
	}

	public function vote()
	{
		$this->load->model('Home_model');
		$allexhi = $this->Home_model->getAllExhibition();
		$data['allexhi'] = $allexhi;
		$this->load->view('h_vote',$data);
	}

	public function about()
	{
		$this->load->view('h_about');
	}

	public function loadmoreHexhi(){
		$html = "";

		if(isset($_POST['lastmsg']) && is_numeric($_POST['lastmsg'])){
			$lastmsg=$_POST['lastmsg'];
			//$lastmsg=33;
			$this->load->model('Home_model');
			$moreexhi = $this->Home_model->getMoreExhibition($lastmsg);
			$num = count($moreexhi);
			$etitle ='';
            $ecategory ='';
            $eimgname ='';
            $emodlefile ='';
            $epublisher ='';
            $ecreatetime ='';
            $i = 0; 
            $eid='';
            $euid='';
			foreach ($moreexhi as $item) {
				if($i % 3 == 0){
					$html .= "<div class='three column row'>";

				}
				foreach ($item as $key => $value) {
					if($key == 'title'){
						$etitle = $value;
					}elseif($key == 'category'){
						$ecategory = $value;
					}elseif($key == 'imgname'){
						$eimgname = $value;
					}elseif($key == 'publisher'){
						$epublisher = $value;
					}elseif($key == 'createtime'){
						$ecreatetime = $value;
					}elseif($key == 'id'){
						$eid = $value;
					}elseif($key == 'uid'){
						$euid = $value;
					}
				}	
            	$html .= 
                      '<div class="column">
                          <div class="ui segment fluid rounded ">
                          <div class="ui blue ribbon label"><i class="hotel icon"></i> '.$ecategory.'</div>
                          <div class="ui bottom attached label">'.$epublisher .'</div>
                              <img src="'.base_url('public/models/'.$euid.'/'.$ecreatetime.'/'.$eimgname) .'" style="width:295px; height:250px; margin-bottom:20px;">
                          </div>
                      </div>';
               

				$i++;
				if($i % 3 == 0 || $i > $num){
				   $html .= "</div>";
				}
            } 


			if( $num == 6){
				$html .=

				      	'<h2 id="more" class="ui horizontal divider">
	        				
	        				<a  id="'.$eid.'" class="" onclick=loadmore('.$eid.') ><i class="arrow circle down icon"></i>more</a>
	      				</h2>';
			}else { 
				$html .=
			      	'<h2 id="more" class="ui horizontal divider">
        				
        				The end
      				</h2>';			
				
			}
		}

		echo $html;
	}




	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */