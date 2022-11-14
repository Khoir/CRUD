<?php
    // panggil koneksi database
    include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP & MYSQL DAN BOOTSTRAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">

        <div class="mt-3">
        <h3 class="text-center">DATA MAHASISWA AL HAQIQI TAHUN 2022</h3>
        <H3 class="text-center">SURABAYA</H3>
        </div>

    </div>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Data Mahasiswa
        </div>
        <div class="card-body">
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Data
            </button>

           <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama LENGKAP</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>

                <?php

                // persiapan menampilkan data
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
                while ($data = mysqli_fetch_array($tampil)):

                ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['NIM'] ?></td>
                    <td><?= $data['Nama'] ?></td>
                    <td><?= $data['Alamat'] ?></td>
                    <td><?= $data['Jurusan'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                    </td>
                </tr>

            <!-- awal Modal ubah -->
                <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="aksi_crud.php">
                            <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
                        <div class="modal-body">

                        
                                <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" name="tnim" value="<?= $data['NIM']?>" placeholder="Masukan NIM Anda">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="tnama" value="<?= $data['Nama']?>" placeholder="Masukan Nama Lengkap Anda">
                                </div>
                            
                                <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="talamat" rows="3"><?= $data['Alamat']?></textarea>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <select class="form-select" name="tprodi" >
                                    <option value="<?= $data['Jurusan'] ?>"><?= $data['Jurusan'] ?></option>
                                    <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                    <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            <!-- akhir Modal -->

            <!-- awal Modal hapus -->
            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="aksi_crud.php">
                            <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
                        <div class="modal-body">

                            <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
                            <span class="text-danger"><?=$data['NIM']?> - <?=$data['Nama']?></span>

                            </h5>
                              
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus Saja!</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            <!-- akhir Modal hapus -->


                <?php endwhile; ?>
           </table>

       

    <!-- awal Modal simpan-->
        <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="aksi_crud.php">
                <div class="modal-body">

                
                        <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="tnim" placeholder="Masukan NIM Anda">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Lengkap Anda">
                        </div>
                    
                        <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="talamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <select class="form-select" name="tprodi" >
                            <option></option>
                            <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                            <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                        </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    <!-- akhir Modal -->


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>