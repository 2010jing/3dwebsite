<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    function getUser(){
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');  
        return $query->first_row();
    }

    function checkValidRegister(){
        // $email=$_POST['email'];
        $email = 'hejing@uic.edu.hk';
        $this->db->where('email', $email);        
        $this->db->where('status !=', 'active');
        $query = $this->db->get('user');  
        return $query->first_row();
    }


    function registerUser(){
        $this->id = null;
        $this->name=$_POST['name'];
        $this->email=$_POST['email'];
        $this->password=md5($_POST['password']);
        $this->studentid=$_POST['studentid'];
        $this->major=$_POST['major'];
        $this->description=$_POST['description'];
        $this->role='user';
        $r =mt_rand(1,35);
        $this->avatar= $r.'.jpg';
        $_regtime = date('YmdHis',time());
        $this->status="unactive";
        $this->regtime=$_regtime;
        return $this->db->insert('user', $this); //插入成功返回 true 否则 false
    }




    //===================================




    function getUserByStudentid($studentid){
        $this->db->where('studentid', $studentid);
        $query = $this->db->get('user');  
        return $query->first_row();
    }



    function updateUserStatus($studentid){
        $this->db->set('status', '1');
        $this->db->where('studentid', $studentid);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    function updateUserPassword($studentid){
        $password=md5($_POST['password']);
        $this->db->set('password', $password);
        $this->db->where('studentid', $studentid);
        $this->db->update('user');
        return $this->db->affected_rows();
    }



    function detectStudentId($studentid){
        $this->db->where('studentid', $studentid);
        $this->db->where('status', 1);

        $query = $this->db->get('user'); 
        return $query->num_rows();
    }


    function getUserById($uid){
        $this->db->where('id', $uid);
        $query = $this->db->get('user'); 
        return $query->first_row();
    }

    function deleteUserNotActiveBySid($studentid){
      $this->db->where('studentid', $studentid);
      $this->db->delete('user');
    }

    
}