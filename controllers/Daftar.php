<?php 
class Daftar extends CI_Controller{

    protected $table = array(
        'buku'          => 'daftar_buku',
        'peminjam'      => 'daftar_peminjam',
        'kartu_anggota' => 'list_kartu_perpustakaan',
        'siswa'         => 'list_siswa',
    );

    function __construct(){
        parent::__construct();

    }

    function index(){
            $this->load->view('system_view/pendaftaran_kartu/vw_pendaftaran');
    }

    function store(){
            $this->form_validation->set_rules('no_kartu','Nomor kartu','required|trim|max_length[32]');
            $this->form_validation->set_rules('nis','Nomor Induk Siswa','required|trim|max_length[20]');

                if ( $this->form_validation->run() ){
                    $data = array(
                            'nomor_kartu' =>    $this->input->post('no_kartu'),
                            'nis'         =>    $this->input->post('nis'),
                    );

                        if ( $this->core_model->add($data,$this->table['kartu_anggota'])){
                                $this->session->set_flashdata('message','Kartu berhasil ditambah');
                                redirect('daftar');
                        }
                }else{
                    $this->load->view('system_view/pendaftaran_kartu/vw_pendaftaran');
                }
    }

}