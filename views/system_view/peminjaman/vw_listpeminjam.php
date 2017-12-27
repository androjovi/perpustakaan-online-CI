<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<!-- load sidebar in page/sidebar -->
<?php $this->load->view('page/sidebar'); ?>

<!-- Load navbar in page/navbar -->
<?php $this->load->view('page/navbar'); ?>

<script>
    function hapus_confirm(){
  var msg;
  msg= "Apakah Anda Yakin Data Yang diberikan sudah benar ? " ;
  var agree=confirm(msg);
  if (agree)
  return true ;
  else
  return false ;
}
</script>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ( NULL !== $this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">List peminjaman</h4>
                                    <p class="card-category">Akan menampilkan semua peminjam dari semua hari</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover" id="table-ah">
                                        <thead>
                                            <th>Nomor kartu</th>
                                            <th>Kode buku</th>
                                            <th>Dari tanggal</th>
                                            <th>Sampai tanggal</th>
                                            <th>Jatuh tempo</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($query as $k): ?>
                                            <tr>
                                                <td><a href="javascript:void(0)" style="color:black;"><?php echo $k->nomor_kartu; ?></a></td>
                                                <td><a href="javascript:void(0)" style="color:black;" class="buku" id="<?php echo $k->kode_buku; ?>" ><?php echo $k->kode_buku; ?></a></td>
                                                <td><?php echo $k->dari_tanggal; ?></td>
                                                <td><?php echo $k->sampai_tanggal; ?></td>
                                                <td><?php echo @ht($k->dari_tanggal,$k->sampai_tanggal); ?> Hari</Td>
                                                <td><a href="<?php echo site_url('peminjaman/kembalikan/'.$k->kode_buku) ?>" class="btn btn-primary btn-xs" onclick="return hapus_confirm()">DIKEMBALIKAN</a>&nbsp;<a href="<?php echo site_url('peminjaman/perpanjang/'.$k->kode_buku); ?>" class="btn btn-danger btn-xs">PERPANJANG</a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Button trigger modal -->
<div id="tg"></div>


<!-- Modal -->

        <?php $this->load->view('page/footer'); ?>

</body>

    <!--   Core JS Files   -->
    <?php $this->load->view('page/js'); ?>

<script type="text/javascript">
    	$(document).ready(function(){
            $("#table-ah").dataTable({
                buttons: [
        'copy', 'excel', 'pdf'
    ]
            });
    	});
    
    
    

        
    </script>
</html>
