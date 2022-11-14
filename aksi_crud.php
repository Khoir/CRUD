<?php

// panggil koneksi database
include "koneksi.php";

// uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])){

    // persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (NIM, Nama, Alamat, Jurusan)
                                    VALUES ('$_POST[tnim]',
                                            '$_POST[tnama]',
                                            '$_POST[talamat]',
                                            '$_POST[tprodi]')");

    // jika simpan sukses
    if($simpan){
        echo "<script>
                alert('simpan data sukses!');
                document.location='index.php';
            </script>";

    }else{
        echo "<script>
                alert('Simpan Data Gagal!');
                document.location='index.php';
            </script>";
    }
}

// uji jika tombol ubah di klik
if(isset($_POST['bubah'])){

    // persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET 
                                                    Nim = '$_POST[tnim]',
                                                    Nama = '$_POST[tnama]',
                                                    Alamat = '$_POST[talamat]',
                                                    Jurusan = '$_POST[tprodi]'
                                                    WHERE id_mhs = '$_POST[id_mhs]'
                                                    ");

    // jika ubah sukses
    if($ubah){
        echo "<script>
                alert('Ubah data sukses!');
                document.location='index.php';
            </script>";

    }else{
        echo "<script>
                alert('Ubah Data Gagal!');
                document.location='index.php';
            </script>";
    }
}

// uji jika tombol hapus di klik
if(isset($_POST['bhapus'])){

    // persiapan ubah data
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]' ");

    // jika ubah sukses
    if($hapus){
        echo "<script>
                alert('Ubah data sukses!');
                document.location='index.php';
            </script>";

    }else{
        echo "<script>
                alert('Ubah Data Gagal!');
                document.location='index.php';
            </script>";
    }  
}



?>