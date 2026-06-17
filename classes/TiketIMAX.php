<?php

require_once "Tiket.php";

class TiketIMAX extends Tiket
{
    protected $kacamata3dId;
    protected $efekGerakFitur;

    public function getData($conn)
    {
        $sql = "SELECT * FROM tabel_tiket
                WHERE jenis_studio='IMAX'";

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