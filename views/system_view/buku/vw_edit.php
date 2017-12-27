<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+1M",

    });

    $( "#datepicker2" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+2W",

    });
  } );
  function ff(){
        var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
        var panjang = 8;
        var prefix = 'BKU';
        var buku = $("#judul").val();
        var f = buku.toUpperCase();
        var l = f.split(" ").join("");
        var z = l.substr(0,7);
      console.log(z);
        
        var random_all = '';
        for (var i=0; i<panjang; i++) {
            var hasil = Math.floor(Math.random() * campur.length);
            random_all += campur.substring(hasil,hasil+1);
        }
        $("#valuenya").val(prefix+"-"+z+""+random_all+"");
    };
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
                    <h4 class="title">Pendaftaran buku</h4>
                </div>
                <div class="content"
                <?php if( NULL !== validation_errors() ): ?>
                    <p><?php echo  validation_errors(); ?></p>
                <?php endif ?>
                <?php if ( NULL !== $this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                <form action=" <?php echo site_url('buku/simpan_edit'); ?> " method="post">
                    <?php foreach($query as $k): ?>
                        <div class="row">
                            <div class="col-md-12">
                            <label>JUDUL BUKU</label>
                                <div class="form-group">
                                    <input type="text" id="judul" class="form-control" placeholder="Judul buku..." name="judul_buku" value="<?php echo $k->judul_buku; ?>" required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <label>KATEGORI BUKU</label>
                                <div class="form-group">
                                    <input type="text" name="kategori" class="form-control" placeholder="Kategori buku..." required value="<?php echo $k->kategori_buku; ?>">
                                </div>
                            </div>
                              
                        
                            <div class="col-md-6">
                            <label>PENGARANG BUKU</label>
                                <div class="form-group">
                                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang buku..." required value="<?php echo $k->pengarang_buku; ?>">
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-md-6">
                            <label>PENERBIT BUKU</label>
                                <div class="form-group">
                                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit buku..." required value="<?php echo $k->penerbit_buku; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <label>JUMLAH HALAMAN <small></small></label>
                                <div class="form-group">
                                    <input type="number" name="jumlah_halaman" class="form-control" placeholder="Jumlah halaman buku..." required value="<?php echo $k->jumlah_halaman; ?>">
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-4">
                            <label>KODE BUKU </label>
                                <div class="form-group">
                                    <input type="text" readonly="true" id="valuenya" name="kode_buku" class="form-control" placeholder="Akan dibuat otomastis..." required value="<?php echo $k->kode_buku; ?>">
                                </div>
                                <!-- <a href="javascript:void(0)" onclick="ff()" class="btn btn-primary">Generate kode</a> -->
                            </div>
                        </div>               
                    
                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            
                        <div class="clearfix"></div>
                        
                        <?php endforeach; ?>
                        
                    </form>
                
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
