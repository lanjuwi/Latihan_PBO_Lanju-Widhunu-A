<?php
require_once "koneksi/database.php";

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Manajemen Tiket Bioskop</title>

    <style>
        body{
            font-family: Arial;
            margin:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-bottom:30px;
        }

        th, td{
            border:1px solid black;
            padding:8px;
            text-align:center;
        }

        th{
            background:#ddd;
        }

        h2{
            background:#f2f2f2;
            padding:10px;
        }

        form{
            margin-bottom:20px;
        }
    </style>
</head>

<body>

<h1>Sistem Manajemen Tiket Bioskop</h1>

<form method="GET">
    <input
        type="text"
        name="cari"
        placeholder="Cari Film"
        value="<?= $cari ?>"
    >

    <button type="submit">
        Cari
    </button>
</form>

<?php

$studio = ["Regular","IMAX","Velvet"];

foreach($studio as $jenis){

    echo "<h2>Studio $jenis</h2>";

    if($cari != ""){

        $sql = "SELECT * FROM tabel_tiket
                WHERE jenis_studio='$jenis'
                AND nama_film LIKE '%$cari%'";

    }else{

        $sql = "SELECT * FROM tabel_tiket
                WHERE jenis_studio='$jenis'";
    }

    $query = mysqli_query($conn,$sql);

    echo "
    <table>

        <tr>
            <th>ID</th>
            <th>Film</th>
            <th>Jadwal</th>
            <th>Kursi</th>
            <th>Harga Dasar</th>
            <th>Fasilitas</th>
            <th>Total Harga</th>
        </tr>
    ";

    while($row = mysqli_fetch_assoc($query)){

        if($jenis == "Regular"){

            $fasilitas =
            "Audio : ".$row['tipe_audio'].
            "<br>Baris : ".$row['lokasi_baris'];

            $total =
            $row['jumlah_kursi']
            * $row['harga_dasar_tiket'];
        }

        elseif($jenis == "IMAX"){

            $fasilitas =
            "3D ID : ".$row['kacamata_3d_id'].
            "<br>Efek : ".$row['efek_gerak_fitur'];

            $total =
            ($row['jumlah_kursi']
            * $row['harga_dasar_tiket'])
            + 35000;
        }

        else{

            $fasilitas =
            "Pack : ".$row['bantal_selimut_pack'].
            "<br>Butler : ".$row['layanan_butler'];

            $total =
            ($row['jumlah_kursi']
            * $row['harga_dasar_tiket'])
            * 1.5;
        }

        echo "

        <tr>

            <td>{$row['id_tiket']}</td>

            <td>{$row['nama_film']}</td>

            <td>{$row['jadwal_tayang']}</td>

            <td>{$row['jumlah_kursi']}</td>

            <td>
                Rp ".number_format($row['harga_dasar_tiket'])."
            </td>

            <td>
                $fasilitas
            </td>

            <td>
                Rp ".number_format($total)."
            </td>

        </tr>

        ";
    }

    echo "</table>";
}
?>

</body>
</html>