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
                        <th>ID Pegawai</th>
                    
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($datapegawai as $row) :?>
                                   <tr>
                                   
                                       <td><?= $row['id_pegawai']; ?></td>
                                       <td><?= $row['nama_pegawai']; ?></td>
                                       <td><?= $row['nip']; ?></td>
                                       <td><?= $row['alamat']; ?></td>
                                       <td><?= $row['no_hp']; ?></td>
                                      
                                       <td>
                                       <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                                <i data-id_pegawai="<?= $row['id_pegawai']; ?>"  data-nama_pegawai="<?= $row['nama_pegawai']; ?>" data-nip="<?= $row['nip']; ?>" data-alamat="<?= $row['alamat']; ?>" 
                                        data-no_hp="<?= $row['no_hp']; ?>"></i> </button>


                                        <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span> <i data-id_pegawai="<?= $row['id_pegawai']; ?>"> 
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
                               <h5 class="modal-title">Tambah Data Pegawai</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datapegawai/tambah'); ?>" method="post"> 
                               <!-- <div class="form-group ab-0 ab-0">
                                 <label for="id_pegawai"></label>
                                 <input readonly type="text" name="id_pegawai" id="id_pegawai" class="form-control" placeholder="ID Pegawai" >
                               </div> -->
                               <div class="form-group ab-0 ab-0">
                                 <label for="nama_pegawai"></label>
                                 <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Masukkan Nama Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nip"></label>
                                 <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="alamat"></label>
                                 <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="no_hp"></label>
                                 <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan Kontak Pegawai" >
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
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah </h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <a href="/datapegawai/ubah"> </a>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datapegawai/ubah'); ?>" method="post"> 
                               <input type="hidden" name="id_pegawai" id="id_pegawai">
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_pegawai"></label>
                                 <input readonly type="text" name="id_pegawai" id="id_pegawai" class="form-control" placeholder="ID Pegawai" value="<?= $row ['id_pegawai'] ?>" >
                               
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="nama_pegawai"></label>
                                 <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Masukkan Nama Pegawai Baru" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="nip"></label>
                                 <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP Pegawai" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="alamat"></label>
                                 <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Pegawai" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="no_hp"></label>
                                 <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan Kontak Pegawai" value="" >
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
      <form action="/datapegawai/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_pegawai" name="id_pegawai">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>
