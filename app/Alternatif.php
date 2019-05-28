<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    public $table = 'alternatif';
    protected $fillable = ['nama'];
}
