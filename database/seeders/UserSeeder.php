<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insertOrIgnore(
            [
                'id' => 1,
                'name' => "Raylison Nunes dos Santos",
                'email' => "raylison100@gmail.com",
                'password' => bcrypt('tE7NQT-b4wVM5eNJ'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('users')->insertOrIgnore(
            [
                'id' => 2,
                'name' => "Mariana Rosa Silva de Oliveira",
                'email' => "rosamariana362@gmail.com",
                'password' => bcrypt('Qct-yPRyt2K7xKq_'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 1],
            [
                'user_id' => 1,
                'action_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 2],
            [
                'user_id' => 1,
                'action_id' => 2,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 3],
            [
                'user_id' => 1,
                'action_id' => 1,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 4],
            [
                'user_id' => 1,
                'action_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 5],
            [
                'user_id' => 2,
                'action_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 6],
            [
                'user_id' => 2,
                'action_id' => 2,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 7],
            [
                'user_id' => 2,
                'action_id' => 1,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('user_abilities')->updateOrInsert(
            ['id' => 8],
            [
                'user_id' => 2,
                'action_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
