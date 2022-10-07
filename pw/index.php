<?php
require 'function.php';
$buku = query("SELECT id,judul,penulis,penerbit,tahun_terbit,gambar FROM buku ORDER BY id DESC");


if (isset($_POST['keyword'])) {
    $buku = search($_POST['keyword']);
}



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

        <div class="mb-3 text-end">
            <a href="add.php" class="btn btn-success btn-lg"><i class="fa-solid fa-plus"></i> Tambah Buku Baru</a>
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
    </div>
    <?php require_once('footer/script.php') ?>
    <script>
        // alert saat lik tombol delete
        jQuery(document).ready(function($) {
            $('.delete-link').on('click', function() {
                var getLink = $(this).attr('href');

                Swal.fire({
                    title: 'Warning!',
                    text: 'Anda yakin mau menghapusnya? Data tidak dapat dikembalikan!',
                    type: 'warning',
                    // html:true,
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, Delete It!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Buku ini berhasil dihapus',
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = getLink;
                            }
                        })

                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>