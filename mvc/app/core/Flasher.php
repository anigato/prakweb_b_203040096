<?php

class Flasher
{
   // untuk mementukan pesan flash seperti apa, akan ditampilkan dengan bootstrap
   public static function setFlash($pesan, $aksi, $tipe)
   {
      // sesi flash untuk alert bertipe array
      $_SESSION['flash'] = [
         'pesan' => $pesan,
         'aksi' => $aksi,
         'tipe' => $tipe
      ];
   }

   // untuk menampilkan flash/alert
   public static function flash()
   {
      // cek ada sesi flash pada halaman
      if (isset($_SESSION['flash'])) {
         echo '
         <div class="alert alert-'.$_SESSION['flash']['tipe'].' alert-dismissible fade show" role="alert">
            Data Mahasiswa <strong>'.$_SESSION['flash']['pesan'].'</strong> '.$_SESSION['flash']['aksi'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         ';

         //hapus sesi flash ketika flash sudah ditampilkan
         unset($_SESSION['flash']);
      }
   }
}
