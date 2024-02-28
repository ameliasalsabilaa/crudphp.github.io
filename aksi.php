<?php
    include "koneksi.php";

    // tombol simpan
    if (isset($_POST['simpan'])) { 

    $simpan = mysqli_query($koneksi, "INSERT INTO datamurid (nim, nama, alamat, jurusan) 
                                      VALUES('$_POST[nim]',
                                             '$_POST[nama]',
                                             '$_POST[alamat]',
                                             '$_POST[jurusan]')");
    if($simpan){
        echo "<script>
                alert('Sukses menyimpan data!');
                document.location='join.php';
              </script>";
    }else {
        echo "<script>
                alert('Gagal menyimpan data!');
                document.location='join.php';
              </script>";
    }
}

    // tombol ubah
    if (isset($_POST['ubah'])) { 

    $ubah = mysqli_query($koneksi, "UPDATE datamurid SET
                                                          nim = '$_POST[nim]',
                                                          nama = '$_POST[nama]',
                                                          alamat = '$_POST[alamat]',
                                                          jurusan = '$_POST[jurusan]'
                                                          WHERE id = '$_POST[id]'");

    if($ubah){
        echo "<script>
                alert('Sukses mengubah data!');
                document.location='join.php';
              </script>";
    }else {
        echo "<script>
                alert('Gagal mengubah data!');
                document.location='join.php';
              </script>";
    }
}

    // tombol hapus
    if (isset($_POST['hapus'])) { 

    $hapus = mysqli_query($koneksi, "DELETE FROM datamurid WHERE id = '$_POST[id]' ");

    if($hapus){
        echo "<script>
                alert('Sukses menghapus data!');
                document.location='join.php';
              </script>";
    }else {
        echo "<script>
                alert('Gagal menghapus data!');
                document.location='join.php';
              </script>";
    }
}
?>