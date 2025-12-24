<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilestoneCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('milestone_categories')->insert([
            [
                'milestonecategory_id' => 1,
                'milestonecategory_created' => '2024-01-19 15:42:44',
                'milestonecategory_updated' => '2024-01-19 17:30:24',
                'milestonecategory_creatorid' => 0,
                'milestonecategory_title' => 'Planning',
                'milestonecategory_position' => 1,
                'milestonecategory_color' => 'default',
            ],
            [
                'milestonecategory_id' => 2,
                'milestonecategory_created' => '2024-01-19 15:42:44',
                'milestonecategory_updated' => '2024-01-19 17:30:32',
                'milestonecategory_creatorid' => 0,
                'milestonecategory_title' => 'Design',
                'milestonecategory_position' => 2,
                'milestonecategory_color' => 'default',
            ],
            [
                'milestonecategory_id' => 3,
                'milestonecategory_created' => '2024-01-19 15:42:44',
                'milestonecategory_updated' => '2024-01-19 15:42:44',
                'milestonecategory_creatorid' => 0,
                'milestonecategory_title' => 'Development',
                'milestonecategory_position' => 3,
                'milestonecategory_color' => 'default',
            ],
            [
                'milestonecategory_id' => 4,
                'milestonecategory_created' => '2024-01-19 15:42:44',
                'milestonecategory_updated' => '2024-01-19 15:42:44',
                'milestonecategory_creatorid' => 0,
                'milestonecategory_title' => 'Testing',
                'milestonecategory_position' => 4,
                'milestonecategory_color' => 'default',
            ],
        ]);
    }
}
