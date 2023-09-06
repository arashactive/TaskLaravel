<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name' => 'Parizad Warnke',
            'email' => 'admin@warnke-marketing.de'
        ])->create();

        Company::factory([
            'name' => 'Fullstack Agentur',
            'IBAN' => 'DE11 1111 2222 3333 0000 22',
            'BIC' => 'WMSXXX'
        ])->create();
    }
}
