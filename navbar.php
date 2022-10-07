<?php
require_once "function.php";
$penerbit = query("SELECT DISTINCT penerbit FROM buku ORDER BY id DESC");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="z-index: 1030;">
   <div class="container">
      <a class="navbar-brand" href="index.php">
         <img src="asset/img/anigatomini.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
         ANIGABOOKS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Penerbit
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <form action="" method="post">
                     <?php foreach ($penerbit as $pnr) : ?>
                        <li>
                           <button type="submit" name="keyword" value="<?= $pnr['penerbit'] ?>" class="dropdown-item"><?= $pnr['penerbit'] ?></button>
                        </li>
                     <?php endforeach; ?>
                  </form>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item">Nama Penerbit</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>
<nav class="navbar navbar-light bg-light sticky-top">
   <div class="container">
      <form class="container-fluid" action="" method="post">
         <input class="form-control me-2 keyword" type="text" placeholder="Cari Judul Buku / Penulis / Penerbit" aria-label="Search" name="keyword">
         <button class="btn btn-outline-light btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
   </div>
</nav>