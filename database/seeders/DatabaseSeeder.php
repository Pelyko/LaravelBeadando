<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GenresTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BorrowsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
