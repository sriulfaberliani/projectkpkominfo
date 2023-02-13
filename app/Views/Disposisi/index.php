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
<div class="card-header py-3">
       
<?php
        if (session()->get('id_role') == '6') { ?>
</div>
   
    <?php } ?>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal Masuk</th>

                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($suratmasuk as $row) :?>
                                   <tr>
                                     
                                      
                                    <td><?= $row['no_suratmasuk']; ?></td>   
                                    <td><?= $row['perihal_sm']; ?></td>
                                    <td><?= $row['tgl_suratmasuk']; ?></td>
                                      

                                    
                                    <td>
                                        <a class="btn btn-primary btn-icon-split" href= "<?= base_url('disposisi/statusDisposisi/'.$row['id_suratmasuk']); ?>" role="button"><span class="icon text-white-50">
                                            <i class="fas fa-share"></i>   </span> <span class="text">Disposisi</span></a>
                                 

                        

                                      
                            
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

