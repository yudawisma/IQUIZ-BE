<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang terkait (jika tidak menggunakan nama default Laravel)
    protected $table = 'contents';

    // Tentukan kolom-kolom yang dapat diisi (untuk mass assignment)
    protected $fillable = [
        'title',
        'description',
        'topic',
    ];

    // Jika kolom yang digunakan untuk timestamp berbeda atau tidak ada, bisa dimatikan
    public $timestamps = true;
}
