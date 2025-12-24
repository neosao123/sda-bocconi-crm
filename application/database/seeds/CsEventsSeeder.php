<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cs_events')->insert([
            [
                'cs_event_id' => 3,
                'cs_event_created' => '2022-08-16',
                'cs_event_updated' => '2022-08-16',
                'cs_event_affliateid' => 167,
                'cs_event_invoiceid' => 137,
                'cs_event_project_title' => 'Redesign the layout of our helpdesk',
                'cs_event_amount' => 100.00,
            ],
        ]);
    }
}
