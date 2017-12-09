<?php 

class Core_model extends CI_Model{

    function add($data,$table){
        $this->db->set($data);
        return $this->db->insert($table);
    }
    function remove($coloumn,$where,$table){
        $this->db->where($coloumn,$where);
        return $this->db->delete($table);
    }
    function edit($data,$coloumn,$where,$table){
        $this->db->set($data);
        $this->db->where($coloumn,$where);
        return $this->db->update($table);
    }
    function read($coloumnandwhere,$table){
        // jika tidak ada maka NULL, NULL
        if ($coloumnandwhere !== NULL){
            $this->db->where($coloumnandwhere);
        }
        return $this->db->get($table);
    }
}