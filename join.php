<?php
    include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bergabung</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <!-- Logo website -->
    <link rel="icon" href="img/logo2.jpg" type="image/x-icon" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

     <!-- Styling -->
    <style>
        body {
            background: url(img/buku.jpg);
        }
    </style>
  </head>
  <body>
    <div class="container">
        <!-- Tittle -->
        <div class="judul">
            <h1 class="Mulai text-white text-center mt-4">Mulai Bergabung!</h1>
            <p class="text-center fs-6 text-white">Yuk, jadilah bagian dari perjalanan literasi yang tak terbatas! Bergabunglah dengan perpustakaan kami, tempat di mana pintu dunia pengetahuan terbuka lebar.</p>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-header bg-primary text-white p-3">
                Data Pelanggan PerViska
            </div>
            <div class="card-body bg-dark">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Data
                </button>

                <table class="table table-dark table-hover table-striped table-bordered">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>

                        <tr>

                            <?php
                                $no = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM datamurid ORDER BY id DESC");
                                while ($data = mysqli_fetch_array($tampil)) : 
                            ?>

                            <td><?= $no++ ?></td>
                            <td><?= $data ['nim']?></td>
                            <td><?= $data ['nama']?></td>
                            <td><?= $data ['alamat']?></td>
                            <td><?= $data ['jurusan']?></td>
                            <td>
                                <a href="#" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="bi bi-pen me-2"></i>Ubah</a>
                                <a href="#" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="bi bi-trash me-2"></i>Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal Ubah -->
                        <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white p-3">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pelanggan PerViska</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi.php">
                                        <input type="hidden" name="id" value="<?= $data['id']?>">
                                        <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bolder">NIM</label>
                                                    <input type="teks" class="form-control" name="nim" value="<?=$data['nim']?>" placeholder="Masukkan NIM Anda">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bolder">Nama</label>
                                                    <input type="teks" class="form-control" name="nama" value="<?=$data['nama']?>" placeholder="Masukkan Nama Anda">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bolder">Alamat</label>
                                                    <textarea class="form-control" name="alamat" rows="3"><?=$data['alamat']?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bolder">Jurusan</label>
                                                    <select class="form-select" name="jurusan">
                                                        <option value="<?=$data['jurusan']?>"><?=$data['jurusan']?></option>
                                                        <option value="Akuntansi dan Keuangan Lembaga" >Akuntansi dan Keuangan Lembaga</option>
                                                        <option value="Manajemen Perkantoran dan Layanan Bisnis"  >Manajemen Perkantoran dan Layanan Bisnis</option>
                                                        <option value="Pemasaran"  >Pemasaran</option>
                                                        <option value="Usaha Layanan Pariwisata"  >Usaha Layanan Pariwisata</option>
                                                        <option value="Desain Komunikasi Visual" >Desain Komunikasi Visual</option>
                                                        <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                                        <option value="Broadcasting dan Perfilman" >Broadcasting dan Perfilman</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning" name="ubah" data-bs-dismiss="modal">Ubah</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Ubah -->

                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white p-3">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi hapus data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi.php">
                                        <input type="hidden" name="id" value="<?= $data['id']?>">
                                        <div class="modal-body">
                                                <h5 class="text-center">Apakah anda yakin ingin menghapus data ini? <br>
                                                    <span class="text-danger mt-2"><?= $data['nim']?> - <?= $data['nama']?></span>
                                                </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="hapus" data-bs-dismiss="modal">Hapus</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus -->

                        <?php endwhile; ?>
                </table>

                <!-- Awal Modal Tambah -->
                <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white p-3">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pelanggan PerViska</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi.php">
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bolder">NIM</label>
                                            <input type="teks" class="form-control" name="nim" placeholder="Masukkan NIM Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bolder">Nama</label>
                                            <input type="teks" class="form-control" name="nama" placeholder="Masukkan Nama Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bolder">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bolder">Jurusan</label>
                                            <select class="form-select" name="jurusan">
                                                <option value=""> - Silahkan Pilih Jurusan Anda - </option>
                                                <option value="Akuntansi dan Keuangan Lembaga" >Akuntansi dan Keuangan Lembaga</option>
                                                <option value="Manajemen Perkantoran dan Layanan Bisnis"  >Manajemen Perkantoran dan Layanan Bisnis</option>
                                                <option value="Pemasaran"  >Pemasaran</option>
                                                <option value="Usaha Layanan Pariwisata"  >Usaha Layanan Pariwisata</option>
                                                <option value="Desain Komunikasi Visual" >Desain Komunikasi Visual</option>
                                                <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                                <option value="Broadcasting dan Perfilman" >Broadcasting dan Perfilman</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="simpan" data-bs-dismiss="modal">Tambah</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>