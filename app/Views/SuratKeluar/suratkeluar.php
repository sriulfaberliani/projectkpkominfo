<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Surat Keluar Diskominfo Payakumbuh </h1>


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
<?php
        if (session()->get('id_role') == '6' || session()->get('id_role') == '3') { ?>
</div>
    <div class="card-header py-3">
    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTambah">
    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
               </button>
    </div>
    <?php } ?>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal Surat</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($suratkeluar as $row) :?>
                                   <tr>
                                     
                                       <td scope="row"><?= $i; ?></td>
                                       <td><?= $row['nama_jenis_surat']; ?></td>
                                       <td><?= $row['no_suratkeluar']; ?></td>
                                       <td><?= $row['perihal']; ?></td>
                                       <td><?= $row['tgl_pembuatansk']; ?></td>

                                    
                                    <td>
                                        
                                        <?php
                                                if (session()->get('id_role') == '4' || session()->get('id_role') == '3') { ?>
                                       <button type="button"  data-toggle="modal" data-target="#modalUbah" 
                                       id="btn-edit" class="btn btn-success btn-icon-split"
                                       data-id_suratkeluar="<?= $row['id_suratkeluar']; ?>" 
                                       data-id_jenis_surat="<?= $row['id_jenis_surat']; ?>"
                                       data-id_user="<?= $row['id_user']; ?>"
                                       data-no_suratkeluar="<?= $row['no_suratkeluar']; ?>"
                                       data-perihal="<?= $row['perihal']; ?>"
                                       data-tgl_pembuatansk="<?= $row['tgl_pembuatansk']; ?>"
                                       data-lampiran="<?= $row['lampiran']; ?>"
                                       data-tujuan_sk="<?= $row['tujuan_sk']; ?>"
                                       data-isi_sk="<?= $row['isi_sk']; ?>"
                                       data-jabatan_pembuatsurat="<?= $row['jabatan_pembuatsurat']; ?>"
                                       data-nama_pembuatsurat="<?= $row['nama_pembuatsurat']; ?>"
                                       data-nip_pembuatsurat="<?= $row['nip_pembuatsurat']; ?>" >
                                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                                 </button>

                                       <button type="button" class="btn btn-danger btn-icon-split" data-id_suratkeluar="<?= $row['id_suratkeluar']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span> <i data-id_suratkeluar="<?= $row['id_suratkeluar']; ?>"> 
                                       </button><br>

                                        <?php } ?>
                                        
                                <a class="btn btn-warning btn-icon-split" href="<?= base_url('suratkeluar/detail/'.$row['id_suratkeluar']); ?>" role="button"><span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>  <span class="text">Detail Surat</span></a>

                                <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTambahDisposisi" data-id_suratkeluar="<?= $row['id_suratkeluar']; ?>" id="btn-dispo">
                                <span class="icon text-white-50">
                                      <i class="fas fa-share"></i>
                                 </span>
                                       <span class="text">Teruskan</span>
                                 </button>
                                </div>
                                   
                                       
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
                               <h5 class="modal-title">Tambah Surat Keluar</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('suratkeluar/tambah'); ?>" method="post" enctype="multipart/form-data"> 
                               <div class="form-group ab-0 ab0">
                                 <label for="id_jenis_surat"></label>
                                    Jenis Surat
                                 <select name="id_jenis_surat" id="id_jenis_surat" class="form-control" required>
                                    <option value="">Pilih Jenis Surat</option>
                                    <?php foreach($datajenissurat as $key => $value) : ?>
                                    <option value="<?= $value['id_jenis_surat']; ?>"><?= $value['nama_jenis_surat']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="no_suratkeluar"></label>
                                 Nomor Surat
                                 <input type="text" name="no_suratkeluar" id="no_suratkeluar" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="lampiran"></label>
                                 Lampiran
                                 <input type="text" name="lampiran" id="lampiran" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="perihal"></label>
                                 Perihal
                                 <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="tujuan_sk"></label>
                                 Tujuan
                                 <input type="text" name="tujuan_sk" id="tujuan_sk" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="isi_sk"></label>
                                 Isi Surat
                                 <textarea name="isi_sk" id="isi_sk" rows="10" class="form-control" placeholder="Masukkan Ringkasan" required></textarea>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nama_pembuatsurat"></label>
                                 Nama Pembuat Surat
                                 <input type="text" name="nama_pembuatsurat" id="nama_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nip_pembuatsurat"></label>
                                 NIP
                                 <input type="text" name="nip_pembuatsurat" id="nip_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="jabatan_pembuatsurat"></label>
                                 Jabatan
                                 <input type="text" name="jabatan_pembuatsurat" id="jabatan_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat" required >
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
      <form action="/suratkeluar/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_suratkeluar" name="id_suratkeluar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Ubah Data</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('suratkeluar/ubah'); ?>" method="post" enctype="multipart/form-data"> 
                               <input type="hidden" name="id_suratkeluar" id="id_suratkeluar">
                               <div class="form-group ab-0 ab0">
                                 <label for="id_jenis_surat"></label>
                                    Jenis Surat
                                 <select name="id_jenis_surat" id="id_jenis_surat" class="form-control" >
                                    <option value="">Pilih Jenis Surat</option>
                                    <?php foreach($datajenissurat as $key => $value) : ?>
                                    <option value="<?= $value['id_jenis_surat']; ?>"><?= $value['nama_jenis_surat']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="no_suratkeluar"></label>
                                 Nomor Surat
                                 <input type="text" name="no_suratkeluar" id="no_suratkeluar" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="lampiran"></label>
                                 Lampiran
                                 <input type="text" name="lampiran" id="lampiran" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="perihal"></label>
                                 Perihal
                                 <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="tujuan_sk"></label>
                                 Tujuan
                                 <input type="text" name="tujuan_sk" id="tujuan_sk" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="isi_sk"></label>
                                 Isi Surat
                                 <textarea name="isi_sk" id="isi_sk" rows="10" class="form-control" placeholder="Masukkan Ringkasan" ></textarea>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nama_pembuatsurat"></label>
                                 Nama Pembuat Surat
                                 <input type="text" name="nama_pembuatsurat" id="nama_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="nip_pembuatsurat"></label>
                                 NIP
                                 <input type="text" name="nip_pembuatsurat" id="nip_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat"  >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="jabatan_pembuatsurat"></label>
                                 Jabatan
                                 <input type="text" name="jabatan_pembuatsurat" id="jabatan_pembuatsurat" class="form-control" placeholder="Masukkan Nomor Surat"  >
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

<!-- Modal Tambah Disposisi-->
<div class="modal fade" id="modalTambahDisposisi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Disposisi</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('DisposisiSk/teruskan'); ?>" method="post" enctype="multipart/form-data"> 
                                 <input hidden type="text" name="id_suratkeluar" id="id_suratkeluar" class="form-control"   >
                              <div class="form-group ab-0">
                              <label for="id_status"></label>
                                    Status Surat
                                 <select name="id_status" id="id_status" class="form-control" >
                                    <option value="">Pilih Status</option>
                                    <?php foreach($datastatus as $key => $value) : ?>
                                    <option value="<?= $value['id_status']; ?>"><?= $value['status']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                              <div class="form-group ab-0">
                                 <label for="id_sifat"></label>
                                 Sifat Surat
                                 <select name="id_sifat" id="id_sifat" class="form-control" >
                                    <option value="">Pilih Sifat</option>
                                    <?php foreach($datasifat as $key => $value) : ?>
                                    <option value="<?= $value['id_sifat']; ?>"><?= $value['nama_sifat']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                              <div class="form-group ab-0">
                                 <label for="catatan_sk"></label>
                                 Catatan Disposisi
                                 <textarea rows="3" name="catatan_sk" id="catatan_sk" class="form-control" placeholder="Masukan Catatan Disposisi"  ></textarea>
                               </div>
                              <div class="form-group ab-0">
                                 <label for="tujuan_dispo_sk"></label>
                                 Tujuan
                                 <select name="tujuan_dispo_sk" id="tujuan_dispo_sk" class="form-control" >
                                    <option value="">Tujuan Disposisi</option>
                                    <?php foreach($datauser as $key => $value) : ?>
                                    <option value="<?= $value['id_user']; ?>"><?= $value['nama_pegawai']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary" id="submitButtonDispo" >Tambah Data</button>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>




