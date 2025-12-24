<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KbCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kb_categories')->insert([
            'kbcategory_id' => 1,
            'kbcategory_created' => '2024-07-11 09:08:22',
            'kbcategory_updated' => '2024-07-11 09:08:22',
            'kbcategory_creatorid' => 0,
            'kbcategory_title' => 'Frequently Asked Questions',
            'kbcategory_description' => 'Answers to some of the most frequently asked questions',
            'kbcategory_position' => 1,
            'kbcategory_visibility' => 'everyone',
            'kbcategory_slug' => '1-frequently-asked-questions',
            'kbcategory_icon' => 'sl-icon-call-out',
            'kbcategory_type' => 'text',
            'kbcategory_system_default' => 'yes',
        ]);
    }
}
