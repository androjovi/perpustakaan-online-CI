<?php 
class Utama extends CI_Controller{

    /*
        * Jika error dengan resourcenya 404 not found di console Ganti url dengan echo site_url
        
        * $this->table[''] di inisialisikan di core Controller
         
        ~ Programmer : Joviandro
        ~ Source code ini open source
        
        - Original inisialisasi
        
         protected $table = array(
                            'buku'          => 'daftar_buku',
                            'peminjam'      => 'daftar_peminjam',
                            'kartu_anggota' => 'list_kartu_perpustakaan',
                            'siswa'         => 'list_siswa',
        );
    */
    function __construct(){
        parent::__construct();
            $this->load->library(array('session'));
    }

    function index(){
        $this->load->view('dashboard');
    }
}