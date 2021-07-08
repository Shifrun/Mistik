<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logistik extends Model{
  protected $fillable = [
    'id','nama','stok','kadaluarsa','kategori','daerah','sumber'
  ];
}

?>
