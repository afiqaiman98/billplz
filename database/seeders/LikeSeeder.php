<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('likes')->insert([
                'user_id' => 1,
                'comment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('likes')->insert([
                'user_id' => 1,
                'comment_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            DB::table('likes')->insert([
                'user_id' => 1,
                'comment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // User 2's comments
        for ($i = 1; $i <= 50; $i++) {
            DB::table('likes')->insert([
                'user_id' => 2,
                'comment_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 60; $i++) {
            DB::table('likes')->insert([
                'user_id' => 2,
                'comment_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
