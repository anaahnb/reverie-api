<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $table = 'moods';
    protected $primaryKey = 'mood_id';
    protected $fillable = ['mood_name'];

    public function dream()
    {
        return $this->belongsTo(Dreams::class, 'dream_id', 'dream_id');
    }
}
