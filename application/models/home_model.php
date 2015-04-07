<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    //------ Exhibition -------//
    //获取最新的六条 news
    function getTopSixNews(){

    	$this->db->where('status', 1);
		$this->db->limit(6);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('news'); 
        return $query->result();
    }

    //获取最新的五个 photoshow
    function getTopFivePhotoshow(){
    	$this->db->where('status', 1);
		$this->db->limit(5);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('photoshow'); 
        return $query->result();
    }

    //获取 all Exhibition
    function getAllExhibition(){
    	$this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('exhibition'); 
        return $query->result();
    }

    //获取 each six Exhibition
    function getEachSixExhibition(){
        $this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $this->db->limit(6);
        $query = $this->db->get('exhibition'); 
        return $query->result();
    }

    //获取 each six Exhibition
    function getMoreExhibition($eid){
        $this->db->where('status', 1);
        $this->db->where('id <',$eid);
        $this->db->order_by('id','DESC');

        $this->db->limit(6);
        $query = $this->db->get('exhibition'); 
        return $query->result();
    }
    
    //获取 最新课程 by id
    function getCourseByCourseId($cid){
        $this->db->where('id', $cid);
        $this->db->where('status !=', 0);        
        $this->db->order_by('id','DESC');
        $this->db->limit(1); 
        $query = $this->db->get('course'); 
        return $query->result();
    }

    function whoInCourse($cid){
        $this->db->where('courseid',$cid);
        $this->db->where('status !=',0);
        $query = $this->db->get('courseresult');
        return $query->result();
    }


    function getLatestCourseId(){
        $this->db->select('id');
        $this->db->order_by("id", "DESC");
        $this->db->where("status !=", 0);
        $this->db->limit(1);        
        $query = $this->db->get('course');
        return $query->row_array();
    }

    function getLatestNewsId(){
        $this->db->select('id');
        $this->db->order_by("id", "DESC");
        $this->db->where("status !=", 0);
        $this->db->limit(1);        
        $query = $this->db->get('news');
        return $query->row_array();
    }

    //获取 最新课程 by id
    function getNewsById($nid){
        $this->db->where('id', $nid);
        $this->db->where('status !=', 0);        
        $this->db->order_by('id','DESC');
        $this->db->limit(1); 
        $query = $this->db->get('news'); 
        return $query->result();
    }


    //根据 teacher id 获取 teacher 信息
    function getTeacherById($tid){
    	$this->db->where('id', $tid);
        $query = $this->db->get('user'); 
        return $query->result();
    }

    // 根据 uid cid 查询是否已经选择课
    function checkIsTakeCourse($cid,$uid){
        $this->db->where('uid', $uid);
        $this->db->where('courseid', $cid);
        $query = $this->db->get('courseresult'); 
        $num = $query->num_rows();
        if($num != 0){
            return 'yes';
        }else{
            return 'no';
        }
    }


}