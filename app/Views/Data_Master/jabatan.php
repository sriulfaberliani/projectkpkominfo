<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Jabatan Diskominfo Payakumbuh</h1>

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
                    <tr>
                        <td>1190</td>
                        <td>System Analyst</td>
                        <td>
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                             </button>
                             <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus">
                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                             </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1178</td>
                        <td>Programmer</td>
                        <td>
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                             </button>
                             <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus">
                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                             </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1667</td>
                        <td>Programmer</td>
                        <td>
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                             </button>
                             <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus">
                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                             </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1187</td>
                        <td>System Analyst</td>
                        <td>
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                             </button>
                             <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus">
                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                             </button>
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
                               <h5 class="modal-title">Tambah Data Pegawai</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="" method="post"> 
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Nama Jabatan" >
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

<!-- Modal Ubah Data Siswa -->
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
                                 <input readonly type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Nama Jabatan Baru" value="" >
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