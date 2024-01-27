<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create([
            'title' => 'First Competition',
            'slug' => 'first-competition',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Competition::create([
            'title' => 'Second Competition',
            'slug' => 'second-competition',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Competition::create([
            'title' => 'Third Competition',
            'slug' => 'third-competition',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Competition::create([
            'title' => 'Fourth Competition',
            'slug' => 'fourth-competition',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Competition::create([
            'title' => 'Fifth Competition',
            'slug' => 'fifth-competition',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);
    }
}
