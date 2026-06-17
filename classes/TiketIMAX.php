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
        return ($this->jumlah_kursi * $this->hargaDasarTiket)
            + 35000;
    }

    public function tampilkanInfoFasilitas()
    {
        return "3D ID: " . $this->kacamata3dId .
           ", Efek: " . $this->efekGerakFitur;
    }
}

?>