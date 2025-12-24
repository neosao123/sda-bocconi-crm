<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leads_status')->insert([
            [
                'leadstatus_id' => 1,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'New',
                'leadstatus_position' => 1,
                'leadstatus_color' => 'default',
                'leadstatus_system_default' => 'yes',
            ],
            [
                'leadstatus_id' => 2,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'Converted',
                'leadstatus_position' => 6,
                'leadstatus_color' => 'success',
                'leadstatus_system_default' => 'yes',
            ],
            [
                'leadstatus_id' => 3,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'Qualified',
                'leadstatus_position' => 3,
                'leadstatus_color' => 'info',
                'leadstatus_system_default' => 'no',
            ],
            [
                'leadstatus_id' => 4,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'Proposal Sent',
                'leadstatus_position' => 5,
                'leadstatus_color' => 'lime',
                'leadstatus_system_default' => 'no',
            ],
            [
                'leadstatus_id' => 5,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'Contacted',
                'leadstatus_position' => 2,
                'leadstatus_color' => 'warning',
                'leadstatus_system_default' => 'no',
            ],
            [
                'leadstatus_id' => 7,
                'leadstatus_created' => '2024-07-11 09:08:22',
                'leadstatus_creatorid' => 0,
                'leadstatus_updated' => '2024-07-11 09:08:22',
                'leadstatus_title' => 'Disqualified',
                'leadstatus_position' => 4,
                'leadstatus_color' => 'danger',
                'leadstatus_system_default' => 'no',
            ],
        ]);
    }
}
