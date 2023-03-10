<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 ">Selamat Datang di Sisume, <span class="badge badge-pill badge-primary"><?= session()->get('nama_pegawai')?></span>!</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
    <?php
        if (session()->get('id_role') == '6') { ?>
 <div class="col-md-4 col-sm-12 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('suratmasuk'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imgmail1.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
      <h5 class="card-title font-weight-bold">Surat Masuk</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_suratmasuk ?></h5>
			</div>
		</div>
	</div>
</a>
 </div>

 <div class="col-md-4 col-sm-6 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('disposisisk/index_agenda'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imgsurat.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
      <h5 class="card-title font-weight-bold">Surat Keluar</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_suratkeluar ?></h5>
			</div>
		</div>
	</div>
</a>
 </div>
 <?php } ?>

 <?php
        if (session()->get('id_role') == '1') { ?>
 <div class="col-md-4 col-sm-6 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('datapegawai'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imgworker1.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
      <h5 class="card-title font-weight-bold">Jumlah Pegawai</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_pegawai ?></h5>
			</div>
		</div>
	</div>
</a>
 </div>

 <div class="col-md-4 col-sm-6 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('datauser'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imguser.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
			<h5 class="card-title font-weight-bold">Jumlah Akun</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_user ?></h4>
			</div>
		</div>
	</div>
</a>
 </div>
 <?php } ?>

<?php
        if (session()->get('id_role') != '1') { ?>
 <div class="col-md-4 col-sm-6 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('disposisi'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imgsurat.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
			<h5 class="card-title font-weight-bold">Disposisi Surat Masuk</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_disposisi ?></h5>
			</div>
		</div>
	</div>
</a>
 </div>
 <?php
        if (session()->get('id_role') != '5') { ?>

 <div class="col-md-4 col-sm-6 mb-3">
 <a class="card" style="max-width: 540px;" href="<?= base_url('disposisisk'); ?>">
	<div class="row no-gutters">
		<div class="col-md-4">
    <img src="/assets/img/imgmail1.png" class="card-img" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
      <h5 class="card-title font-weight-bold">Disposisi Surat Keluar</h5>
        <h5 class="card-text text-primary font-weight-bold"><?= $jumlah_disposisi_sk ?></h5>
			</div>
		</div>
	</div>
</a>
 </div>
 <?php } ?>
  <?php } ?>

 


</div>



 




        
    </div>
    <!-- /.container-fluid -->



</div>
<!-- End of Main Content -->


<!-- Begin Page Content -->
<div class="container-fluid">
<div class="card mx-auto" center>
<div class="card-header py-3">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="\assets\img\img1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="\assets\img\img2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="\assets\img\img6.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="\assets\img\img7.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="\assets\img\img8.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


   <!-- <?php
        //  if (session()->get('id_role') == '1') { ?> -->