<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create(['code' => 'SAVE10', 'discount' => 10.00]);
        Coupon::create(['code' => 'SAVE20', 'discount' => 20.00]);
    }
}
