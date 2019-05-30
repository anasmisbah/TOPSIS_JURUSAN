<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public $table = "kriteria";
    protected $fillable =['nama','bobot','kategori'];

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class)->withPivot('nilai')->withTimestamps();
    }
}
