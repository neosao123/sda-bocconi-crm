<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileFoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('file_folders')->insert([
            'filefolder_id' => 1,
            'filefolder_created' => '2024-07-11 09:08:22',
            'filefolder_updated' => '2024-07-11 09:08:22',
            'filefolder_creatorid' => 0,
            'filefolder_projectid' => null,
            'filefolder_name' => 'Default',
            'filefolder_default' => 'yes',
            'filefolder_system' => 'yes',
        ]);
    }
}
