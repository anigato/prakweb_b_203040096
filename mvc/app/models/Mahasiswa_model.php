<?php

class Mahasiswa_model {
   // private $mhs = [
   //    [
   //       "nama" => "Khoerul Anam",
   //       "nrp" => "203040096",
   //       "email" => "203040096@mail.unpas.ac.id",
   //       "jurusan" => "Teknik Informatika"
   //    ],
   //    [
   //       "nama" => "ANIGATO",
   //       "nrp" => "203040099",
   //       "email" => "203040099@mail.unpas.ac.id",
   //       "jurusan" => "Teknik Industri"
   //    ]
   // ];

   private $dbh; //DataBaseHandler
   private $stmt; //Statement

   public function __construct(){
      //DataSourceName
      $dsn = 'mysql:host=localhost;dbname=prakweb_2022_b_203040096';

      try {
         $this->dbh = new PDO($dsn, 'root','');
      }catch(PDOException $e){
         die($e->getMessage());
      }
   }

   public function getAllMahasiswa(){
      $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
      $this->stmt->execute();

      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}