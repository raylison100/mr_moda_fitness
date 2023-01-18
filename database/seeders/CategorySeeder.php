<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Roupas',
                'department_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('categories')->updateOrInsert(
            ['id' => 2],
            [
                'name' => 'Acessórios',
                'department_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
