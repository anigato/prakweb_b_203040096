<div class="container mt-3">
   <div class="row">
      <div class="col-lg-6">
         <!-- panggil method static flash pada kelas Flasher -->
         <?php Flasher::flash() ?>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-6">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary mb-3 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#formModalInputMahasiswa">
            Tambah Data Mahasiswa
         </button>

         <h3>Daftar Mahasiswa</h3>
         <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
               <li class="list-group-item">
                  <?= $mhs['nama']; ?>
                  <a class="badge bg-danger float-end ms-1" style="text-decoration:none" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" onclick="return confirm('Yakin hapus Mahasiswa ini?')">Hapus</a>
                  <a class="badge bg-success float-end ms-1 tampilModalUbah" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#formModalInputMahasiswa" data-id="<?= $mhs['id']; ?>">Edit</a>
                  <a class="badge bg-primary float-end ms-1" style="text-decoration:none" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">Detail</a>
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
            <h5 class="modal-title" id="judulModalInputMahasiswaLabel">Tambah Data Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
         <input type="hidden" name="id" id="id">
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                  <label for="nama">Nama Lengkap</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP" required>
                  <label for="nrp">NRP</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
                  <label for="email">Alamat Email</label>
               </div>
               <div class="form-floating">
                  <select class="form-select" id="jurusan" name="jurusan" aria-placeholder="Pilih Jurusan" required>
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