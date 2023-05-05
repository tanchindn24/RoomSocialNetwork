<?php

namespace Database\Seeders;

use App\Models\PostCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PostCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $names = [
            'Thuê Căn hộ/Chung cư',
            'Thuê Nhà ở',
            'Thuê Đất',
            'Thuê Văn phòng, Mặt bằng kinh doanh',
            'Thuê Phòng trọ',
        ];

        foreach ($names as $name) {
            $slug = Str::slug($name);
            $status = $faker->randomElement([1, 2]); // random status

            PostCategories::create([
                'name' => $name,
                'slug' => $slug,
                'status' => $status,
            ]);
        }
    }
}
