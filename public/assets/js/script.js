// Button Edit Data Pegawai
$(document).on('click', '#btn-edit', function () {
  $('.modal-body #id_pegawai').val($(this).data('id_pegawai'));
  $('.modal-body #nama_pegawai').val($(this).data('nama_pegawai'));
  $('.modal-body #nip').val($(this).data('nip'));
  $('.modal-body #alamat').val($(this).data('alamat'));
  $('.modal-body #no_hp').val($(this).data('no_hp'));
})

// Button Hapus Data pegawai
$(document).on('click', '#btn-hapus', function () {
  $('.modal-body #id_pegawai').val($(this).data('id_pegawai'));
})

// Button Edit Data Jabatan
$(document).on('click', '#btn-edit', function () {
  $('.modal-body #id_jabatan').val($(this).data('id_jabatan'));
  $('.modal-body #nama_jabatan').val($(this).data('nama_jabatan'));
})

// Button Hapus Data jabatan
$(document).on('click', '#btn-hapus', function () {
  $('.modal-body #id_jabatan').val($(this).data('id_jabatan'));
})

// Button Hapus Data jabatanPegawai
$(document).on('click', '#btn-hapus', function () {
  $('.modal-body #id_jabatan_pegawai').val($(this).data('id_jabatan_pegawai'));
})

// Button Edit Data role
$(document).on('click', '#btn-edit', function () {
  $('.modal-body #id_role').val($(this).data('id_role'));
  $('.modal-body #nama_role').val($(this).data('nama_role'));
})

// Button Hapus Data role
$(document).on('click', '#btn-hapus', function () {
  $('.modal-body #id_role').val($(this).data('id_role'));
})

// Button Hapus Data user
$(document).on('click', '#btn-hapus', function () {
  $('.modal-body #id_user').val($(this).data('id_user'));
})
