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
                'name' => 'Calções',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        //CATEGORY 2
        DB::table('sub_categories')->updateOrInsert(
            ['id' => 2],
            [
                'name' => 'Legging',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
