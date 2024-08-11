<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_cats')->insert([
            ['name' => 'Fiksi'],
            ['name' => 'Sains'],
            ['name' => 'Sejarah'],
            ['name' => 'Teknologi'],
            ['name' => 'Pengembangan Diri'],
        ]);
    }
}
