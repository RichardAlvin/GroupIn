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
            'slot' => 3,
            'description' => 'Join RAP Group, build better team'
        ]);

        Group::create([
            'name' => 'Unity',
            'slug' => 'unity',
            'slot' => 5,
            'description' => 'Join Unity, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Star',
            'slug' => 'beyond-star',
            'slot' => 3,
            'description' => 'Join Beyond Star, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Moon',
            'slug' => 'beyond-moon',
            'slot' => 3,
            'description' => 'Join Beyond Moon, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Sun',
            'slug' => 'beyond-sun',
            'slot' => 3,
            'description' => 'Join Beyond Sun, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Sun 2',
            'slug' => 'beyond-sun-2',
            'slot' => 3,
            'description' => 'Join Beyond Sun, build better team'
        ]);

        Group::create([
            'name' => 'Beyond Sun 3',
            'slug' => 'beyond-sun-3',
            'slot' => 3,
            'description' => 'Join Beyond Sun, build better team'
        ]);
    }
}
