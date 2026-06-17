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

<title>Royal Cinema</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}


body{
    background:#121212;
    color:#eee;
}



/* HEADER */

.header{

height:300px;

background:
linear-gradient(
rgba(0,0,0,.75),
rgba(35,10,15,.85)
),
url("https://images.unsplash.com/photo-1489599849927-2ee91cede3ba");

background-size:cover;
background-position:center;

display:flex;
align-items:center;
justify-content:center;

text-align:center;

border-bottom:2px solid #c9a227;

}



.header h1{

font-size:50px;

color:#e6c66a;

letter-spacing:4px;

}



.header p{

margin-top:15px;

color:#d8c6a3;

font-size:18px;

}




.container{

width:88%;

margin:-40px auto 40px;

}





/* SEARCH */


.search-box{

background:#1c1c1c;

padding:25px;

border-radius:18px;

display:flex;

gap:15px;

border:1px solid #5c3b3b;

box-shadow:0 15px 30px #000;

}



.search-box input{

flex:1;

padding:14px;

background:#101010;

border:1px solid #c9a227;

border-radius:12px;

color:white;

}



.search-box button{

padding:14px 35px;

border:none;

border-radius:12px;

background:#7b263a;

color:white;

font-weight:bold;

cursor:pointer;

}




/* JUDUL */

.studio-title{

margin-top:40px;

color:#e6c66a;

font-size:28px;

}




/* TABLE */


.table-card{

background:#1a1a1a;

padding:25px;

margin-top:15px;

border-radius:18px;

border:1px solid #c9a22755;

box-shadow:0 15px 35px #000;

overflow:auto;

}




table{

width:100%;

border-collapse:collapse;

}




th{

background:#4a1f2b;

color:#f5dda0;

padding:15px;

}



td{

padding:15px;

text-align:center;

border-bottom:1px solid #333;

}




tr:hover{

background:#242424;

}





.movie{

color:#e6c66a;

font-weight:bold;

}




.price{

color:#f1d36b;

font-weight:bold;

}






/* FASILITAS */

.detail{

background:#101010;

padding:15px;

border-radius:12px;

border-left:4px solid #c9a227;

text-align:left;

line-height:1.8;

min-width:230px;

}



.detail-title{

display:block;

color:#e6c66a;

font-weight:bold;

margin-bottom:8px;

}



.detail-item{

color:#ddd;

}



.detail-item span{

color:#f1d36b;

font-weight:bold;

}




.footer{

text-align:center;

padding:25px;

color:#bfa65d;

}



</style>


</head>


<body>




<div class="header">

<div>

<h1>🎬 ROYAL CINEMA</h1>

<p>Premium Movie Ticket Management</p>

</div>

</div>





<div class="container">




<form method="GET" class="search-box">


<input

type="text"

name="cari"

placeholder="Cari film..."

value="<?= $cari ?>"

>


<button>

Cari

</button>


</form>






<?php


$studio=[
"Regular",
"IMAX",
"Velvet"
];



foreach($studio as $jenis){


$nomor=1;



echo "

<h2 class='studio-title'>
🎞️ Studio $jenis
</h2>


<div class='table-card'>

<table>


<tr>

<th>No</th>
<th>Film</th>
<th>Jadwal</th>
<th>Kursi</th>
<th>Harga</th>
<th>Fasilitas</th>
<th>Total</th>

</tr>

";



if($cari!=""){


$sql="SELECT * FROM tabel_tiket

WHERE jenis_studio='$jenis'

AND nama_film LIKE '%$cari%'";


}else{


$sql="SELECT * FROM tabel_tiket

WHERE jenis_studio='$jenis'";


}




$query=mysqli_query($conn,$sql);





while($row=mysqli_fetch_assoc($query)){



if($jenis=="Regular"){



$fasilitas="

<div class='detail'>

<span class='detail-title'>
🎬 Studio Regular
</span>


<div class='detail-item'>
🔊 Audio :
<span>{$row['tipe_audio']}</span>
</div>


<div class='detail-item'>
💺 Posisi Kursi :
<span>{$row['lokasi_baris']}</span>
</div>


<div class='detail-item'>
🎞️ Jenis :
<span>Standard Cinema</span>
</div>


</div>

";


$total =
$row['jumlah_kursi']*
$row['harga_dasar_tiket'];

}




elseif($jenis=="IMAX"){



$fasilitas="

<div class='detail'>

<span class='detail-title'>
🎬 Studio IMAX
</span>


<div class='detail-item'>
🥽 Kacamata 3D :
<span>{$row['kacamata_3d_id']}</span>
</div>


<div class='detail-item'>
🎢 Efek Gerak :
<span>{$row['efek_gerak_fitur']}</span>
</div>


<div class='detail-item'>
📽️ Layar :
<span>IMAX Screen</span>
</div>


</div>

";


$total =
($row['jumlah_kursi']*
$row['harga_dasar_tiket'])
+35000;


}





else{


$fasilitas="

<div class='detail'>

<span class='detail-title'>
🎬 Studio Velvet
</span>


<div class='detail-item'>
🛋️ Paket :
<span>{$row['bantal_selimut_pack']}</span>
</div>


<div class='detail-item'>
👤 Butler :
<span>{$row['layanan_butler']}</span>
</div>


<div class='detail-item'>
⭐ Kenyamanan :
<span>Private Cinema</span>
</div>


</div>

";



$total =
($row['jumlah_kursi']*
$row['harga_dasar_tiket'])
*1.5;


}






echo "

<tr>

<td>$nomor</td>


<td class='movie'>
{$row['nama_film']}
</td>


<td>
{$row['jadwal_tayang']}
</td>


<td>
{$row['jumlah_kursi']}
</td>


<td class='price'>
Rp ".number_format($row['harga_dasar_tiket'])."
</td>


<td>
$fasilitas
</td>


<td class='price'>
Rp ".number_format($total)."
</td>


</tr>

";



$nomor++;


}




echo "

</table>

</div>

";


}



?>



</div>




<div class="footer">

🍿 Royal Cinema © 2026

</div>



</body>
</html>