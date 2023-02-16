<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi</h1>

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

    <div class="card-body">
    <p class="h5">Detail Surat Keluar</p>  
     <div class="card-body">

     <div class="mb-3 row">
      <table class= "table">
      <tr>
        <th> Tanggal Surat</th>
        <td><?php echo $detail['tgl_pembuatansk'] ?> </td>   
        <tr>
          <th> No Surat</th>
          <td><?php echo $detail['no_suratkeluar'] ?> </td>   
        <tr>
        <th> Perihal</th>
          <td><?php echo $detail['perihal'] ?> </td>   
        <tr>
        <tr>
          <th> Detail Surat</th>
          
          <td> <a href="<?= base_url('suratkeluar/detail/'.$detail['id_suratkeluar']); ?>" ><i class="fa fa-file-pdf fa-2x label-danger"></i></a>
             </td>  
        <tr>
          
        <?php
         if (session()->get('id_role') != '6') { ?>
        <th> <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTambahDisposisi" data-id_suratkeluar="<?= $detail['id_suratkeluar']; ?>" id="btn-dispo">
    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Disposisi</span>
               </button>
               
              </th>
              <?php } ?>
          <td>    </td>  
        <tr>
      </table>

     </div>
               
               
   </div>

   

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->
 

<div class="container">
    <div class="row">
        <div class="col-md-12"><p class="h3 mb-2 text-gray-800">Timeline Disposisi</p>
        <div class="card shadow mb-4">
            <div class="card">

                <div class="card-body">
                <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Disposisi</th>
                        <th>Pengirim</th>
                        <th>Catatan Disposisi</th>
                        <th>Status Disposisi</th>
                        
                    </tr>
                </thead> 
                <tbody>
                <?php $i=1; ?>
                                    <?php  foreach($disposisi_sk_by_id_sk as $row) :?>
                                   <tr>
                                     
                                    <td scope="row"><?= $i; ?></td>  
                                    <td><?= $row['tgl_disposisi_sk']; ?></td>   
                                    <td><?= $row['nama_pegawai']; ?></td>
                                    <td><?= $row['catatan_sk']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                      

                                    
                          
                                      
                                   </tr>
                                   <?php $i++; ?>
                                   <?php  endforeach;?>
                                    
                                      
                                  
                </tbody>
            </table>
        </div>
                    
                </div>
            </div>
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
                                    <?php foreach($datastatus as $key => $value) : 
                                      if (session()->get('id_role') != '2' && $value['id_status'] == 0 ) {
                                      ?>
                                    <option value="<?= $value['id_status']; ?>"><?= $value['status']; ?></option>
                                      <?php
                                      } else if (session()->get('id_role') == '2' && in_array($value['id_status'], [1,2])){
                                        ?>
                                        <option value="<?= $value['id_status']; ?>"><?= $value['status']; ?></option>
                                        <?php
                                      }
                                  endforeach; ?>
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
                               <?php
                                   if (session()->get('id_role') == '3') { ?>
                               <div class="form-group ab-0">
                                  <label for="tujuan_dispo_sk">Tujuan</label>
                                  <select name="tujuan_dispo_sk" id="tujuan_dispo_sk" class="form-control">
                                    <option value="">Tujuan Disposisi</option>
                                    <?php foreach($userjabatan as $value) :
                                        if (session()->get('id_role') == 4 && $value['id_role'] == 3) {
                                            echo '<option value="'.$value['id_user'].'">'.$value['nama_jabatan'].' - '.$value['nama_pegawai'].'</option>';
                                        } elseif (session()->get('id_role') == 3 && $value['id_role'] == 2) {
                                            echo '<option value="'.$value['id_user'].'">'.$value['nama_jabatan'].' - '.$value['nama_pegawai'].'</option>';
                                        }
                                    endforeach; ?>
                                  </select>
                                </div>
                                <?php } ?>
                                <?php
                                   if (session()->get('id_role') == '2') { ?>
                                   <div class="form-group ab-0">
                                      <label for="tujuan_dispo_sk">Tujuan</label>
                                      <input hidden type="text" name="tujuan_dispo_sk" id="tujuan_dispo_sk" class="form-control" value="<?php echo (session()->get('id_role') == 2 ? '18' : ''); ?>" readonly>
                                  </div>
                                   <?php } ?>

                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary" id="submitButtonDispo" >Tambah Data</button>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>

<!-- End of Main Content -->


