<?php
require 'function.php';
$id = $_GET['id'];
$buku = query("SELECT id,judul,penulis,penerbit,tahun_terbit,gambar FROM buku WHERE id = $id");



?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   
   <?php require_once('head/link.php') ?>
   <?php require_once('head/script.php') ?>

   <title>ANIGABOOKS</title>
</head>

<body>

   <?php require_once("navbar.php") ?>


   <div class="container content mt-5 mb-5">

      <div class="card">
         <div class="card-header bg-primary text-white">
            <h5>Tambahkan Produk Baru</h3>
         </div>
         <div class="card-body">
            <form class="row g-3 needs-validation" novalidate id="inputProduct" method="post" action="" enctype="multipart/form-data">
               <input type="hidden" name="id" id="id" value="<?= $buku['id']; ?>">
               <div class="form-floating col-md-6">
                  <input type="text" class="form-control" id="inputTitle" name="inputTitle" required placeholder="Judul Buku" value="<?= $buku['judul']; ?>">
                  <label for="inputTitle" class="form-label">Judul Buku</label>
                  <div class="invalid-feedback">
                     Mohon tulis Judul Buku.
                  </div>
               </div>
               <div class="form-floating col-md-6">
                  <input type="text" class="form-control" id="inputWritter" name="inputWritter" required placeholder="Nama Penulis" value="<?= $buku['penulis']; ?>">
                  <label for="inputWritter" class="form-label">Nama Penulis</label>
                  <div class="invalid-feedback">
                     Mohon isi Nama Penulis
                  </div>
               </div>
               <div class="form-floating col-md-6">
                  <input type="text" class="form-control" id="inputPublisher" name="inputPublisher" required placeholder="Nama Penerbit" value="<?= $buku['penerbit']; ?>">
                  <label for="inputPublisher" class="form-label">Nama Penerbit</label>
                  <div class="invalid-feedback">
                     Mohon tuils Nama Penerbit
                  </div>
               </div>
               <div class="form-floating col-md-6">
                  <input type="text" class="form-control" id="inputPublished" name="inputPublished" required placeholder="Tahun Diterbitkan" onkeypress="return onlyNumber(event)" minlength="4" maxlength="4" value="<?= $buku['tahun_terbit']; ?>">
                  <label for="inputPublished" class="form-label">Tahun Diterbitkan</label>
                  <div class="invalid-feedback">
                     Mohon isi Tahun Penerbitan
                  </div>
               </div>
               <div class="col-12">
                  <div class="mb-3">
                     <label for="img" class="form-label">Sampul Buku</label>
                     <input class="form-control" type="file" id="img" name="img" onchange="showImage(this);">
                     <input type="hidden" name="old_img" value="<?= $buku['gambar']; ?>">
                     <div class="invalid-feedback">
                        Mohon upload Sampul Buku
                     </div>
                     <div class="row">
                        <div class="col-md-4 mt-3 mx-auto d-block">
                           <p class="text-center">Sampul Baru</p>
                           <img class="rounded" src="#" alt="" id="show-image" style="width: 100%;">
                        </div>
                        <div class="col-md-3 mt-3 mx-auto d-block">
                           <p class="text-center">Sampul Lama</p>
                           <img class="rounded" src="asset/img/<?= $buku['gambar']; ?>" alt="" style="width: 100%;" id="show-old-image">
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-success" name="edit"><i class="fa-solid fa-upload"></i> Ubah</button>
                     <a type="button" class="btn btn-warning" id="reset"><i class="fa-solid fa-arrows-rotate"></i> Reset</a>
                     <a href="index.php" type="button" class="btn btn-danger" id="cancel"><i class="fa-solid fa-xmark"></i> Batal</a>
                  </div>
               </div>
            </form>
         </div>
      </div>

   </div>

   
   <?php require_once('footer/script.php') ?>
   <?php
   if (isset($_POST['edit'])) {
      $upload = uploadImage('asset/img/', $_POST, 'edit-product');
      if ($upload == "success") {
         echo "
                <script type='text/javascript'>
                
                Swal.fire({
                    title:'Success!',
                    text:'Buku bini berhasil diubah',
                    type:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='index.php';
                    }
                })
                </script>
            ";
      } else if ($upload == "tooLarge") {
         echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Ukuran file sampul terlalu besar',
                    type:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='insert.php';
                    }
                })
                </script>
            ";
      } else if ($upload == "notImage") {
         echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Hanya file JPG, JPEG dan PNG yang diterima',
                    type:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='insert.php';
                    }
                })
                </script>
            ";
      }
   }

   ?>

   
   <script>
      // validasi form
      (function() {
         'use strict'

         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.querySelectorAll('.needs-validation')

         // Loop over them and prevent submission
         Array.prototype.slice.call(forms)
            .forEach(function(form) {
               form.addEventListener('submit', function(event) {
                  if (!form.checkValidity()) {
                     event.preventDefault()
                     event.stopPropagation()
                  }

                  form.classList.add('was-validated')
               }, false)
            })
      })()

      // alert klik tombol reset
      jQuery(document).ready(function($) {
         $('#reset').on('click', function() {

            Swal.fire({
               title: 'Warning!',
               text: 'Anda yakin mau reset form ini?',
               type: 'warning',
               // html:true,
               showCancelButton: true,
               cancelButtonColor: '#d33',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Yes'
            }).then((result) => {
               if (result.value) {
                  resetForm();
               }
            });
            return false;
         });
      });

      // alert klik tombol batal
      jQuery(document).ready(function($) {
         $('#cancel').on('click', function() {
            var getLink = $(this).attr('href');

            Swal.fire({
               title: 'Warning!',
               text: 'Anda yakin keluar dari halaman ini?',
               type: 'question',
               // html:true,
               showCancelButton: true,
               cancelButtonColor: '#d33',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Yes'
            }).then((result) => {
               if (result.value) {
                  window.location.href = getLink;
               }
            });
            return false;
         });
      });

      // reset form
      function resetForm() {
         $('input').attr('value', '');
         $('#show-image').attr('src', '#');

      }

      // menampilkan gambar ketika dipilih
      function showImage(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               $('#show-image')
                  .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
         }
      }

      // input form khusus nomor
      function onlyNumber(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
         } else {
            return true;
         }
      }
   </script>
</body>

</html>