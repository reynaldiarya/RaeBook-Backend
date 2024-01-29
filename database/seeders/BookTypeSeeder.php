<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_types')->insert([
            'book_id' => '1',
            'type_id' => '1',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '1',
            'type_id' => '2',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '1',
            'type_id' => '3',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '2',
            'type_id' => '1',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '2',
            'type_id' => '2',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '2',
            'type_id' => '3',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '3',
            'type_id' => '1',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '3',
            'type_id' => '2',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '3',
            'type_id' => '3',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '4',
            'type_id' => '1',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '4',
            'type_id' => '2',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '4',
            'type_id' => '3',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '5',
            'type_id' => '1',
        ]);

        DB::table('book_types')->insert([
            'book_id' => '5',
            'type_id' => '3',
        ]);
    }
}
