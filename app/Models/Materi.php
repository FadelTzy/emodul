<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function oMateri()
    {
        return $this->hasOne(pembelajaran::class, 'id', 'id_pembelajaran');
    }
    public function oText()
    {
        return $this->hasMany(Text::class, 'id_materi', 'id');
    }
    public function oFile()
    {
        return $this->hasMany(File::class, 'id_materi', 'id');
    }
    public function oVideo()
    {
        return $this->hasMany(Video::class, 'id_materi', 'id');
    }
}
