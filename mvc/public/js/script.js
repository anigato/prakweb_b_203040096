$(function(){
   
   $('.tampilModalTambah').on('click', function(){
      $('#judulModalInputMahasiswaLabel').html('Tambah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Tambah');
   })

   $('.tampilModalUbah').on('click', function(){
      $('#judulModalInputMahasiswaLabel').html('Ubah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('.modal-content form').attr('action','http://localhost/kuliah/PraktikumWeb/prakweb_b_203040096/mvc/public/mahasiswa/ubah');

      const id = $(this).data('id');
      
      $.ajax({
         url: 'http://localhost/kuliah/PraktikumWeb/prakweb_b_203040096/mvc/public/mahasiswa/getubah',
         data: {id : id},
         method: 'post',
         dataType: 'json',
         success: function(data) {
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#nrp').val(data.nrp);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);
         }
      });
   })
});