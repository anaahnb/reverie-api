<?php

namespace Database\Seeders;

use App\Models\Mood;
use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moods = ['Misterioso', 'Feliz', 'Triste', 'Assustador', 'Neutro'];

        foreach ($moods as $mood) {
            Mood::create([
                'mood_name' => $mood,
            ]);
        }
    }
}
