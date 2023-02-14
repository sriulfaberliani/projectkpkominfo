
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Data Jabatan Pegawai Diskominfo Payakumbuh </h1>


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
                                   <td scope="row"><?= $i; ?></td>
                                       <td><?= $row['nama_pegawai']; ?></td>
                                       <td><?= $row['nip']; ?></td>
                                       <td><?= $row['nama_jabatan']; ?></td>

                                       <td>

                                       <button type="button"  data-toggle="modal" data-target="#modalUbah" 
                                       id="btn-edit" class="btn btn-success"
                                       data-id_jabatan_pegawai="<?= $row['id_jabatan_pegawai']; ?>" data-nama_pegawai="<?= $row['nama_pegawai']; ?>" data-id_pegawai="<?= $row['id_pegawai']; ?>" data-nip="<?= $row['nip']; ?>" data-nama_jabatan="<?= $row['nama_jabatan']; ?>" >
                                   
                                    <i class="fas fa-edit"></i>
                                </span>
                                
                                 </button>


                                <button type="button" class="btn btn-danger " data-id_jabatan_pegawai="<?= $row['id_jabatan_pegawai']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                             
                                    <i class="fas fa-trash"></i>
                                </span>
                                <i data-id_jabatan_pegawai="<?= $row['id_jabatan_pegawai']; ?>"> 
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
                               <label>NIP</label>
                                 <label for="id_pegawai"></label>
                                 <select name="id_pegawai" id="id_pegawai" class="form-control" required> 
                                    <option value="">Pilih NIP Pegawai</option>
                                    <?php foreach($pegawai as $key => $value) : ?>
                                    <option value="<?= $value['id_pegawai']; ?>"><?= $value['nip']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               </div>
                               <!-- <div class="form-group ab-0">
                                 <label for="nama_pegawai"></label>
                                 <input readonly required type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" >
                               </div> -->
                               <div class="form-group ab-0">
                               <label>Jabatan</label>
                                 <label for="id_jabatan"></label>
                                 <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach($jabatan as $key => $value) : ?>
                                    <option value="<?= $value['id_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
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


<!-- Modal Ubah-->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah data</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   <a href="/datajabatanpegawai/ubah<?= $row['id_jabatan_pegawai']; ?>"> </a>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('datajabatanpegawai/ubah'); ?>" method="post">
                               <input type="hidden" name="id_jabatan_pegawai" id="id_jabatan_pegawai">
                                 <input  type="hidden" name="id_pegawai" id="id_pegawai" class="form-control" value="<?= $row['id_pegawai'] ?>" >
                                <div class="form-group ab-0">
                                 <label>NIP</label>
                                 <label for="nip"></label>
                                 <input readonly type="text" name="nip" id="nip" class="form-control" >
                               </div>
                               <div class="form-group ab-0">
                               <label>Nama</label>
                                 <label for="nama_pegawai"></label>
                                 <input readonly type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" >
                               </div>
                               <div class="form-group ab-0">
                               <label>Jabatan</label>
                                 <label for="id_jabatan"></label>
                                 <select name="id_jabatan" class="form-control" required>
                                    <option value="" hidden>Pilih Jabatan</option>
                                    <?php foreach($jabatan as $key => $value) : ?>
                                    <option value="<?= $value['id_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
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

