<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
                'author' => 'Mark Manson',
                'publisher' => 'Grasindo',
                'publication_date' => '2016-13-09',
                'category_id' => 5, 
            ],
            [
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Harvill Secker',
                'publication_date' => '2011-09-04',
                'category_id' => 2, 
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'publisher' => 'Bantam Books',
                'publication_date' => '1988-03-01',
                'category_id' => 3, 
            ],
        ]);
    }
}
