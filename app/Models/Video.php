<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function oMateri()
    {
        return $this->hasOne(Materi::class, 'id_pembelajaran', 'id_materi');
    }
}
