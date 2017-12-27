<?php 

class Peminjaman extends CI_Controller{

    

    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->model('peminjaman_model');
        
    }
    function index(){
        redirect('peminjaman/list_peminjam');
    }

    function input(){
        $this->form_validation->set_rules('no_anggota','Nomor anggota','required');
        $this->form_validation->set_rules('kode_buku','Kode buku','required');
        $this->form_validation->set_rules('dari_tanggal','Dari tanggal','required');
        $this->form_validation->set_rules('sampai_tanggal','Sampai tanggal','required');

                if ( $this->form_validation->run() ){
                            $data = array(
                                    'nomor_kartu'       =>      $this->input->post('no_anggota'),
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
        $this->form_validation->set_rules('nisk','NIS','required');
        
             if ($this->form_validation->run()){
            $var = array(
                 'nis' => $this->input->post('nisk'),
            );
            $g = $this->core_model->read($var,$this->table['kartu_anggota']);
                 
                 if ($g->num_rows() == 1){
                     $d = $g->row();
                     echo "Sudah terdaftar, dengan nomor kartu berikut : <b>". $d->nomor_kartu;
                     echo "<script>$('#tumbul').attr('disabled','true');</script>";
                 }else{
                     $f = $this->core_model->read($var,$this->table['siswa']);
                     $k = $f->row();
                    echo "
                        <dl class='dl-horizontal' style='text-overflow:none;'>
                            <dt>Nama lengkap</dt>
                            <dd>$k->nama</dd>
                            <dt>Kelas</dt>
                            <dd>$k->kelas</dd>
                            <dt>Jurusan</dt>
                            <dd>$k->jurusan</dd>
                        </dl>
                    ";
                 }
             // echo json_encode($data);
             }else{
                echo "Access Denied";
            }        
                
    }
    
    function get_kartu(){
        $this->form_validation->set_rules('kartu','KARTU','required');
        
            if ($this->form_validation->run()){
        
            
        $var = array(
            'nomor_kartu' => $this->input->post('kartu')
        );
        $g = $this->core_model->read($var,$this->table['kartu_anggota'])->result();

                    foreach ($g as $k){
                        $r = $k->nis;
                        $f = $this->peminjaman_model->cek_nis(array('ls.nis' => $r))->result();
                    }
        
        
        foreach ($f as $l ){
            $data[] = array(
                'nis'           => $l->nis,
                'nama_lengkap'  => $l->nama,
                'jurusan'       => $l->jurusan,
                'kelas'         => $l->kelas,
            );
            echo json_encode($data);
        }
                
            }else{
                echo "Access denied";
            }
    }
    
    function get_buku(){
        $this->form_validation->set_rules('kode_buku','KARTU','required');
        
            if ($this->form_validation->run()){
        $var = array(
            'kode_buku' => $this->input->post('kode_buku')
        );
        
        $g = $this->core_model->read($var, $this->table['peminjam']);
            
                if ($g->num_rows() >= 1){
                    $y = $g->row();
                    echo "Buku sedang dipinjam oleh <b>$y->nomor_kartu</b>. Sampai tanggal <b>$y->sampai_tanggal</b>";
                }else{
                    $l = $this->core_model->read($var, $this->table['buku'])->row();
                    
                    echo "
                        <dl class='dl-horizontal' style='text-overflow:none;'>
                            <dt>Judul buku</dt>
                            <dd>$l->judul_buku</dd>
                            <dt>Pengarang buku</dt>
                            <dd>$l->pengarang_buku</dd>
                            <dt>Kategori buku</dt>
                            <dd>$l->kategori_buku</dd>
                        </dl>
                    ";
                }
        
        /*foreach ($g as $k){
            $data[] = array(
                'judul_buku'     => $k->judul_buku,
                'kategori_buku'  => $k->kategori_buku,
                'pengarang_buku' => $k->pengarang_buku,
            );
            echo json_encode($data);
        }
        */
    }else{
                echo "Access Denied";
            }
    }
    
    function list_peminjam(){
        $data['query'] = $this->core_model->read(array('status_pengembalian' => 0),$this->table['peminjam'])->result();
        $this->load->view('system_view/peminjaman/vw_listpeminjam',$data);
    }
    
    function kembalikan($kode){
            
        if ( $this->core_model->edit(array('status_pengembalian' => 1),'kode_buku',$kode,$this->table['peminjam']) ){
            $this->session->set_flashdata('message','Berhasil di proses !!!');
            redirect('peminjaman/list_peminjam');
        }else{
            echo "ndak berashil";
        }
    }
    
    function perpanjang($kode){
        $data['query'] = $this->core_model->read(array('kode_buku' => $kode),$this->table['peminjam'])->result();
        $this->load->view('system_view/peminjaman/vw_edit',$data);
    }
    
    function proses_perpanjang(){
        $this->form_validation->set_rules('sampai_tanggal','Sampai tanggal','required')    ;
        
            if ($this->form_validation->run()){
                $da = array(
                    'sampai_tanggal' => $this->input->post('sampai_tanggal'),
                );
                if ( $this->core_model->edit($da,'kode_buku',$this->input->post('kode_buku'),$this->table['peminjam'])){
                    $this->session->set_flashdata('message','Berhasil di perpanjang');
                    redirect('peminjaman/list_peminjam');
                }
            }else{
                $this->load->view('system_view/peminjaman/vw_edit');
            }
    }
    
    function modal(){
        $this->load->view('system_view/peminjaman/vw_modaledit');
    }
}