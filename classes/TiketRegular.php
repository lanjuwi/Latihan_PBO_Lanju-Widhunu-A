<?php

require_once "Tiket.php";

class TiketRegular extends Tiket
{
    protected $tipeAudio;
    protected $lokasiBaris;

    public function getData($conn)
    {
        $sql = "SELECT * FROM tabel_tiket
                WHERE jenis_studio='Regular'";

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