<?php

namespace App\Imports;

use App\Models\Form;
use App\Models\PayslipImport;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryImportWithSetting implements ToCollection, WithHeadingRow
{
    public $year;
    public $month;
    public $payslipHeadSetting;
    public $nationalCodePlace;

    public function __construct( $year , $month, $payslipHeadSetting, $nationalCodePlace)
    {
        $this->year= $year;
        $this->month= $month;
        $this->payslipHeadSetting= $payslipHeadSetting;
        $this->nationalCodePlace= $nationalCodePlace;
    }


    public function collection (Collection $rows)
    {
        foreach ($rows as $row) {

            if (!isset($row[$this->nationalCodePlace]))
            {
                continue;
            }

            $personalCode = Setting::where('key', 'PERSONAL_CODE_PLACE')->first();
            $mobile       = Setting::where('key', 'MOBILE_PLACE')->first();
            $firstName    = Setting::where('key', 'FIRST_NAME_PLACE')->first();
            $lastName     = Setting::where('key', 'LAST_NAME_PLACE')->first();

            $user = User::updateOrCreate([
                'national_code' => $row[$this->nationalCodePlace]
            ],[
                'name'          => $firstName ? $row[$firstName] : null,
                'family'        => $lastName ? $row[$lastName] : null,
                'personal_code' => $personalCode ? $row[$personalCode] : null,
                'mobile'        => $mobile ? $row[$mobile] : null
            ]);

            if (!$user)
            {
                continue;
            }

            $exclusions = [
                $this->nationalCodePlace,
                $firstName,
                $lastName,
                $personalCode,
                $mobile
            ];

            $colIndex = 0;
            foreach ($row as $singleRow)
            {
                if (in_array($colIndex, $exclusions))
                {
                    $colIndex++; 
                    continue;
                }

                PayslipImport::create([
                    'payslip_head_setting_id' => $this->payslipHeadSetting->id,
                    'index' => $colIndex,
                    'value' => $singleRow,
                    'user_id' => $user->id
                ]);

                $colIndex++; 

            }

        
        }
    }

}
