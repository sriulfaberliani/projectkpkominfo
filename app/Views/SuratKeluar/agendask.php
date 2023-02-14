<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Surat Keluar Diskominfo Payakumbuh </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
        
</div>
    <div class="card-header py-3">
    
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Surat Keluar</th>
                        <th>Jenis Surat</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal Masuk</th>
                        <th>Detail Surat</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($suratkeluar_agenda as $row) :?>
                                   <tr>
                                     
                                       <td><?= $row['id_suratkeluar']; ?></td>
                                       <td><?= $row['nama_jenis_surat']; ?></td>
                                       <td><?= $row['no_suratkeluar']; ?></td>
                                      <td><?= $row['perihal']; ?></td>
                                       <td><?= $row['tgl_pembuatansk']; ?></td>
                                       <td> <a href="<?= base_url('suratkeluar/detail/'.$row['id_suratkeluar']); ?>" target="_blank"><i class="fa fa-file-pdf fa-2x label-danger"></i></a>
                                      </td>
                                      
                                   </tr>
                                   <?php $i++; ?>
                                   <?php  endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

