<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Surat Masuk</h1>

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
   
                    
 
            
               
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Asal</th>
                        <th>Perihal</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
               
                                   <tr>
                                   
                                       <td>cccc</td>
                                       <td>17 Januari 2022</td>
                                       <td>BPD</td>
                                       <td>Kerja Sama</td>

                                       <td>
                                       <a class="btn btn-primary" href="disposisi/statusDisposisi" role="button">Disposisi</a>
                                       
                                       </td>
                                      
                                   </tr>
                                 
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

