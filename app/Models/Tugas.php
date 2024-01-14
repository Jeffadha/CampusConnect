<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = ['judul', 'deskripsi', 'user_id'];

    public function pembuat()
    {
        return $this->belongsTo(User::class);
    }

    public function jawabans()
    {
        return $this->belongsToMany(Tugas::class, 'jawaban_tugas');
    }
}