<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks_priority')->insert([
            [
                'taskpriority_id' => 1,
                'taskpriority_created' => null,
                'taskpriority_creatorid' => 0,
                'taskpriority_updated' => '2024-07-11 09:08:22',
                'taskpriority_title' => 'Normal',
                'taskpriority_position' => 1,
                'taskpriority_color' => 'lime',
                'taskpriority_system_default' => 'yes',
            ],
            [
                'taskpriority_id' => 2,
                'taskpriority_created' => null,
                'taskpriority_creatorid' => 0,
                'taskpriority_updated' => '2024-07-11 09:08:22',
                'taskpriority_title' => 'Low',
                'taskpriority_position' => 2,
                'taskpriority_color' => 'success',
                'taskpriority_system_default' => 'no',
            ],
            [
                'taskpriority_id' => 3,
                'taskpriority_created' => null,
                'taskpriority_creatorid' => 0,
                'taskpriority_updated' => '2024-07-11 09:08:22',
                'taskpriority_title' => 'High',
                'taskpriority_position' => 3,
                'taskpriority_color' => 'warning',
                'taskpriority_system_default' => 'no',
            ],
            [
                'taskpriority_id' => 4,
                'taskpriority_created' => null,
                'taskpriority_creatorid' => 0,
                'taskpriority_updated' => '2024-07-11 09:08:22',
                'taskpriority_title' => 'Urgent',
                'taskpriority_position' => 4,
                'taskpriority_color' => 'danger',
                'taskpriority_system_default' => 'no',
            ],
        ]);
    }
}
