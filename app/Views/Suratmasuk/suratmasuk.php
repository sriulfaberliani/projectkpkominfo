<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Surat Masuk Diskominfo Payakumbuh </h1>


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
        if (session()->get('id_role') == '6') { ?>
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
                        <th>Tanggal Masuk</th>
                        <th>Perihal</th>
                        <th>Ringkasan</th>
                        <th>File Surat</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($suratmasuk as $row) :?>
                                   <tr>
                                     
                                       <td scope="row"><?= $i; ?></td>
                                       <td><?= $row['nama_jenis_surat']; ?></td>
                                       <td><?= $row['no_suratmasuk']; ?></td>
                                       <td><?= $row['tgl_suratmasuk']; ?></td>
                                       <td><?= $row['perihal_sm']; ?></td>
                                       <td><?= $row['agenda_suratmasuk']; ?></td>
                                       <td>
                                        <a href="<?= base_url('public/filesurat/'. $row['file_surat'])?>" target="_blank"><i class="fa fa-file-pdf fa-2x label-danger"></i></a>
                                    </td>

                                    
                                    <td>
                                        
                                        <?php
                                                if (session()->get('id_role') == '6') { ?>
                                          <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalTambahDisposisi" data-id_suratmasuk="<?= $row['id_suratmasuk']; ?>" id="btn-dispo">
                               
                               <i class="fas fa-share"></i>
                          </span>
                               
                          </button>
                                       <button type="button"  data-toggle="modal" data-target="#modalUbah" 
                                       id="btn-edit" class="btn btn-success"
                                       data-id_suratmasuk="<?= $row['id_suratmasuk']; ?>" 
                                       data-nama_jenis_surat="<?= $row['nama_jenis_surat']; ?>" 
                                       data-no_suratmasuk="<?= $row['no_suratmasuk']; ?>" 
                                       data-tgl_suratmasuk="<?= $row['tgl_suratmasuk']; ?>" 
                                       data-agenda_suratmasuk="<?= $row['agenda_suratmasuk']; ?>"  
                                       data-file_surat="<?= $row['file_surat'];?>">
                                  
                                    <i class="fas fa-edit"></i>
                                </span>
                                 </button>
                                       <button type="button" class="btn btn-danger" data-id_suratmasuk="<?= $row['id_suratmasuk']; ?>" data-toggle="modal" data-target="#modalHapus" id="btn-hapus">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <i data-id_suratmasuk="<?= $row['id_suratmasuk']; ?>"> 
                                       </button>

                                        <?php } ?>                
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
                               <h5 class="modal-title">Tambah Surat Masuk</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('suratmasuk/tambah'); ?>" method="post" enctype="multipart/form-data"> 
                               <!-- <div class="form-group ab-0 ab-0">
                                 <label for="id_pegawai"></label>
                                 <input readonly type="text" name="id_pegawai" id="id_pegawai" class="form-control" placeholder="ID Pegawai" >
                               </div> -->
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
                                 <label for="no_suratmasuk"></label>
                                 Nomor Surat
                                 <input type="text" name="no_suratmasuk" id="no_suratmasuk" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="perihal_sm"></label>
                                 Perihal
                                 <input type="text" name="perihal_sm" id="perihal_sm" class="form-control" placeholder="Masukkan Perihal" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="agenda_suratmasuk"></label>
                                 Ringkasan Surat
                                 <textarea name="agenda_suratmasuk" id="agenda_suratmasuk" rows="10" class="form-control" placeholder="Masukkan Ringkasan" required></textarea>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="file_surat"></label>
                                    File Surat
                                 <input type="file" name="file_surat" id="file_surat" class="form-control" placeholder="Masukkan File Surat" required>
                                 <small class="text-danger">*File Surat Harus Berformat PDF</small>
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
      <form action="/suratmasuk/hapus" method="post">
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini?
          <input type="hidden" id="id_suratmasuk" name="id_suratmasuk">
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
                               <form action="<?= base_url('suratmasuk/ubah'); ?>" method="post" enctype="multipart/form-data"> 
                               <input type="hidden" name="id_suratmasuk" id="id_suratmasuk">
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
                                 <label for="no_suratmasuk"></label>
                                 Nomor Surat
                                 <input type="text" name="no_suratmasuk" id="no_suratmasuk" class="form-control" placeholder="Masukkan Nomor Surat" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="tgl_suratmasuk"></label>
                                 Tanggal Surat Masuk
                                 <input readonly type="text" name="tgl_suratmasuk" id="tgl_suratmasuk" class="form-control" placeholder="Tanggal" required >
                               </div>
                               <div class="form-group ab-0">
                                 <label for="agenda_suratmasuk"></label>
                                 Ringkasan Surat
                                 <textarea name="agenda_suratmasuk" id="agenda_suratmasuk" rows="10" class="form-control" placeholder="Masukkan Ringkasan" required></textarea>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="file_surat"></label>
                                    Ganti File Surat
                                    <a href="<?= base_url('public/filesurat/'. $row['file_surat'])?>" target="_blank">Lihat File Surat</a> 
                                 <input type="file" name="file_surat" id="file_surat" class="form-control" placeholder="Masukkan File Surat"> required>
                                 <small class="text-danger">*File Surat Harus Berformat PDF</small>
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
                               <form action="<?= base_url('Disposisi/teruskan'); ?>" method="post" enctype="multipart/form-data"> 
                                 <input type="text" name="id_suratmasuk" id="id_suratmasuk" class="form-control"   >
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
                                 <label for="catatan_sm"></label>
                                 Catatan Disposisi
                                 <textarea rows="3" name="catatan_sm" id="catatan_sm" class="form-control" placeholder="Masukan Catatan Disposisi"  ></textarea>
                               </div>
                              <div class="form-group ab-0">
                                 <label for="tujuan_dispo_sm"></label>
                                 Tujuan
                                 <select name="tujuan_dispo_sm" id="tujuan_dispo_sm" class="form-control" >
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

