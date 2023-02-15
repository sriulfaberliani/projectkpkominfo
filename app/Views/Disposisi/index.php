<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Surat Masuk Diskominfo Payakumbuh </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
        <?php if(session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>berhasil</strong> <?= session()->getFlashdata('message'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
<?php endif; ?>

</div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($disposisi_sm as $row) :?>
                                   <tr>
                                     
                                    <td scope="row"><?= $i; ?></td>  
                                    <td><?= $row['no_suratmasuk']; ?></td>   
                                    <td><?= $row['perihal_sm']; ?></td>
                                    <td><?= $row['tanggal_disposisi_sm']; ?></td>
                                    <td>
            <?php if ($status == true) : ?>
                <span class="badge badge-pill badge-success">Sudah Terdisposisi</span>
                <?php else: ?>
            <span class="badge badge-pill badge-warning">Belum Terdisposisi</span>
            <?php endif; ?>
        </td>
                                      

                                    
                                    <td>
                                        <a class="btn btn-primary btn-icon-split" href= "<?= base_url('Disposisi/statusDisposisi/'.$row['id_suratmasuk']); ?>" role="button"><span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>   </span> <span class="text">Detail</span></a>
                                 

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

