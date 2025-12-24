<?php

use Illuminate\Database\Seeder;
// Import Seeders
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ContractTemplatesSeeder;
use Database\Seeders\CsAffiliateEarningsSeeder;
use Database\Seeders\CsAffiliateProjectsSeeder;
use Database\Seeders\CsEventsSeeder;
use Database\Seeders\CustomFieldsSeeder;
use Database\Seeders\EmailTemplatesTableSeeder;
use Database\Seeders\EstimatesTableSeeder;
use Database\Seeders\TaxratesSeeder;
use Database\Seeders\FileFoldersTableSeeder;
use Database\Seeders\HsnCodesTableSeeder;
use Database\Seeders\KbCategoriesSeeder;
use Database\Seeders\LeadsStatusSeeder;
use Database\Seeders\MilestoneCategoriesSeeder;
use Database\Seeders\ProposalTemplatesTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\Settings2Seeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\TasksPrioritySeeder;
use Database\Seeders\TasksStatusSeeder;
use Database\Seeders\TicketsStatusSeeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            CategoriesTableSeeder::class,
            ContractTemplatesSeeder::class,
            CsAffiliateEarningsSeeder::class,
            CsAffiliateProjectsSeeder::class,
            CsEventsSeeder::class,
            CustomFieldsSeeder::class,
            EmailTemplatesTableSeeder::class,
            EstimatesTableSeeder::class,
            FileFoldersTableSeeder::class,
            KbCategoriesSeeder::class,
            LeadsStatusSeeder::class,
            MilestoneCategoriesSeeder::class,
            ProposalTemplatesTableSeeder::class,
            RolesTableSeeder::class,
            Settings2Seeder::class,
            SettingsTableSeeder::class,
            TasksPrioritySeeder::class,
            TasksStatusSeeder::class,
            TaxratesSeeder::class,
            TicketsStatusSeeder::class,
            UsersTableSeeder::class,
            HsnCodesTableSeeder::class,
        ];

        $this->call($seeders);
    }
}
