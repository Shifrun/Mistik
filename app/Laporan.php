<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model{
  protected $fillable = [
    'id','nama_pelapor','kontak','lokasi','stok_kebutuhan','kategori_kebutuhan','id_logistik','kategori_logistik','catatan'
  ];
}

?>
