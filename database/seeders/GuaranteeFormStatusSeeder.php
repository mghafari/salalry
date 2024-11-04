<?php

namespace Database\Seeders;

use App\Models\GuaranteeFormStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuaranteeFormStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuaranteeFormStatus::create(
            [
                'name'=>'غیرفعال',
                'status_color'=>'bg-gray-100',
            ],
            [
                'name'=>'پیش نویس',
                'status_color'=>'bg-white-100',
            ],
            [
                'name'=>' تایید توسط کابر',
                'status_color'=>'bg-yellow-100',
            ],
            [
                'name'=>'تایید توسط مدیر',
                'status_color'=>'bg-purple-100',
            ],
            [
                'name'=>'رد توسط مدیر',
                'status_color'=>'bg-pink-100',
            ],
            [
                'name'=>'تایید توسط مدیر مالی',
                'status_color'=>'bg-indigo-100',
            ],
            [
                'name'=>'رد توسط مدیر مالی',
                'status_color'=>'bg-red-100',
            ],
            [
                'name'=>'تایید توسط مدیر عامل',
                'status_color'=>'bg-green-100',
            ],
            [
                'name'=>'رد توسط مدیر عامل',
                'status_color'=>'bg-red-100',
            ],
        );
    }
}
