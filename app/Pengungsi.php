<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengungsi extends Model{
  protected $fillable = [
    'id','nama_pengungsian','jumlah_pengungsi', 'alamat', 'daerah', 'lat', 'lng'
  ];
}

?>
