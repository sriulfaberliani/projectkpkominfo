<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data <?= $title ?> Diskominfo Payakumbuh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
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
                        <th>ID Jabatan</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($jabatan as $row) :?>
                                   <tr>
                                     
                                       <td><?= $row['id_jabatan']; ?></td>
                                       <td><?= $row['nama_jabatan']; ?></td>
                                    
                                      
                                       <td>
                                       <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah"  id="btn-edit"
                                       data-id_jabatan="<?= $row['id_jabatan']; ?>" data-nama_jabatan="<?= $row['nama_jabatan']; ?>">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                                </button>
                             
                                <button type="button" class="btn btn-danger btn-icon-split" data-id_jabatan="<?= $row['id_jabatan']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus"
                                        >
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span> 
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
                               <h5 class="modal-title">Tambah Data Jabatan</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datajabatan/tambah'); ?>" method="post"> 
                               <!-- <div class="form-group ab-0 ab-0">
                                 <label for="id_jabatan"></label>
                                 <input readonly type="text" name="id_jabatan" id="id_jabatan" class="form-control" placeholder="ID Jabatan" >
                               </div> -->
                               <div class="form-group ab-0 ab-0">
                                 <label for="nama_jabatan"></label>
                                 <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="Masukkan Nama Jabatan" >
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

<!-- Modal Ubah Data  -->
<div class="modal fade" id="modalUbah">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah Data</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <a href="/datajabatan/ubah"> </a>
                           </div>
                           <div class="modal-body">
                                <form action="<?= base_url('datajabatan/ubah'); ?>" method="post"> 
                            ID Jabatan
                                <div class="form-group ab-0 ab-0">
                                    <label for="id_jabatan"></label>
                                    <input readonly type="text" name="id_jabatan" id="id_jabatan" class="form-control" placeholder="ID Jabatan" value="<?= $row['id_jabatan'] ?>" >
                                
                               <div class="form-group ab-0 ab-0">
                                 <label for="nama_jabatan"></label>
                                 <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="Masukkan Nama Jabatan Baru" value="<?= $row['nama_jabatan'] ?>" >
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
      <form action="<?= base_url('datajabatan/hapus'); ?>" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_jabatan" name="id_jabatan">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>
