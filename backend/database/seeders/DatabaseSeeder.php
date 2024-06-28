<?php

namespace Database\Seeders;

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
                // \App\Models\User::factory(10)->create();
                $this->call(AdminSeeder::class);
                \App\Models\Post::factory(17)->create();
                $this->call(MailsettingSeeder::class);
                $this->call(CategorySeeder::class);
                $this->call(ProductSeeder::class);
                $this->call(FrontuserSeeder::class);
                $this->call(ProvinceSeeder::class);
                $this->call(DistrictSeeder::class);
                $this->call(VillageSeeder::class);
                $this->call(CommuneSeeder::class);
        }
}
