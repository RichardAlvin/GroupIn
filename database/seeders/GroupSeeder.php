<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name' => 'RAP Group',
            'slug' => 'rap-group',
            'description' => 'Join RAP Group, build better team'
        ]);

        Group::create([
            'name' => 'Unity',
            'slug' => 'unity',
            'description' => 'Join Unity, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Star',
            'slug' => 'beyond-star',
            'description' => 'Join Beyond Star, build better team'
        ]);
    }
}