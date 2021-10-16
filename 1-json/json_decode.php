<?php  

    $data = file_get_contents('coba.json');
    $data_mahasiswa = json_decode($data, true); // jika true, data akan menjadi array associative, jika kosong/false data akan menjadi object

    // var_dump($data_mahasiswa);

?>


<table border="1" cellpadding="5" cellspacing=0>
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>NIM</th>
        <th>Lulus</th>
        <th>Hobby</th>
    </tr>

    <?php  
        $no=1;
        foreach($data_mahasiswa as $row){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama'] ?></td>
        <td><?php echo $row['umur'] ?></td>
        <td><?php echo $row['nim'] ?></td>
        <td><?php echo $row['lulus'] ?></td>
        <td>
            <ul>
                <?php foreach($row['hobby'] as $row_hobi){ ?>
                    <li><?php echo $row_hobi; ?></li>            
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php } ?>
</table>