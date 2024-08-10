<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'materi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'link_embed_materi',
        'kursus_id',
    ];

    protected $casts = [
        'link_embed_materi' => 'array',
    ];

    // Mendapatkan embed link atau default jika tidak ada
    public function getEmbedUrlAttribute()
    {
        // Jika link_embed_materi ada
        if ($this->link_embed_materi) {
            return $this->link_embed_materi;
        }

        return 'No Embed Link Available';
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
}
