<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $date = Carbon::create(2022, 12, 31);
        $date = Carbon::create(2024, 05, 16);


    DB::table('credits')->insert([
        'user_id' => 1, // Assuming the user with ID 1 is John Doe
        'balance' => 1000.00, // Sample balance
        'created_at' => $date,
        'updated_at' => $date,
    ]);

    DB::table('credits')->insert([
        'user_id' => 1, // Assuming the user with ID 1 is John Doe
        'balance' => 2000.00, // Sample balance
        'created_at' => $date,
        'updated_at' => $date,
    ]);

    DB::table('credits')->insert([
        'user_id' => 1, // Assuming the user with ID 1 is John Doe
        'balance' => 3000.00, // Sample balance
        'created_at' => $date,
        'updated_at' => $date,
    ]);

    DB::table('credits')->insert([
        'user_id' => 1, // Assuming the user with ID 1 is John Doe
        'balance' => 4000.00, // Sample balance
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}
