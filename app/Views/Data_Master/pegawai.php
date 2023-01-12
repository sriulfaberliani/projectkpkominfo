<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pegawai Diskominfo Payakumbuh</h1>

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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>19877482974738</td>
                        <td>Padang</td>
                        <td>08127823682</td>
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
                        <td>Garrett Winters</td>
                        <td>19877482974738</td>
                        <td>Padang</td>
                        <td>08127823682</td>
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
                        <td>Ashton Cox</td>
                        <td>19877482974738</td>
                        <td>Padang</td>
                        <td>08127823682</td>
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
                        <td>Cedric Kelly</td>
                        <td>19877482974738</td>
                        <td>Padang</td>
                        <td>08127823682</td>
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

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Tambah</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="" method="post"> 
                               <div class="form-group ab-0 ab-0">
                                 <label for="id_anggota"></label>
                                 <input type="text" name="id_anggota" id="id_anggota" class="form-control" placeholder="Masukkan Id Anggota" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="no_registrasi"></label>
                                 <input type="text" name="no_registrasi" id="no_registrasi" class="form-control" placeholder="Masukkan No Registrasi" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="id_jurusan"></label>
                                 <input type="text" name="id_jurusan" id="id_jurusan" class="form-control" placeholder="Masukkan Id Jurusan" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nama_anggota"></label>
                                 <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" placeholder="Masukkan Nama Anggota" >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="no_induk"></label>
                                 <input type="text" name="no_induk" id="no_induk" class="form-control" placeholder="Masukkan No Induk Anggota" >
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