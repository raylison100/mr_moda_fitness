<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {

        //CATEGORY 1
        DB::table('sub_categories')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Shorts',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 2],
            [
                'name' => 'Calça Legging',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );


        DB::table('sub_categories')->updateOrInsert(
            ['id' => 3],
            [
                'name' => 'Top',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 4],
            [
                'name' => 'Macacoes',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 5],
            [
                'name' => 'Conjuntos',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 6],
            [
                'name' => 'Body',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        //CATEGORY 2
        DB::table('sub_categories')->updateOrInsert(
            ['id' => 7],
            [
                'name' => 'Bolsas',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 8],
            [
                'name' => 'Bolsas',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 9],
            [
                'name' => 'Ponchetes',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('sub_categories')->updateOrInsert(
            ['id' => 10],
            [
                'name' => 'Garrafas',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
