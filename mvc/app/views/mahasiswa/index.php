<div class="container mt-3">
   <div class="row">
      <div class="col-6">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModalInputMahasiswa">
            Tambah Data Mahasiswa
         </button>

         <h3>Daftar Mahasiswa</h3>
         <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
               <li class="list-group-item d-flex justify-content-between align-items-start">
                  <?= $mhs['nama']; ?>
                  <a class="btn btn-primary stretched-link" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">Detail</a>
               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModalInputMahasiswa" tabindex="-1" aria-labelledby="judulModalInputMahasiswa" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="judulModalInputMahasiswa">Tambah Data Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                  <label for="nama">Nama Lengkap</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP">
                  <label for="nrp">NRP</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                  <label for="email">Alamat Email</label>
               </div>
               <div class="form-floating">
                  <select class="form-select" id="jurusan" name="jurusan" aria-placeholder="Pilih Jurusan">
                     <option value="Teknik Informatika">Teknik Informatika</option>
                     <option value="Teknik Mesin">Teknik Mesin</option>
                     <option value="Teknik Industri">Teknik Industri</option>
                     <option value="Teknik Pangan">Teknik Pangan</option>
                     <option value="Teknik Planologi">Teknik Planologi</option>
                     <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                  </select>
                  <label for="jurusan">Pilih Jurusan</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
         </form>
      </div>
   </div>
</div>