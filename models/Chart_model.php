<?php 
class Chart_model extends CI_Model{
    function read_sebagian($f){
        $this->db->select('dari_tanggal');
        $tgl = strtotime($f);
        $this->db->where('dari_tanggal',date('d-m-Y',$tgl));
        
        return $this->db->get('daftar_peminjam');
    }
    function rf($f){
        $this->db->select('*');
        $tgl = strtotime($f);
        $g = date('m',$tgl);
        //$this->db->where('dari_tanggal','22-12-2017');
        return $this->db->query("SELECT * FROM daftar_peminjam WHERE dari_tanggal REGEXP '^[0-9]{2}\-($g)\-[0-9]{4}'"); // anjir regex pusing amet
        
    }
}