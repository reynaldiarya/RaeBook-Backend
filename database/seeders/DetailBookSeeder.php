<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_books')->insert([
            'user_id' => '1',
            'book_id' => '1',
        ]);
        // DB::table('detail_books')->insert([
        //     'userid' => '1',
        //     'bookid' => '4',
        // ]);
    }
}
