<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Data Jabatan Pegawai Diskominfo Payakumbuh </h1>


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
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td>19877482974738</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>123456</td>
                        <td>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>19877482974738</td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>123456</td>
                        <td>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>19877482974738</td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>123456</td>
                        <td>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>19877482974738</td>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>123456</td>
                        <td>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
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

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Tambah Data Jabatan Pegawai</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="" method="post"> 
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_jbpg"></label>
                                 <input readonly type="text" name="id_jbpg" id="id_jbpg" class="form-control" value="Id Jabatan Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nip"></label>
                                 <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nama"></label>
                                 <input readonly type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="jabatan"></label>
                                 <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan Pegawai" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="password"></label>
                                 <input type="text" name="password" id="password" class="form-control" placeholder="Password" >
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
                                   <a href="/DataJabatan"> </a>
                           </div>
                           <div class="modal-body">
                               <form action="" method="post"> 
                               <input type="hidden" name="id_anggota" id="id_anggota">
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input readonly type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Nama Pegawai" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input readonly type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan NIP Pegawai" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input readonly type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Alamat Pegawai" value="" >
                               </div>
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input readonly type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Kontak Pegawai" value="" >
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

               <!-- Modal Hapus Data Siswa-->
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_anggota" name="id_anggota">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>