<?php

namespace Database\Seeders;

use App\Models\StockType;
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
                $this->call(StockTypeSeeder::class);
                $this->call(StockSeeder::class);
                $this->call(LocationSeeder::class);
                $this->call(MessageSeeder::class);
                $this->call(LimitDurationTypeSeeder::class);
                $this->call(LimitDurationSeeder::class);
        }
}
