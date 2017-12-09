<?php 
class Utama extends CI_Controller{

    /*
        Jika error dengan resourcenya 404 not found
        Ganti url dengan echo site_url
    */
    function __construct(){
        parent::__construct();
            $this->load->library(array('session'));
    }

    function index(){
        $this->load->view('dashboard');
    }
}