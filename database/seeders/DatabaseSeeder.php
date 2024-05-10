<?php

namespace Database\Seeders;

use App\Models\Registration;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $status = ['menunggu konfirmasi', 'terkonfirmasi'];

        foreach (range(1, 100) as $index) {
            $randStatus = $status[array_rand($status)];
            DB::table('registrations')->insert([
                'nama' => $faker->firstName() . ' ' . $faker->lastName(),
                'no_hp' => '6285' . $faker->randomNumber(9, true),
                'status' => $randStatus,
                'waktu_booking' => Carbon::today()->startOfDay()->addDay(rand(1, 150))->format('Y:m:d') . ' ' . $faker->time('H:i'),
                'created_at' => now()->format('Y-m-d H:i'),
                'updated_at' => now()->format('Y-m-d H:i'),
            ]);
        }
    }
}
