<?php

namespace App\Imports;

use App\Models\Form;
use App\Models\PayslipImport;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryImportWithSetting implements ToCollection, WithHeadingRow
{
    public $year;
    public $month;
    public $payslipHeadSetting;
    public $settings;

    public function __construct( $year , $month, $payslipHeadSetting, $settings)
    {
        $this->year= $year;
        $this->month= $month;
        $this->payslipHeadSetting= $payslipHeadSetting;
        $this->settings= $settings;
    }


    public function collection (Collection $rows)
    {
        foreach ($rows as $row) {

            $row = $row->toArray();
            $row = array_values($row);

            if (!isset($row[$this->settings['nationalCodePlace']]))
            {
                continue;
            }

            $user = User::where('national_code', $row[$this->settings['nationalCodePlace']])->first();

            if (!$user)
            {
                continue;
            }

            $loginSetting = Setting::where('key', 'LOGIN_USER')->first();
            if (!$loginSetting) {
                return back()->with('error', 'لطفا نحوه ورود کاربر را از قسمت تنظیمات سیستم وارد کنید.');
            }

            if ($loginSetting->value == 'pass') {
                $user->update([
                    'password' => Hash::make($this->settings['passwordPlace']),
                ]);

                $exclusions[] = $this->settings['passwordPlace'];
            }

            
            $exclusions[] = $this->settings['nationalCodePlace'];

            $colIndex = 0;
            foreach ($row as $singleRow)
            {
                if (in_array($colIndex, $exclusions))
                {
                    $colIndex++; 
                    continue;
                }

                PayslipImport::updateOrcreate([
                    'payslip_head_setting_id' => $this->payslipHeadSetting->id,
                    'user_id' => $user->id,
                    'index' => $colIndex,
                ], [
                    'value' => $singleRow,
                ]);

                $colIndex++; 

            }

        
        }
    }

}
