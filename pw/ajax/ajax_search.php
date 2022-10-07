<?php
require '../function.php';
$buku = search($_GET['keyword']);
?>

<div class="mb-3 text-end row">
   <div class="text-center col-sm-8">
      <?php if (isset($_GET['keyword'])) : ?>
         <?php if (empty($buku)) : ?>
            <h4>Buku dengan kata kunci "<span class="text-danger"><?= $_GET['keyword'] ?></span>" Tidak ditemukan</h4>
         <?php else : ?>
            <?php if ($_GET['keyword'] == "") : ?>
            <?php else : ?>
               <h4>Menampilkan buku dengan kata kunci "<span class="text-success"><?= $_GET['keyword'] ?></span>"</h4>
            <?php endif; ?>
         <?php endif; ?>
      <?php endif; ?>
   </div>
   <div class="col-sm-4">
      <a href="add.php" class="btn btn-success btn-lg"><i class="fa-solid fa-plus"></i> Tambah Buku Baru</a>
   </div>
</div>

<div class="row row-cols-1 row-cols-lg-5 row-cols-sm-2 g-4">
   <?php foreach ($buku as $bk) : ?>
      <div class="col">
         <!-- <div class="card h-100"> -->
         <div class="card">
            <img src="asset/img/<?= $bk['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title"><?php batas($bk['judul'], 30); ?></h5>
               <p class="card-text"><?php batas($bk['penulis'], 30); ?></p>
               <p class="card-text"><small class="text-muted">by <?= $bk['penerbit']; ?> <?= $bk['tahun_terbit']; ?></small></p>
            </div>
            <div class="row row-cols-sm-2 g-0">
               <div class="col">
                  <a href="edit.php?id=<?= $bk['id']; ?>" class="btn btn-outline-primary btn-sm col-sm-12 update-link"><i class="fa-solid fa-pencil"></i> Edit</a>
               </div>
               <div class="col">
                  <a href="delete.php?id=<?= $bk['id'] ?>" class="btn btn-outline-danger btn-sm col-sm-12 delete-link"><i class="fa-solid fa-trash"></i> Hapus</a>
               </div>
            </div>
         </div>
      </div>

   <?php endforeach; ?>
</div>