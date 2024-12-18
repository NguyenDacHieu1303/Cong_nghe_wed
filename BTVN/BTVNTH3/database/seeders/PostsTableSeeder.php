<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Mảng lưu ID của máy tính để sử dụng cho bảng issues
        $computerIds = [];

        // Thêm dữ liệu vào bảng computers
        foreach (range(1, 10) as $index) {
            $computerId = DB::table('computers')->insertGetId([
                'computer_name' => 'Lab-' . $faker->numberBetween(1, 100),
                'model' => $faker->word . ' ' . $faker->randomNumber(4),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Big Sur']),
                'processor' => 'Intel Core i' . $faker->randomElement(['3', '5', '7', '9']) . '-11400',
                'memory' => $faker->randomElement([8, 16, 32, 64]),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Lưu ID máy tính để dùng ở bảng issues
            $computerIds[] = $computerId;
        }

        // Thêm dữ liệu vào bảng issues
        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds), // Chọn ngẫu nhiên ID từ bảng computers
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence(10),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}