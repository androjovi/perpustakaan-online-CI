<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>

<script>
  $( function() {
    
    $(document).ready(function(){
        var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
        var panjang = 7;
        var prefix = 'AGGT';
        var tanggal = new Date();
        var hari = tanggal.getDate();
        var bulan = tanggal.getMonth();
        var tahun = tanggal.getFullYear();
        var concat_all = hari+""+bulan+""+tahun;
        console.log(concat_all);
        
        var random_all = '';
        for (var i=0; i<panjang; i++) {
            var hasil = Math.floor(Math.random() * campur.length);
            random_all += campur.substring(hasil,hasil+1);
        }
        $("#kode_random").val(prefix+"-"+random_all+""+concat_all);
    });
      
  } );
    function cek_nis(){
      var nis = $("#input_nis").val();
      $.ajax({
        type : "post",
        
        url : "<?php echo site_url('peminjaman/get_nis'); ?>",
        data : {nisk : nis},
        success : function(data){
           /* $.each(data , function(i, n){
                $("#hasil_nis").append(
                    '<p>NIS : '+n.nis+'</p><p>KELAS : '+n.kelas+'</p><p>JURUSAN : '+n.jurusan+'</p>'
                )
            } );
            */
            
            $("#hasil_nis").html(data);
        
        $("#tumbul").removeAttr("disabled");
        }
      });
      $("#hasil_nis").empty();
        $("#tumbul").attr("disabled","true");
  }
    
  </script>

  

<!-- load sidebar in page/sidebar -->
<?php $this->load->view('page/sidebar'); ?>

<!-- Load navbar in page/navbar -->
<?php $this->load->view('page/navbar'); ?>




<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar keanggotaan perpustakaan</h4>
                </div>
                <div class="content"
                <?php if( NULL !== validation_errors() ): ?>
                    <p><?php echo  validation_errors(); ?></p>
                <?php endif ?>
                <form action=" <?php echo site_url('daftar/store'); ?> " method="post">
                        <div class="row">
                            <div class="col-md-12">
                            <label>NOMOR KARTU ANGGOTA</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kode_random" readonly name="no_kartu" placeholder="Akan dibuat otomatis." value="<?php echo set_value('no_kartu'); ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <label>NIS</label>
                                <div class="input-group">
                                    <input type="text" name="nis" class="form-control" id="input_nis" placeholder="Nomor NIS" value=""<?php echo set_value('nis'); ?>>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" onclick="cek_nis()" type="button">CEK NIS</button>
                                    </span>
                                </div>
                                <div id="hasil_nis"></div>
                            </div>
                        </div>          
                            <button type="submit" id="tumbul" disabled="true" class="btn btn-info btn-fill pull-right">Submit</button>
                            <?php if ( NULL !== $this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                        <div class="clearfix"></div>
                        
                        
                        
                    </form>
                
            </div>
        </div>
        
        
        </div>
        
    </div>
    </div>
</div>
</div>

        <?php $this->load->view('page/footer'); ?>

</body>

    <!--   Core JS Files   -->
    <?php $this->load->view('page/js'); ?>

<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 2000
            });

    	});

        
    </script>
</html>
