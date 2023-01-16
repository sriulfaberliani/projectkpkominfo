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