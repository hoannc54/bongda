<?php

class Users_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // thêm tài khoản vào database
    // input: username, email, password ; output: true | false
    public function deleteUser($user_id){
        $this->db->where('user_id', $user_id);
        return $this->db->delete('users');
    }
    public function addUser() {
        $data = array(
            'username' => ucwords(strtolower($this->input->post('username'))),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'user_level' => 0
        );
        return $this->db->insert('users', $data);
    }

    // kiểm tra tài khoản có tồn tại không
    // input: username ; output: true | false
    public function checkUserExist() {
        $username = $this->input->post('username');
        $this->db->from('users')->where('username', $username);
        return $this->db->count_all_results() === 1;
    }
    
    // lấy dữ liệu user
    // input: username, password ; output: user | null
    public function getUser() {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $array = array('username' => $username, 'password' => $password);
        $this->db->from('users')->where($array);
        if ($this->db->count_all_results() === 1) {
            $this->db->flush_cache();
            $this->db->from('users')->where($array);
            $this->db->select('user_id, username, email, user_level');
            return $this->db->get()->result()[0];
        } else {
            return null;
        }
    }
    public function getUserForAdmin($user_id = ""){
         $this->db->select('*');
         $this->db->where('user_id',$user_id);
         $query = $this->db->get('users');
         return $query->result_array();
    }
    public function countUsers(){
        return $this->db->count_all_results('users');
    }
    public function getlistUsers($limit = 10, $offset = 0) {
        $query = $this->db->get('users', $limit, $offset);
        return $query->result_array();
    }
}
