<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model{
  protected $fillable = [
    'id','donatur', 'kontak'
  ];
}

?>
