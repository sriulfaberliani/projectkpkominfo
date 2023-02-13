<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi</h1>

<div class="card shadow mb-4">

    <div class="card-body">
    <p class="h5">Detail Surat Masuk</p>  
     <div class="card-body">

     <div class="mb-3 row">
      <table class= "table">
      <tr>
        <th> Tanggal Surat</th>
        <td><?php echo $detail['tgl_suratmasuk'] ?> </td>   
        <tr>
          <th> No Surat</th>
          <td><?php echo $detail['no_suratmasuk'] ?> </td>   
        <tr>
        <th> Perihal</th>
          <td><?php echo $detail['perihal_sm'] ?> </td>   
        <tr>
          <th> Ringkasan</th>
          <td><?php echo $detail['agenda_suratmasuk'] ?> </td>  
        <tr>
          <th> File Surat</th>
          
          <td> <a href="<?= base_url('public/filesurat/'. $detail['file_surat'])?>" target="_blank"><i class="fa fa-file-pdf fa-2x label-danger"></i></a>
             </td>  
        <tr>

        <th> <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTambah">
    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Catatan Disposisi</span>
               </button>
              </th>
          <td>    </td>  
        <tr>
       



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
                               <h5 class="modal-title">Tambah Disposisi</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                           </div>
                           <div class="modal-body">
                               <form action="<?= base_url('disposisi/tambah'); ?>" method="post" enctype="multipart/form-data"> 
                               <div class="form-group ab-0 ab0">
                                 <label for="id_status"></label>
                                    Jenis Surat
                                 <select name="id_status" id="id_status" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <?php foreach($status as $key => $value) : ?>
                                    <option value="<?= $value['id_status']; ?>"><?= $value['status']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0 ab0">
                                 <label for="id_sifat"></label>
                                    Jenis Surat
                                 <select name="id_sifat" id="id_sifat" class="form-control" required>
                                    <option value="">Pilih Sifat</option>
                                    <?php foreach($sifat_dispo as $key => $value) : ?>
                                    <option value="<?= $value['id_sifat']; ?>"><?= $value['nama_sifat']; ?></option>
                                  <?php endforeach; ?>
                                    </select>
                               </div>
                               <div class="form-group ab-0">
                                 <label for="catatan_sm"></label>
                                 Catatan Disposisi
                                 <textarea name="catatan_sm" id="catatan_sm" rows="10" class="form-control" placeholder="Masukkan Catatan Disposisi" required></textarea>
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


