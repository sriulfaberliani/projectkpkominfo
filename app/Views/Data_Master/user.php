<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Data User Diskominfo Payakumbuh </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  
<div class="card-header py-3">
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
              <h5 class="alert-heading">Terjadi Kesalahan</h5>    
              
            <ul>
                    <?php foreach ($errors as $key => $value) { ?>
                        <li><?= esc($value) ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>

            <?php if(session()->getFlashdata('message')) : ?>
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
                                     
                                      <td scope="row"><?= $i; ?></td>
                                       <td><?= $row['nama_pegawai']; ?></td>
                                       <td><?= $row['level']; ?></td>
                                       <td><?= $row['username']; ?></td>
                                       <td><?= $row['password']; ?></td>

                                       <td>

                                       <button type="button"  data-toggle="modal" data-target="#modalUbah" 
                                       id="btn-edit" class="btn btn-success "
                                       data-id_user="<?= $row['id_user']; ?>" data-id_pegawai="<?= $row['id_pegawai']; ?>" data-nama_pegawai="<?= $row['nama_pegawai']; ?>" data-id_role="<?= $row['id_role']; ?>" data-level="<?= $row['level']; ?>" data-username="<?= $row['username']; ?>" data-password="<?= $row['password']; ?>" >
                                    
                                    <i class="fas fa-edit"></i>
                                </span>
                                
                                 </button>

                                       <button type="button" class="btn btn-danger " data-id_user="<?= $row['id_user']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                                    
                                    <i class="fas fa-trash"></i>
                                </span>
                                 <i data-id_user="<?= $row['id_user']; ?>"> 
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
                               <div class="form-group ab-0 ab0">
                                 <label for="id_pegawai"></label>
                                 <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                    <option value="">Pilih Pegawai</option>
                                    <?php foreach($datapegawai as $key => $value) : ?>
                                    <option value="<?= $value['id_pegawai']; ?>">
                                    <?= $value['nama_pegawai']. " - " .$value['nip']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="id_role"></label>
                                 <select name="id_role" id="id_role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <?php foreach($datarole as $key => $value) : ?>
                                    <option value="<?= $value['id_role']; ?>"><?= $value['level']; ?></option>
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



<!-- Modal Ubah-->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah data</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <a href="/datauser/ubah<?= $row['id_user']; ?>"> </a>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datauser/ubah'); ?>" method="post"> 
                               <input hidden type="text" name="id_user" id="id_user" class="form-control"   >
                                 <input  type="hidden" name="id_pegawai" id="id_pegawai" class="form-control"  >
                               <div class="form-group ab-0">
                               <label>Nama</label>
                                 <label for="nama_pegawai"></label>
                                 <input readonly type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" >
                               </div>
                               <div class="form-group ab-0">
                               <label>Role</label>
                                 <label for="id_role"></label>
                                 <select name="id_role" class="form-control" required>
                                    <option value="" hidden>Pilih Role</option>
                                    <?php foreach($datarole as $key => $value) : ?>
                                    <option value="<?= $value['id_role']; ?>"><?= $value['level']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0 ab-0">
                                Username
                                 <label for="username"></label>
                                 <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username"  >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                Password
                                 <label for="password"></label>
                                 <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password" >
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>
