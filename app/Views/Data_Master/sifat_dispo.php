<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data <?= $title ?> Diskominfo Payakumbuh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
    <?php 
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)){ ?>
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">Terjadi Kesalahan!</h5>
            <ul>
                <?php foreach ($errors as $key => $value) { ?>
                <li><?= esc($value) ?></li>
                <?php } ?>
            </ul>
        </div>
        <?php } 
        if(session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>berhasil</strong> <?= session()->getFlashdata('message'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
<?php endif; ?>
</div>

<div class="card-header py-3">
    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTambah">
    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
               </button> 
               </div>
               
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Sifat</th>
                        <th>Action</th>
                        
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($datasifat as $row) :?>
                                   <tr>
                                      <td scope="row"><?= $i; ?></td>
                                       <td><?= $row['nama_sifat']; ?></td>
                                      
                                      
                                       <td>

                                       <button type="button"  data-toggle="modal" data-target="#modalUbah" 
                                      id="btn-edit" class="btn btn-success"
                                       data-id_sifat="<?= $row['id_sifat']; ?>" data-nama_sifat="<?= $row['nama_sifat']; ?>" >
                                    
                                    <i class="fas fa-edit"></i>
                                </span>
                               
                                 </button>


                                        <button type="button" class="btn btn-danger" data-id_sifat="<?= $row['id_sifat']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus"
                                        >
                                    
                                    <i class="fas fa-trash"></i>
                                </span>
                             
                                       </button>
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

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Tambah Data Sifat</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datasifat/tambah'); ?>" method="post"> 
                               <div class="form-group ab-0 ab-0">
                                Sifat Disposisi
                                 <label for="nama_sifat"></label>
                                 <input type="text" name="nama_sifat" id="nama_sifat" class="form-control" placeholder="Masukkan Sifat Disposisi" >
                               </div>
                  
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Tambah Data</button>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>

<!-- Modal Ubah Data-->
<div class="modal fade" id="modalUbah">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah Data</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <a href="/datasifat/ubah"> </a>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datasifat/ubah'); ?>" method="post"> 
                                 <input hidden type="text" name="id_sifat" id="id_sifat" class="form-control" value="<?= $row['id_sifat'] ?>" >
                                 <div class="form-group ab-0 ab-0">
                               Sifat Disposisi
                                 <label for="nama_sifat"></label>
                                 <input type="text" name="nama_sifat" id="nama_sifat" class="form-control" placeholder="Masukkan Nama Sifat Baru" value="<?= $row['nama_sifat'] ?>" >
                               </div>
                            
                               
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Ubah Data</button>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>

<!-- Modal Hapus Data-->
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/datasifat/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_sifat" name="id_sifat">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>
