<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dreams extends Model
{
    use HasFactory;

    protected $table = 'dreams';
    protected $primaryKey = 'dream_id';

    protected $fillable = ['dream_title', 'dream_description', 'mood_id', 'user_id', 'created_at', 'updated_at'];

    public function mood()
    {
        return $this->belongsTo(Mood::class, 'mood_id', 'mood_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
