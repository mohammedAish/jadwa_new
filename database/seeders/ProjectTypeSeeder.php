<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ProjectType::query()->create([
            'title' => 'صناعي',
          
        ]);
        ProjectType::query()->create([
            'title' => 'تجاري',

          
        ]);
        ProjectType::query()->create([
            'title' => 'تعليمي',
          
        ]);

    }
}
