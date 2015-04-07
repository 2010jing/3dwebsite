<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
      	$this->load->library('session');
    }


    //登录
	function signin(){
		if($_POST){
			$this->load->model('User_model');
			$result = $this->User_model->getUser();
			if($result == null){
				redirect(base_url(),'reload');
			}else{
					$this->session->set_userdata('username',$result->name);
					$this->session->set_userdata('uid',$result->id);
					$this->session->set_userdata('email',$result->email);
					$this->session->set_userdata('avatar',$result->avatar);
					$this->session->set_userdata('role',$result->role);
					redirect(base_url('panel'),'reload');
			}
		}else{
			redirect(base_url(),'reload');
		}
	}

	//登出
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url(),'reload');
	}

	//注册
	function signup(){
    	if($this->session->userdata('username')){
    		redirect(base_url(),'reload');
    	}else{
    		if($_POST){
				$this->load->model('User_model');
	    		$result = $this->User_model->checkValidRegister();
	    		if(empty($result)){
	    			$result = $this->User_model->registerUser(); //插入返回结果 true or false

	    			if($result){
	    				echo "insert ok";
	    				$name = trim($_POST['name']);
						$studentid = trim($_POST['studentid']);
						$uicemail = $studentid."@mail.uic.edu.hk";
						$email = trim($_POST['email']);
						$str = $name.$studentid.$email;
						$token = $this->encode_text($str,"3dwebinuic","encode",1800);
			        	$time = date('Y/m/d H:i:s',time());

						$link=base_url()."auth/activeUser/".$studentid."/".$token; 
						$subject = "ACTIVE ACCOUNT -- 3D website !".$time;
						$message = "<h3>Welcome ".$name.",</h3><h4>   <br> Please click below link to active your account:<br><a  target='_blank' href='".$link."'>".$link."</a><br> @hj!";
				    	$type = "active";
			            $this->sendEmail($uicemail,$subject,$message,$type); 
			            $this->sendEmail('sthforuic@163.com',$subject,$message,'hello');
	    			}else{
	    				echo "insert failed";
	    			}

	    		}else{
	    			echo "exits";
	    		}
	    	}
		}
    }

  	//发送邮件 -- 适合于非SAE
    function sendEmail($email,$subject,$message,$type){
  		//加载CI的email类  
  		$this->load->library('email'); 
	    //以下设置Email参数  
		$config['protocol'] = 'smtp';  
		$config['smtp_host'] = 'smtp.sina.cn';  
		$config['smtp_user'] = 'sthforuic';  
		$config['smtp_pass'] = 'dosthforuic';  
		$config['smtp_port'] = '25';  
		$config['charset'] = 'utf-8';  
		$config['wordwrap'] = TRUE;  
		$config['mailtype'] = 'html';  
		$this->email->initialize($config);  
		         
	    //以下设置Email内容  
		$this->email->from('sthforuic@sina.cn', 'sthforuic');  
		$this->email->to($email);  
		$this->email->subject($subject);  
		$this->email->message($message);  
	    //$this->email->attach('public/images/bg/background.jpg');//相对于index.php的路径  
		$this->email->send();  
		//echo $this->email->print_debugger();        //返回包含邮件内容的字符串，包括EMAIL头和EMAIL正文。用于调试。
		
		if($type == "active"){
			echo "<script>alert('Active link has been send to your UIC student email!');window.location='http://webmail.uic.edu.hk/extmail/cgi/index.cgi';</script>";
			//redirect('http://webmail.uic.edu.hk/extmail/cgi/index.cgi');
		}elseif ($type == "forgetpwd") {
			redirect(base_url('auth/forgetPassword'),'reload');
		}
  	}

	//注册后激活用户
	function activeUser($studentid,$token){
		$this->load->model('User_model');
	    $result = $this->User_model->getUserByStudentid($studentid);
	    if(empty($result)){
	    	//redirect(base_url(),'reload');
	    }else{
	    	$studentid = $result->studentid;
	    	$name = $result->name;
	    	$email = $result->email;
	    	$str = $name.$studentid.$email;
			$_str = $this->encode_text($token,"3dwebinuic","decode",1800);
			if($str == $_str){
				$this->updateUserStatus($studentid);
			}else{
	    		$this->deleteUserNotActiveBySid($studentid);
	    		echo "<script>alert('The activation time is over! Register again.');</script>";

			}
	    }
	    redirect(base_url(),'reload');
	}

  	//加密字符串
	private function encode_text($tex,$key,$type="encode",$expiry=0){
    	$chrArr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
                  'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                  '0','1','2','3','4','5','6','7','8','9');
    	if($type=="decode"){
        	if(strlen($tex)<14)return false;
       	 	$verity_str=substr($tex, 0,8);
        	$tex=substr($tex, 8);
        	if($verity_str!=substr(md5($tex),0,8)){
            	return false;
        	}    
    	}
    	$key_b=$type=="decode"?substr($tex,0,6):$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62];
    	$rand_key=$key_b.$key;    
    	$modnum=0;$modCount=0;$modCountStr="";
    	if($expiry>0){
        	if($type=="decode"){
            	$modCountStr=substr($tex,6,1);
            	$modCount=$modCountStr=="a"?10:floor($modCountStr);
            	$modnum=substr($tex,7,$modCount);
            	$rand_key=$rand_key.(floor((time()-$modnum)/$expiry));
        	}else{
            	$modnum=time()%$expiry;
            	$modCount=strlen($modnum);
            	$modCountStr=$modCount==10?"a":$modCount;
            	$rand_key=$rand_key.(floor(time()/$expiry));            
        	}
        	$tex=$type=="decode"?base64_decode(substr($tex, (7+$modCount))):"xugui".$tex;
    	}else{
        	$tex=$type=="decode"?base64_decode(substr($tex, 6)):"xugui".$tex;
    	}
    	$rand_key=md5($rand_key);
    	$texlen=strlen($tex);
    	$reslutstr="";
    	for($i=0;$i<$texlen;$i++){
        	$reslutstr.=$tex{$i}^$rand_key{$i%32};
    	}
    	if($type!="decode"){
        	$reslutstr=trim(base64_encode($reslutstr),"==");
        	$reslutstr=$modCount?$modCountStr.$modnum.$reslutstr:$reslutstr;
        	$reslutstr=$key_b.$reslutstr;
        	$reslutstr=substr(md5($reslutstr), 0,8).$reslutstr;
    	}else{
        	if(substr($reslutstr,0, 5)!="xugui"){
            	return false;
        	}
        	$reslutstr=substr($reslutstr, 5);
    	}
    	return $reslutstr;
	}


}