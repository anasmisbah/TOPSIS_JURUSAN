<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
    public $table = 'preferensi';
    protected $fillable = ['siswa_id','alternatif_id','nilai_preferensi'];
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
