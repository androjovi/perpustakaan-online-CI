<?php 

class Peminjaman extends CI_Controller{

    // Inisialisisi tabel
    protected $table = array(
            'buku'          => 'daftar_buku',
            'peminjam'      => 'daftar_peminjam',
            'kartu_anggota' => 'list_kartu_perpustakaan',
            'siswa'         => 'list_siswa',
    );

    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        
    }
    function index(){

    }

    function input(){
        
        $this->form_validation->set_rules('nis','NIS','required');
        $this->form_validation->set_rules('no_anggota','Nomor anggota','required');
        $this->form_validation->set_rules('kode_buku','Kode buku','required');
        $this->form_validation->set_rules('dari_tanggal','Dari tanggal','required');
        $this->form_validation->set_rules('sampai_tanggal','Sampai tanggal','required');

                if ( $this->form_validation->run() ){
                            $data = array(
                                    'nis'               =>      $this->input->post('nis'),
                                    'nomor_kartu'       =>      $this->input->post('no_anggota'),
                                    'judul_buku'        =>      $this->input->post('no_anggota'),
                                    'kode_buku'         =>      $this->input->post('kode_buku'),
                                    'dari_tanggal'      =>      $this->input->post('dari_tanggal'),
                                    'sampai_tanggal'    =>      $this->input->post('sampai_tanggal'),
                            );

                                if ( $this->core_model->add($data,$this->table['peminjam']) ) {
                                        $this->session->set_flashdata('message','Data berhasil disimpan');
                                        redirect('');
                                }else{
                                    echo "Galat";
                                }
                }else{
                    $this->load->view('dashboard');
                }
    }

    function get_nis(){
            $var = array(
                 'nis' => $this->input->post('nisk'),
            );
            $g = $this->core_model->read($var,$this->table['siswa'])->result();
            foreach ($g as $k){
                $data[] = array(
                    "nis"       => $k->nama, 
                    "kelas"     => $k->kelas,
                    "jurusan"   => $k->jurusan,
                );   
                
            }
            echo json_encode($data);

            
    }
}