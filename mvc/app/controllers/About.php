<?php

class About {
   public function index($nama="Khoerul", $pekerjaan="Mahasiswa"){
      echo "Halo, nama saya $nama. Saya seorang $pekerjaan";
   }
   public function page(){
      echo 'About/page';
   }
}