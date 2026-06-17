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
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas()
    {
        return "Audio: " . $this->tipeAudio .
           ", Baris: " . $this->lokasiBaris;
    }
}

?>