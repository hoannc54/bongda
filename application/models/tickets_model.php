<?php
class Tickets_Model extends CI_Model{
    
    function getTicketForMatch($match_id){
        
        $this->db->select('date,location,number,description,type,price');
        $this->db->where('match_id',$match_id);
        $query = $this->db->get('tickets');
        return $query->result_array();
    }
    
    function getMatch(){      
        return $this->db->get('match')->result_array();
    }
    
    function getMatchById($match_id){
        $this->db->select('match_name');
        $this->db->where('match_id',$match_id);
        $query = $this->db->get('match');
        return $query->row();
    }
    
    function getTicket(){
        $this->db->select('*');
        $query = $this->db->get('cart');
        return $query->result_array();
    }
    function addTicket(){
        $data = array(
            'name'=> $this->input->post('name'),
            'name_url'=>$this->input->post('name_url'),'img'=>$this->input->post('img'),'title'=>$this->input->post('title'),'contents'=>$this->input->post('contents'),'price'=>$this->input->post('price'));
        return $this->db->insert('cart',$data);
    }
    public function updateTicket($id = "") {
        $title = $this->input->post('title');
        $data = array(
            'name'=> $this->input->post('name'),
            'name_url'=>$this->input->post('name_url'),
            'img'=>$this->input->post('img'),
            'title'=>$this->input->post('title'),
            'contents'=>$this->input->post('contents'),
            'price'=>$this->input->post('price'));
    
      
        $this->db->where('id',$id)->limit(1);
        return $this->db->update('cart', $data);
    }
    public function getTicketForAdmin($id = ""){
         $this->db->select('*');
         $this->db->where('id',$id);
         $query = $this->db->get('cart');
         return $query->result_array();
    }
    function delete_ticket($id = ""){
        $this->db->where('id', $id);
        return $this->db->delete('cart');
    }
}
