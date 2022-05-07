<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pivot table
        foreach(range(1, 1000) as $index)
        {
            DB::table('course_user')->insert([
                'course_id' => rand(1,30),
                'user_id' => rand(1,200)
            ]);
        }
    }
}
