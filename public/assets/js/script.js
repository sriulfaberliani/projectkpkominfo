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
