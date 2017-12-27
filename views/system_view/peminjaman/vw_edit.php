<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>

<script>
  $( function() {
    $( "#datepicker2" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+2W",

    });
    var data = $("#input_nis").val();
  console.log(data);
  } );
  
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
                    <h4 class="title">Daftar peminjam</h4>
                </div>
                <div class="content"
                <?php if( NULL !== validation_errors() ): ?>
                    <p><?php echo  validation_errors(); ?></p>
                <?php endif ?>
                <form action=" <?php echo site_url('peminjaman/proses_perpanjang'); ?> " method="post">
                       <!-- <div class="row">
                            <div class="col-md-12">
                            <label>NIS</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="input_nis" name="nis" placeholder="Enter nis" value="<?php echo set_value('nis'); ?>" required >
                                    <span class="input-group-btn">
                                        <button onclick="cek_nis()" class="btn btn-success" type="button">CEK NIS</button>
                                    </span>
                                    
                                </div>
                                <div id="hasil_nis"></div>
                            </div>
                        </div>
-->
                    <?php foreach($query as $k): ?>
                    <div class="row">
                            <div class="col-md-4">
                            <label>Nomor kartu</label>
                                <div class="form-group">
                                    <input type="text" readonly name="nomor_kartu" class="form-control" required value="<?php echo $k->nomor_kartu; ?>">
                                </div>

                            </div>
                    
                            <div class="col-md-4">
                            <label>Kode buku</label>
                                <div class="form-group">
                                    <input type="text" readonly name="kode_buku" class="form-control" required value="<?php echo $k->kode_buku; ?>">
                                </div>

                            </div>
                        <div class="col-md-4">
                            <label>Tanggal pinjam</label>
                                <div class="form-group">
                                    <input type="text" readonly class="form-control" required value="<?php echo $k->dari_tanggal; ?>">
                                </div>

                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                            <label>Sampai tanggal</label>
                                <div class="input-group">
                                    <input type="text" name="sampai_tanggal" class="form-control" id="datepicker2" required value="<?php echo $k->sampai_tanggal; ?>">
                                    <span class="input-group-addon" >
                                        <span class="glyphicon glyphicon-calendar" ></span>
                                    </span>
                                    
                                </div>
                                
                                
                                <small style="font-size:10px;">Max peminjaman 2 minggu</small>

                            </div>
                    </div>
                    
                        <?php endforeach;  ?>
                                        
                            <button type="submit" id="tumbul" class="btn btn-info btn-fill pull-right" >Submit</button>
                            <?php if ( NULL !== $this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                
                            <div class="clearfix"></div>    
                    
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
