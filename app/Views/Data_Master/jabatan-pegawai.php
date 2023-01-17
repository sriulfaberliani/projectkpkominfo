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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($jabatanPegawai as $row) :?>
                                   <tr>
                                     
                                       <td><?= $row['nama_pegawai']; ?></td>
                                       <td><?= $row['nip']; ?></td>
                                       <td><?= $row['nama_jabatan']; ?></td>

                                       <td>
                                       <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalUbah">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                                <i data-id_jabatan="<?= $row['id_jabatan']; ?>" data-nama_jabatan="<?= $row['nama_jabatan']; ?>"></i> </button>
                             
                                <button type="button" class="btn btn-danger btn-icon-split" data-id_jabatan_pegawai="<?= $row['id_jabatan_pegawai']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span> <i data-id_jabatan_pegawai="<?= $row['id_jabatan_pegawai']; ?>"> 
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
                               <h5 class="modal-title">Tambah Data Jabatan Pegawai</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datajabatanpegawai/tambah'); ?>" method="post"> 
                               <!-- <div class="form-group ab-0 ab-0">
                                 <label for="id_jbpg"></label>
                                 <input readonly type="text" name="id_jbpg" id="id_jbpg" class="form-control" value="Id Jabatan Pegawai" >
                               </div> -->
                               <div class="form-group ab-0 ab0">
                                 <label for="id_pegawai"></label>
                                 <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value="">Pilih NIP Pegawai</option>
                                    <?php foreach($pegawai as $row) : ?>
                                    <option value="<?= $row['id_pegawai']; ?>"><?= $row['nip']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               </div>
                               <!-- <div class="form-group ab-0">
                                 <label for="nama_pegawai"></label>
                                 <input readonly required type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" >
                               </div> -->
                               <div class="form-group ab-0">
                                 <label for="id_jabatan"></label>
                                 <select name="id_jabatan" id="id_jabatan" class="form-control">
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach($jabatan as $row) : ?>
                                    <option value="<?= $row['id_jabatan']; ?>"><?= $row['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
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

<!-- !-- Modal Hapus Data--> 
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/datajabatanpegawai/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_jabatan_pegawai" name="id_jabatan_pegawai">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- <script>
    $('#nip').on('change', (event) =>{
        getM_JabatanPegawai(event.target.value).then(jabatanPegawai =>{
            $('#nama_pegawai').val(jabatanPegawai.nama_pegawai);
        });
    });

    async function getM_JabatanPegawai(id){
        let response = await fetch('/api/DataJabatanPegawai/' + id)
        let data = await response.json();

        return data;
    } -->

