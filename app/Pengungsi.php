<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengungsi extends Model{
  protected $fillable = [
    'id','jumlah_pengungsi','daerah'
  ];
}

?>
