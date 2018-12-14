<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model{
  protected $fillable = [
    'id','nama_pelapor','kontak','lokasi','kategori_kebutuhan','catatan'
  ];
}

?>
