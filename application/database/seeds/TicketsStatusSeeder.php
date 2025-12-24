<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets_status')->insert([
            [
                'ticketstatus_id' => 1,
                'ticketstatus_created' => '2022-12-11 12:20:22',
                'ticketstatus_creatorid' => 0,
                'ticketstatus_updated' => '2022-12-14 16:22:30',
                'ticketstatus_title' => 'Open',
                'ticketstatus_position' => 1,
                'ticketstatus_color' => 'info',
                'ticketstatus_use_for_client_replied' => 'yes',
                'ticketstatus_use_for_team_replied' => 'no',
                'ticketstatus_system_default' => 'yes',
            ],
            [
                'ticketstatus_id' => 2,
                'ticketstatus_created' => '2022-12-11 12:21:19',
                'ticketstatus_creatorid' => 0,
                'ticketstatus_updated' => '2022-12-14 14:31:03',
                'ticketstatus_title' => 'Closed',
                'ticketstatus_position' => 4,
                'ticketstatus_color' => 'default',
                'ticketstatus_use_for_client_replied' => 'no',
                'ticketstatus_use_for_team_replied' => 'no',
                'ticketstatus_system_default' => 'yes',
            ],
            [
                'ticketstatus_id' => 3,
                'ticketstatus_created' => '2022-12-11 12:23:56',
                'ticketstatus_creatorid' => 0,
                'ticketstatus_updated' => '2022-12-14 14:23:53',
                'ticketstatus_title' => 'On Hold',
                'ticketstatus_position' => 2,
                'ticketstatus_color' => 'warning',
                'ticketstatus_use_for_client_replied' => 'no',
                'ticketstatus_use_for_team_replied' => 'no',
                'ticketstatus_system_default' => 'no',
            ],
            [
                'ticketstatus_id' => 4,
                'ticketstatus_created' => '2022-12-11 12:24:30',
                'ticketstatus_creatorid' => 0,
                'ticketstatus_updated' => '2022-12-14 14:24:40',
                'ticketstatus_title' => 'Answered',
                'ticketstatus_position' => 3,
                'ticketstatus_color' => 'success',
                'ticketstatus_use_for_client_replied' => 'no',
                'ticketstatus_use_for_team_replied' => 'yes',
                'ticketstatus_system_default' => 'no',
            ],
        ]);
    }
}
