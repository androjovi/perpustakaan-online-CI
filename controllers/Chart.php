<?php 
class Chart extends CI_Controller{
    
    function __construct(){
        parent::__construct();
            $this->load->model('chart_model');
    }   
    
    function index(){
        $now = $this->chart_model->read_sebagian('now')->num_rows();
        $days1 = $this->chart_model->read_sebagian('1 days ago')->num_rows();
        $days2 = $this->chart_model->read_sebagian('2 days ago')->num_rows();
        $days3 = $this->chart_model->read_sebagian('3 days ago')->num_rows();
        $days4 = $this->chart_model->read_sebagian('4 days ago')->num_rows();
        $days5 = $this->chart_model->read_sebagian('5 days ago')->num_rows();
        $days6 = $this->chart_model->read_sebagian('6 days ago')->num_rows();
        $days7 = $this->chart_model->read_sebagian('7 days ago')->num_rows();
        $r = $days7."-".$days6."-".$days5."-".$days4."-".$days3."-".$days2."-".$days1."-".$now;
        
        $ex = explode("-",$r);
        $t = array_sum($ex);
        $y = $t/7;
        $data['mean'] = (integer)$y;
        
        
        $g = json_encode($ex);
        
        $data['data'] = preg_replace('/\"/','',$g); // awokaokwoa dengan kekuatan find and replace terselesaikan sudah
        //print_r($data['data']);
		
		$last_month = $this->chart_model->rf("last month")->num_rows();
		$now_month = $this->chart_model->rf("now")->num_rows();
		$data['bulan'] = "['Bulan kemarin', $last_month],['Bulan sekarang', $now_month]";
        $this->load->view('system_view/chart/vw_chart',$data);
    }
    
    function kh(){
        echo "<pre>";
        echo ($this->chart_model->rf("last month")->num_rows());
        echo "<br>";
        echo ($this->chart_model->rf("now")->num_rows());
        
        
        
        /*$hasil = preg_match("/^[0-9]{2}\-[09]{2}\-[0-9]{4}/", "12-09-2012");
echo $hasil."<br>";*/
// 1
    }
}