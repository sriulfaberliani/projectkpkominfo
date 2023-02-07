


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?> </h1>

<!-- DataTales Example -->
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
          <th> Ringkasan</th>
          <td><?php echo $detail['agenda_suratmasuk'] ?> </td>  
        <tr>
          <th> File Surat</th>
          
          <td> <a href="<?= base_url('public/filesurat/'. $detail['file_surat'])?>" target="_blank"><i class="fa fa-file-pdf fa-2x label-danger"></i></a>
             </td>  
        <tr>
          <th> Status</th>
          <td> <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Status
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="disposisi/buatDisposisi">Setujui</a>
    <a class="dropdown-item" href="disposisi/tolakDisposisi">Tolak</a>
  </div>
</td>  
        <tr>

     </div>
                             
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


