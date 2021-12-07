<?php  

    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();

    $response = $client->request('GET', 'http://www.omdbapi.com', [
        'query' => [ //query sama seperti tab 'params' nya kalo di postman
            'apikey' => 'ad3a5e92',
            's' => 'naruto'
        ]
    ]);

    // Response diubah dari JSON ke Array
    $result = json_decode($response->getBody()->getContents(), true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>
<body>

    <table border="1" width="50%" style="border-collapse:collapse">
        <thead>
            <tr>
                <th>NO</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Poster</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($result['Search'] as $row){
            ?>
            <tr>
                <td style="text-align:center"><?php echo $no++; ?></td>
                <td style="text-align:center"><?php echo $row['Title'] ?></td>
                <td style="text-align:center"><?php echo $row['Year'] ?></td>
                <td style="text-align:center"><img src="<?php echo $row['Poster'] ?>" width="80px" alt=""></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    

</body>
</html>