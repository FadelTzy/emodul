<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function oMateri()
    {
        return $this->hasOne(Materi::class, 'id_pembelajaran', 'id_materi');
    }
    protected $guarded = [];
}
