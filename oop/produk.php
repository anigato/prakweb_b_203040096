<?php

class Produk{
   public $judul = "Komik Boku no Hero", // definisikan default
   // public $judul,
            $penulis,
            $penerbit,
            $harga;

   public function getLabel(){
      // $this->penulis artinya mengacu pada variabel penulis diluar fungsi ini
      return "$this->penulis, $this->penerbit";
   }
}

// $produk1 = new Produk();
// $produk1 -> judul = "Dr. Stone"; // menimpa isi properti judul
// var_dump($produk1);// menampilkan semua properti
// echo"<br><br>";

// $produk2 = new Produk();
// var_dump($produk2->judul); // hanya menampilkan properti judul
// echo"<br><br>";

// $produk3 = new Produk();
// $produk3 -> genre = "Horror"; // membuat properti baru
// var_dump($produk3); 
// echo"<br><br>";


$produk4 = new Produk();
$produk4->judul = "One Piece";
$produk4->penulis = "Eichiro Oda";
$produk4->penerbit = "Shounen Jump";
$produk4->harga = 100000;
// var_dump($produk4);
echo "Komik $produk4->judul, by $produk4->penerbit";
echo"<br><br>";

// $produk4->sayHello(); // memanggil method

$produk5 = new Produk();
$produk5->judul = "Uncharted";
$produk5->penulis = "Neil Druckmann";
$produk5->penerbit = "Sony Computer Entertaiment";
$produk5->harga = 850000;


echo "Komik :".$produk4->getLabel();
echo"<br>";

echo "Game :".$produk5->getLabel();
echo"<br>";