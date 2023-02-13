// Button Edit Data Pegawai
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_pegawai").val($(this).data("id_pegawai"));
  $(".modal-body #nama_pegawai").val($(this).data("nama_pegawai"));
  $(".modal-body #nip").val($(this).data("nip"));
  $(".modal-body #alamat").val($(this).data("alamat"));
  $(".modal-body #no_hp").val($(this).data("no_hp"));
});

// Button Hapus Data pegawai
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_pegawai").val($(this).data("id_pegawai"));
});

// Button Edit Data JENIS SURAT
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_jenis_surat").val($(this).data("id_jenis_surat"));
  $(".modal-body #nama_jenis_surat").val($(this).data("nama_jenis_surat"));
});

// Button Hapus Data JENIS SURAT
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_jenis_surat").val($(this).data("id_jenis_surat"));
});

// Button Edit Data Jabatan
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_jabatan").val($(this).data("id_jabatan"));
  $(".modal-body #nama_jabatan").val($(this).data("nama_jabatan"));
});

// Button Hapus Data jabatan
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_jabatan").val($(this).data("id_jabatan"));
});

// Button Hapus Data jabatanPegawai
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_jabatan_pegawai").val($(this).data("id_jabatan_pegawai"));
});

// Button Edit Data JabatanPegawai
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_jabatan_pegawai").val($(this).data("id_jabatan_pegawai"));
  $(".modal-body #id_pegawai").val($(this).data("id_pegawai"));
  $(".modal-body #id_jabatan").val($(this).data("id_jabatan"));
});

// Button Hapus Data user
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_user").val($(this).data("id_user"));
});

// Button Edit Data User
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_user").val($(this).data("id_user"));
  $(".modal-body #id_pegawai").val($(this).data("id_pegawai"));
  $(".modal-body #id_role").val($(this).data("id_role"));
  $(".modal-body #level").val($(this).data("level"));
  $(".modal-body #username").val($(this).data("username"));
  $(".modal-body #password").val($(this).data("password"));
});

// Button Edit Data Surat masuk
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_suratmasuk").val($(this).data("id_suratmasuk"));
  $(".modal-body #id_user").val($(this).data("id_user"));
  $(".modal-body #id_jenis_surat").val($(this).data("id_jenis_surat"));
  $(".modal-body #no_suratmasuk").val($(this).data("no_suratmasuk"));
  $(".modal-body #tgl_suratmasuk").val($(this).data("tgl_suratmasuk"));
  $(".modal-body #agenda_suratmasuk").val($(this).data("agenda_suratmasuk"));
  $(".modal-body #file_surat").val($(this).data("file_surat"));
});

// Button Hapus Data surat masuk
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_suratmasuk").val($(this).data("id_suratmasuk"));
});

// Button Hapus Data surat keluar
$(document).on("click", "#btn-hapus", function () {
  $(".modal-body #id_suratkeluar").val($(this).data("id_suratkeluar"));
});

// Button Edit Data Surat keluar
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_suratkeluar").val($(this).data("id_suratkeluar"));
  $(".modal-body #id_user").val($(this).data("id_user"));
  $(".modal-body #id_jenis_surat").val($(this).data("id_jenis_surat"));
  $(".modal-body #no_suratkeluar").val($(this).data("no_suratkeluar"));
  $(".modal-body #tgl_pembuatansk").val($(this).data("tgl_pembuatansk"));
  $(".modal-body #lampiran").val($(this).data("lampiran"));
  $(".modal-body #perihal").val($(this).data("perihal"));
  $(".modal-body #tujuan_sk").val($(this).data("tujuan_sk"));
  $(".modal-body #isi_sk").val($(this).data("isi_sk"));
  $(".modal-body #jabatan_pembuatsurat").val($(this).data("jabatan_pembuatsurat"));
  $(".modal-body #nama_pembuatsurat").val($(this).data("nama_pembuatsurat"));
  $(".modal-body #nip_pembuatsurat").val($(this).data("nip_pembuatsurat"));
});

// Button Teruskan Surat Keluar
$(document).on("click", "#btn-dispo", function () {
  $(".modal-body #id_suratkeluar").val($(this).data("id_suratkeluar"));
  });

// Button Teruskan Surat Keluar
$(document).on("click", "#btn-dispo", function () {
  $(".modal-body #id_suratmasuk").val($(this).data("id_suratmasuk"));
  });

// Button btn-dispo




