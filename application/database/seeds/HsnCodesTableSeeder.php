<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HsnCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hsncodes = [
            [
                'hsncode_id' => 1,
                'hsncode_uniqueid' => (string) Str::uuid(),
                'hsncode_created' => now(),
                'hsncode_updated' => now(),
                'hsncode_number' => '998312',
                'hsncode_creatorid' => 1,
                'hsncode_slug' => '1-998312',
            ],
            [
                'hsncode_id' => 2,
                'hsncode_uniqueid' => (string) Str::uuid(),
                'hsncode_created' => now(),
                'hsncode_updated' => now(),
                'hsncode_number' => '998313',
                'hsncode_creatorid' => 1,
                'hsncode_slug' => '2-998313',
            ],
            [
                'hsncode_id' => 3,
                'hsncode_uniqueid' => (string) Str::uuid(),
                'hsncode_created' => now(),
                'hsncode_updated' => now(),
                'hsncode_number' => '998314',
                'hsncode_creatorid' => 1,
                'hsncode_slug' => '3-998314',
            ],
            [
                'hsncode_id' => 4,
                'hsncode_uniqueid' => (string) Str::uuid(),
                'hsncode_created' => now(),
                'hsncode_updated' => now(),
                'hsncode_number' => '998315',
                'hsncode_creatorid' => 1,
                'hsncode_slug' => '4-998315',
            ],
        ];
        DB::table('hsncodes')->insert($hsncodes);
    }
}
