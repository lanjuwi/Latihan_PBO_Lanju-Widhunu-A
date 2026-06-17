<?php

require_once "Tiket.php";

class TiketVelvet extends Tiket
{
    protected $bantalSelimutPack;
    protected $layananButler;

    public function getData($conn)
    {
        $sql = "SELECT * FROM tabel_tiket
                WHERE jenis_studio='Velvet'";

        return mysqli_query($conn, $sql);
    }

    public function hitungTotalHarga()
    {
    }

    public function tampilkanInfoFasilitas()
    {
    }
}

?>