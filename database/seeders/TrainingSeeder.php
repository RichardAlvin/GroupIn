<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'title' => 'First Training',
            'slug' => 'first-training',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Training::create([
            'title' => 'Second Training',
            'slug' => 'second-training',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Training::create([
            'title' => 'Third Training',
            'slug' => 'third-training',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);
    }
}
