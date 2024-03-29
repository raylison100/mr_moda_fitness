<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subjects')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Auth',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('subjects')->updateOrInsert(
            ['id' => 2],
            [
                'name' => 'Sales',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('subjects')->updateOrInsert(
            ['id' => 3],
            [
                'name' => 'Products',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('subjects')->updateOrInsert(
            ['id' => 4],
            [
                'name' => 'Spendings',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('subjects')->updateOrInsert(
            ['id' => 5],
            [
                'name' => 'Dashboard',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
