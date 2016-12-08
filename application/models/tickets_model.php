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
        $this->db->select('date,location,number,description,type,price');
        $query = $this->db->get('tickets');
        return $query->result_array();
    }
}
