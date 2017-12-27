<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+1D",

    });

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

  <script>
  function cek_nis(){
      var nis = $("#input_nis").val();
      $.ajax({
        type : "post",
        dataType : "json",
        url : "<?php echo site_url('peminjaman/get_nis'); ?>",
        data : {nisk : nis},
        success : function(data){
            /* $.each(data , function(i, n){
                $("#hasil_nis").append(
                    '<p>NIS : '+n.nis+'</p><p>KELAS : '+n.kelas+'</p><p>JURUSAN : '+n.jurusan+'</p>'
                )
            } );
            */
            
            console.log(data);
        }
      });
      $("#hasil_nis").empty();
  }
      
      function cek_kartu(){
          var nomor = $("#input_anggota").val();
          $.ajax({
              type : "post",
              dataType: "JSON",
              url : "<?php echo site_url('peminjaman/get_kartu'); ?>",
              data : {kartu : nomor},
              success : function(data){
            $.each(data , function(i, n){
                $("#hasil_kartu").append(
                    '<p>NIS : '+n.nis+'</p><p>NAMA : '+n.nama_lengkap+'</p><p>KELAS : '+n.kelas+'</p><p>JURUSAN : '+n.jurusan+'</p>'
                )
            } );
            statn = 1;
        }
          })
          $("#hasil_kartu").empty();
      }
      
      function cek_buku(){
          var buku = $("#input_buku").val();
          
          $.ajax({
                type : "post" ,
                 //dataType: "JSON",
                url : "<?php echo site_url('peminjaman/get_buku'); ?>",
                data : {kode_buku : buku },
                success : function(data){
                    $("#hasil_buku").html(data);
                   /* $.each(data, function(i, n){
                        $("#hasil_buku").append(
                            '<p>JUDUL BUKU : '+n.judul_buku+'</p><p>KATEGORI BUKU :'+n.kategori_buku+'</p><p>PENGARANG BUKU : '+n.pengarang_buku+'</p>'
                        )
                     })*/
                    
                }
          });
          $("#hasil_buku").empty();
      }
      
      function hapus_confirm(){
  var msg;
  msg= "Anda yakin data sudah benar ?? " ;
  var agree=confirm(msg);
  if (agree)
  return true ;
  else
  return false ;
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
                    <h4 class="title">Daftar peminjam</h4>
                </div>
                <div class="content"
                <?php if( NULL !== validation_errors() ): ?>
                    <p><?php echo  validation_errors(); ?></p>
                <?php endif ?>
                <form action=" <?php echo site_url('peminjaman/input'); ?> " method="post">
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

                        <div class="row">
                            <div class="col-md-12">
                            <label>Nomor kartu anggota</label>
                                <div class="input-group">
                                    <input type="text" name="no_anggota" id="input_anggota" class="form-control" placeholder="Nomor keanggotaan" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" onclick="cek_kartu()" type="button">CEK ANGGOTA</button>
                                    </span>
                                </div>
                                <div id="hasil_kartu"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <label>Kode buku</label>
                                <div class="input-group">
                                    <input type="text" name="kode_buku" id="input_buku" class="form-control" placeholder="Kode buku" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" onclick="cek_buku()" type="button">CEK BUKU</button>
                                    </span>
                                </div>
                                <div id="hasil_buku"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <label>Dari tanggal</label>
                                <div class="input-group"  >
                                    <input type="text" name="dari_tanggal" class="form-control" id="datepicker" required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <label>Sampai tanggal</label>
                                <div class="input-group">
                                    <input type="text" name="sampai_tanggal" class="form-control" id="datepicker2" required >
                                    <span class="input-group-addon" >
                                        <span class="glyphicon glyphicon-calendar" ></span>
                                    </span>
                                    
                                </div>
                                <small style="font-size:10px;">Max peminjaman 2 minggu</small>

                            </div>
                    </div>
                        
                                        
                            <button type="submit" id="tumbul" onclick="return hapus_confirm()" class="btn btn-info btn-fill pull-right" >Submit</button>
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
