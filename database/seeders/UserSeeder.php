<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'مصطفی',
                'family'=>'غفاری',
                'mobile'=>'09133245505',
                'personal_code'=>'3052337531',
                'national_code'=>'3052337531',
            ]
        );
        //
    }
}
