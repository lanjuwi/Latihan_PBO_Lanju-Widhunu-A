<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_latihan_pbo_trpl1b_lanjuwidhunua"
);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>