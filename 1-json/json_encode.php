<?php  

    // Mengubah array / data dari database menjadi JSON

    // 1. Koneksi & ambil data dari database
    $koneksi = new PDO('mysql:host=localhost;dbname=dbs_query', 'root', '');

    $result = $koneksi->prepare('SELECT * FROM tbl_barang');
    $result->execute();
    $data_barang = $result->fetchAll(PDO::FETCH_ASSOC);
    
    // 2. Ubah data dari DB menjadi JSON lalu tampilkan
    $data_json = json_encode($data_barang);
    echo $data_json;

?>