<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyQuiz extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
