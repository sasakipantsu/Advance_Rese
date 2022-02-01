<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Genre_shopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre_shop')->insert([
            [
                'id' => 1,
                'shop_id' => 1,
                'genre_id' => 1,
            ],

            [
                'id' => 2,
                'shop_id' => 2,
                'genre_id' => 2,
            ],

            [
                'id' => 3,
                'shop_id' => 3,
                'genre_id' => 4,
            ],

            [
                'id' => 4,
                'shop_id' => 4,
                'genre_id' => 3,
            ],

            [
                'id' => 5,
                'shop_id' => 5,
                'genre_id' => 5,
            ],

            [
                'id' => 6,
                'shop_id' => '6',
                'genre_id' => '2',
            ],

            [
                'id' => 7,
                'shop_id' => 7,
                'genre_id' => 3,
            ],

            [
                'id' => 8,
                'shop_id' => 8,
                'genre_id' => 5,
            ],

            [
                'id' => 9,
                'shop_id' => 9,
                'genre_id' => 4,
            ],

            [
                'id' => 10,
                'shop_id' => 10,
                'genre_id' => 1,
            ],

            [
                'id' => 11,
                'shop_id' => 11,
                'genre_id' => 2,
            ],

            [
                'id' => 12,
                'shop_id' => 12,
                'genre_id' => 2,
            ],

            [
                'id' => 13,
                'shop_id' => 13,
                'genre_id' => 4,
            ],

            [
                'id' => 14,
                'shop_id' => 14,
                'genre_id' => 1,
            ],

            [
                'id' => 15,
                'shop_id' => 15,
                'genre_id' => 5,
            ],

            [
                'id' => 16,
                'shop_id' => 16,
                'genre_id' => 4,
            ],

            [
                'id' => 17,
                'shop_id' => 17,
                'genre_id' => 1,
            ],

            [
                'id' => 18,
                'shop_id' => 18,
                'genre_id' => 2,
            ],

            [
                'id' => 19,
                'shop_id' => 19,
                'genre_id' => 3,
            ],

            [
                'id' => 20,
                'shop_id' => 20,
                'genre_id' => 1,
            ],
        ]);
    }
}
