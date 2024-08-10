<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kursus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kursus';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'durasi'
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}