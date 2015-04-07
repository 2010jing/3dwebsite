<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    //------ Exhibition -------//
    //根据用户类型返回Exhibition 数量
    function getExhibitionNumByUID($role,$uid){

    	if($role == 'admin'){

    	}else{
        	$this->db->where('uid', $uid);
    	}
        $this->db->where('status !=', 1);

        $query = $this->db->get('exhibition'); 
        return $query->num_rows();
    }

    //根据用户类型返回Takecourse 数量
    function getTakecourseNumByUID($role,$uid){

    	if($role == 'admin'){

    	}else{
        	$this->db->where('uid', $uid);
    	}
        $this->db->where('status', 1);

        $query = $this->db->get('courseresult'); 
        return $query->num_rows();
    }

    //获取 Exhibition 列表
    function getExhibitionList($role,$uid){
        if($role == 'admin'){

        }else{
            $this->db->where('uid', $uid);
        }
        $this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $this->db->limit(5);
        $query = $this->db->get('exhibition');
        return $query->result();
    }

    //获取 each filve Exhibition 列表
    function getMoreExhibition($role,$uid,$xid){
        if($role == 'admin'){

        }else{
            $this->db->where('uid', $uid);
        }
        $this->db->where('status', 1);
        $this->db->where('id <',$xid);
        $this->db->order_by('id','DESC');
        $this->db->limit(5);
        $query = $this->db->get('exhibition');
        return $query->result();
    }


    function getMoreNews($role,$xid){
        if($role == 'admin'){
            $this->db->where('status !=', 0);
            $this->db->order_by('id','DESC');
            $this->db->limit(5);
            $this->db->where('id <',$xid);
            $query = $this->db->get('news');
            return $query->result();
        }    

    }

    function getThreeCourse($role,$uid,$xid){
        if($role == 'admin'){
            $this->db->where('status !=', 0);
            $this->db->order_by('id','DESC');
            $this->db->limit(3);
            $this->db->where('id <',$xid);
            $query = $this->db->get('course');
        }else{
            $this->db->where('uid', $uid);
            $this->db->where('status !=', 0);
            $this->db->order_by('id','DESC');
            $this->db->limit(3);
            $this->db->where('id <',$xid);
            $query = $this->db->get('courseresult');

        }

        return $query->result();
    }

    //获取 Course 列表
    function getCourseList($role,$uid){
        if($role == 'admin'){
            $this->db->order_by('id','DESC');
            $this->db->limit(3);
            $query = $this->db->get('course');
        }else{
            $this->db->where('uid', $uid);
            $this->db->where('status !=', 0);
            $this->db->order_by('id','DESC');
            $this->db->limit(3);
            $query = $this->db->get('courseresult');

        }

        return $query->result();
    }
    //获取 Course 列表
    function getNewsList($role,$uid){
            $this->db->order_by('id','DESC');
            $this->db->limit(5);
            $query = $this->db->get('news');
            return $query->result();
    }
    //获取 Race 列表
    // function getRaceList($role,$uid){
    //     if($role == 'admin'){
    //         $query = $this->db->get('race');
    //     }else{
    //         $this->db->where('uid', $uid);
    //         $query = $this->db->get('raceresult');

    //     }

    //     $this->db->where('status !=', 0);
    //     return $query->result();
    // }


    function getRaceList($role){
        if($role == 'admin'){
            $this->db->order_by('nterm','DESC');

            $query = $this->db->get('race');
            return $query->result();
        }
    }
    function getMoreRaceResult($role,$uid,$xid){
        if($role == 'admin'){

        }else{
            $this->db->where('uid', $uid);
        }
        $this->db->where('status !=', 0);
        $this->db->where('id <',$xid);
        $this->db->order_by('id','DESC');
        $this->db->limit(3);
        $query = $this->db->get('raceresult');
        return $query->result();
    }

    //获取比赛结果
    function getRaceResult($role,$uid){
        if($role == 'admin'){

        }else{
            $this->db->where('uid', $uid);
        }
        $this->db->order_by('id','DESC');
        $this->db->limit(3);
        $this->db->where('status !=', 0);        
        $query = $this->db->get('raceresult');

        return $query->result();    
    }

    //根据用户类型返回Race 数量
    // function getRaceNum($role,$uid){

    // 	if($role == 'admin'){

    // 	}else{
    //     	//$this->db->where('uid', $uid);
    // 	}
    //     $this->db->where('status', 1);

    //     $query = $this->db->get('race'); 
    //     return $query->num_rows();
    // }

    //获取 用户 信息
    function getUserInfo($uid){
        $this->db->where('id', $uid);
        $query = $this->db->get('user');  
        return $query->first_row();
    }

    //更新用户信息
    function updateUserInfo($uid){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $studentid=$_POST['studentid'];
        $major=$_POST['major'];

        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('studentid', $studentid);
        $this->db->set('major', $major);

        $this->db->where('id', $uid);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    //校验用户密码是否正确
    function validatePass($opass,$uid){
        $this->db->where('password', md5($opass));
        $this->db->where('id', $uid);
        $query = $this->db->get('user'); 
        return $this->db->affected_rows();

    }

    // 更改密码
    function changePassword($pass,$uid){
        $this->db->set('password', md5($pass));
        $this->db->where('id', $uid);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    //发插入一个新作品
    function publishWork($uid,$username,$createtime){
        $this->id = null;
        $this->title = $_POST['title'];
        $this->createtime = $createtime;
        $this->category = $_POST['category'];
        $this->imgname = $createtime.'.jpg';
        $this->modelname = $createtime.'.stl';
        $this->description = $_POST['description'];
        $this->publisher = $username;
        $this->uid = $uid;
        $this->raceid = 0 ;
        $this->voted = 0;
        $this->race= 'NO';
        $this->nterm= 'NO';
        $this->status= 1;
        return $this->db->insert('exhibition', $this); //插入成功返回 true 否则 false    
    }

    //获取 Admin info
    function getAdminInfo(){
        $this->db->where('role', 'admin');
        $query = $this->db->get('user'); 
        return $query->result();
    }

    //发插入一个新作品
    function publishCourse($nterm,$username,$createtime){
        $this->id = null;
        $this->name = $_POST['name'];
        $this->introduction = $_POST['introduction'];
        $this->targetstudent = $_POST['targetstudent'];
        $this->newsimg = $createtime.'.jpg';
        $this->publisher = $username;
        $this->createtime = $createtime;
        $this->status = 1;
        $this->remark= '';
        return $this->db->insert('course', $this); //插入成功返回 true 否则 false    
    }


    //发插入一个新作品
    function publishNews($username,$createtime){
        $this->id = null;
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->newsimg = $createtime.'.jpg';
        $this->publisher = $username;
        $this->createtime = $createtime;
        $this->status = 1;

        $this->remark= '';
        return $this->db->insert('news', $this); //插入成功返回 true 否则 false    
    }

    //获取 总共开了多少课
    function getCourseNum(){
        $this->db->where('status !=', 0);
        $query = $this->db->get('course'); 
        return $query->num_rows();
    }

    //获取 总共开了多少比赛
    function getRaceNum(){
        $this->db->where('status !=', 0);
        $query = $this->db->get('race'); 
        return $query->num_rows();
    }

    //获取 总共开了多少比赛
    function getNewsNum(){
        $this->db->where('status !=', 0);
        $query = $this->db->get('news'); 
        return $query->num_rows();
    }    //插入一条 courseresult
    function takeThisCourse(){
        $signuptime = date('YmdHis',time());
        $this->id=null;
        $this->uid = $_POST['uid'];
        $this->username = $_POST['username'];
        $this->avatar = $_POST['avatar'];
        $this->email = $_POST['email'];
        $this->coursename = $_POST['coursename'];
        $this->courseid = $_POST['courseid'];
        $this->coursetime = $_POST['coursetime'];
        $this->coursevenue = $_POST['coursevenue'];
        $this->courseimg = $_POST['courseimg'];
        $this->createtime = $_POST['createtime'];
        $this->signuptime = $signuptime;
        $this->nterm = $_POST['nterm'];

        $this->status = 1;
        $this->remark= '';
        return $this->db->insert('courseresult', $this); //插入成功返回 true 否则 false       
    }

    //插入一个new race
    function publishRace($nterm,$username,$createtime){
        $this->id = null;
        $this->name = $_POST['name'];
        $this->startdate = $_POST['startdate'];
        $this->enddate = $_POST['enddate'];
        $this->createtime = $createtime;
        $this->nterm = $nterm;
        $this->introduction = $_POST['introduction'];
        $this->publisher = $username;
        $this->status = 1;
        $this->remark= '';
        return $this->db->insert('race', $this);    
    }

    function changeRaceStatus(){
        $this->db->set('status', $_POST['status']);
        $this->db->where('id', $_POST['rid']);
        $this->db->update('race');
        return $this->db->affected_rows();
    }

    function getRaceById($xid){
        $this->db->where('id', $xid);
        $query = $this->db->get('race'); 
        return $query->result();
    }

    function getNewsById($xid){
        $this->db->where('id', $xid);
        $query = $this->db->get('news'); 
        return $query->result();
    }

    function updateRaceById(){
        $this->db->set('name', $_POST['name']);
        $this->db->set('startdate', $_POST['startdate']);
        $this->db->set('enddate', $_POST['enddate']);
        $this->db->set('introduction', $_POST['introduction']);
        $this->db->where('id', $_POST['rid']);
        $this->db->update('race');
        return $this->db->affected_rows();
    }

    function changeCourseStatus(){
        $this->db->set('status', $_POST['status']);
        $this->db->where('id', $_POST['rid']);
        $this->db->update('course');
        return $this->db->affected_rows();
    }

    function changeNewsStatus(){
        $this->db->set('status', $_POST['status']);
        $this->db->where('id', $_POST['rid']);
        $this->db->update('news');
        return $this->db->affected_rows();
    }

    function getCourseById($xid){
        $this->db->where('id', $xid);
        $query = $this->db->get('course'); 
        return $query->result();
    }

    function updateCourseById(){
        $this->db->set('name', $_POST['name']);
        $this->db->set('teacherid', $_POST['teacherid']);
        $this->db->set('targetstudent', $_POST['targetstudent']);
        $this->db->set('time', $_POST['time']);
        $this->db->set('venue', $_POST['venue']);
        $this->db->set('introduction', $_POST['introduction']);
        $this->db->where('id', $_POST['id']);
        $this->db->update('course');
        return $this->db->affected_rows();
    }


}