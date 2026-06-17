<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "db_latihan_pbo_trpl1b_lanjuwidhunua"
);

if ($conn->connect_error) {
    die("Koneksi gagal : " . $conn->connect_error);
}

?>