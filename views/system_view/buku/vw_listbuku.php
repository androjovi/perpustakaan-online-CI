<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<!-- load sidebar in page/sidebar -->
<?php $this->load->view('page/sidebar'); ?>

<!-- Load navbar in page/navbar -->
<?php $this->load->view('page/navbar'); ?>

<script>
   function cek_nis(str){
       
       var data = str;
       console.log(str);
       return data;
       
      
   }
    
    function hapus_confirm(){
  var msg;
  msg= "Data ingin dihapus, Anda yakin ? " ;
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
                                    <h4 class="card-title">List buku tersimpan</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover" id="table-ah">
                                        <thead>
                                            <th>Kode buku</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($query as $k): ?>
                                            <tr>
                                                <td><?php echo $k->kode_buku; ?></td>
                                                <td><?php echo $k->judul_buku; ?></td>
                                                <td><?php echo $k->kategori_buku; ?></td>
                                                <td><?php echo $k->pengarang_buku; ?></td>
                                                <td><?php echo $k->penerbit_buku; ?></td>
                                                <td><a href="<?php echo site_url('buku/edit/'.$k->kode_buku) ?>" class="btn btn-primary btn-xs" ><i class="pe-7s-edit"></i> EDIT</a>&nbsp;<a href="<?php echo site_url('buku/hapus/'.$k->kode_buku); ?>" class="btn btn-danger btn-xs" onclick="return hapus_confirm()"><i class="pe-7s-shield"></i> HAPUS</a></td>
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

        <?php $this->load->view('page/footer'); ?>

</body>

    <!--   Core JS Files   -->
    <?php $this->load->view('page/js'); ?>

<script type="text/javascript">$(document).ready(function(){$("#table-ah").dataTable();});</script>
</html>
