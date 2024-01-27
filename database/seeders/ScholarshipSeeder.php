<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scholarship::create([
            'title' => 'First Scholarship',
            'slug' => 'first-scholarship',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Scholarship::create([
            'title' => 'Second Scholarship',
            'slug' => 'second-scholarship',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Scholarship::create([
            'title' => 'Third Scholarship',
            'slug' => 'third-scholarship',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Scholarship::create([
            'title' => 'Forth Scholarship',
            'slug' => 'forth-scholarship',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);

        Scholarship::create([
            'title' => 'Fifth Scholarship',
            'slug' => 'fifth-scholarship',
            'subtitle' => 'test test',
            'body' => 'test test body'
        ]);
    }
}
