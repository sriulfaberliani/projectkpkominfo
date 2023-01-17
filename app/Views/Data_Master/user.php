<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Data User Diskominfo Payakumbuh </h1>


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
                        <th>ID User</th>
                        <th>Nama Pegawai</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($datauser as $row) :?>
                                   <tr>
                                     
                                       <td><?= $row['id_user']; ?></td>
                                       <td><?= $row['nama_pegawai']; ?></td>
                                       <td><?= $row['level']; ?></td>
                                       <td><?= $row['username']; ?></td>
                                       <td><?= $row['password']; ?></td>

                                       <td>

                                       <button type="button" class="btn btn-danger btn-icon-split" data-id_user="<?= $row['id_user']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span> <i data-id_user="<?= $row['id_user']; ?>"> 
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
                               <h5 class="modal-title">Tambah Data User</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datauser/tambah'); ?>" method="post"> 
                               <!-- <div class="form-group ab-0 ab-0">
                                 <label for="id_jbpg"></label>
                                 <input readonly type="text" name="id_jbpg" id="id_jbpg" class="form-control" value="Id Jabatan Pegawai" >
                               </div> -->
                               <div class="form-group ab-0 ab0">
                                 <label for="id_pegawai"></label>
                                 <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                    <option value="">Pilih NIP Pegawai</option>
                                    <?php foreach($datapegawai as $row) : ?>
                                    <option value="<?= $row['id_pegawai']; ?>"><?= $row['nip']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               </div>
                               <!-- <div class="form-group ab-0">
                                 <label for="nama_pegawai"></label>
                                 <input readonly required type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" >
                               </div> -->
                               <div class="form-group ab-0">
                                 <label for="id_role"></label>
                                 <select name="id_role" id="id_role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <?php foreach($datarole as $row) : ?>
                                    <option value="<?= $row['id_role']; ?>"><?= $row['level']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="username"></label>
                                 <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="password"></label>
                                 <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password" required >
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

<!-- !-- Modal Hapus Data--> 
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/datauser/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_user" name="id_user">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>
