<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tasks_status')->insert([
            [
                'taskstatus_id' => 1,
                'taskstatus_created' => null,
                'taskstatus_creatorid' => 0,
                'taskstatus_updated' => '2021-09-26 11:13:40',
                'taskstatus_title' => 'New',
                'taskstatus_position' => 1,
                'taskstatus_color' => 'default',
                'taskstatus_system_default' => 'yes',
            ],
            [
                'taskstatus_id' => 2,
                'taskstatus_created' => null,
                'taskstatus_creatorid' => 0,
                'taskstatus_updated' => '2021-09-26 11:13:40',
                'taskstatus_title' => 'Completed',
                'taskstatus_position' => 4,
                'taskstatus_color' => 'success',
                'taskstatus_system_default' => 'yes',
            ],
            [
                'taskstatus_id' => 3,
                'taskstatus_created' => null,
                'taskstatus_creatorid' => 0,
                'taskstatus_updated' => '2021-09-26 11:13:40',
                'taskstatus_title' => 'In Progress',
                'taskstatus_position' => 2,
                'taskstatus_color' => 'info',
                'taskstatus_system_default' => 'no',
            ],
            [
                'taskstatus_id' => 4,
                'taskstatus_created' => null,
                'taskstatus_creatorid' => 0,
                'taskstatus_updated' => '2021-09-26 11:13:40',
                'taskstatus_title' => 'Awaiting Feedback',
                'taskstatus_position' => 3,
                'taskstatus_color' => 'warning',
                'taskstatus_system_default' => 'no',
            ],
        ]);
    }
}
