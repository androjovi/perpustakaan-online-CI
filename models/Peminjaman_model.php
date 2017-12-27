<?php 
class Peminjaman_model extends CI_Model{
    function cek_nis($data){
        $this->db->select('*');
        $this->db->from('list_kartu_perpustakaan as lkp');
        $this->db->join('list_siswa as ls','lkp.nis = ls.nis');
        $this->db->where($data);
        return $this->db->get();
    }
}

