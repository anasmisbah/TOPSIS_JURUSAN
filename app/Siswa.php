<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $table = "siswa";
    protected $fillable = ['nama','nis','jurusan','kelas','foto'];

    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class)->withPivot('nilai')->withTimestamps();
    }
    public function preferensi()
    {
        return $this->hasMany(Preferensi::class);
    }
    
}
